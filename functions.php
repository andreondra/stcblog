<?php
/**
 * Remove empty paragraphs created by wpautop()
 * @author Ryan Hamilton
 * @link https://gist.github.com/Fantikerz/5557617
 */
function remove_empty_p( $content ) {
	$content = force_balance_tags( $content );
	$content = preg_replace( '#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content );
	$content = preg_replace( '~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $content );
	return $content;
}

//Attach filter to the contents of articles.
add_filter('the_content', 'remove_empty_p', 0, 1);
//Allow post thumbnails.
add_theme_support( 'post-thumbnails' );

/**
 * Attach a version suffix to the url of the style.css to force browsers to refresh CSS.
 * @author Ondrej Golasowski
 */
function get_css_name(){
    $version = 8;
    return "/style.css?rnd=" . $version;
}

/**
 * Create multiple socials icons. 
 * @param int Count of icons.
 * @author Ondrej Golasowski
 */
function stcblog_add_socials($count, $customizer){

    for($id = 1; $id <= $count; $id++){

        // Adding a template setting for a logo.
        $customizer->add_setting('settings_footer_logo' . $id, [
            'default' => ''
        ]);
        // Adding a template setting for a link.
        $customizer->add_setting('settings_footer_link' . $id, [
            'default' => ''
        ]);

        //Adding an image upload control to the Customizer.
        $customizer->add_control(new WP_Customize_Image_Control($customizer, 'control_footer_logo' . $id, [
            'label' => __('Socials ' . $id . ' - logo', 'stcblog'),
            'section' => 'section_footer',
            'settings' => 'settings_footer_logo' . $id
        ]));

        //Adding an url input control to the Customizer.
        $customizer->add_control(new WP_Customize_Control($customizer, 'control_footer_link' . $id, [
            'label' => __( 'Socials ' . $id . ' - link', 'stcblog' ),
            'section' => 'section_footer',
            'settings' => 'settings_footer_link' . $id,
            'type' => 'url'
        ]));
    }
}

/**
 * Add GDPR link to footer.
 * @author Ondrej Golasowski
 */
function stcblog_add_gdpr($customizer){

        // Adding a template setting for a text.
        $customizer->add_setting('settings_footer_gdpr_text', [
            'default' => ''
        ]);
        // Adding a template setting for a link.
        $customizer->add_setting('settings_footer_gdpr_link', [
            'default' => ''
        ]);

        //Adding an text input upload control to the Customizer.
        $customizer->add_control(new WP_Customize_Control($customizer, 'control_footer_gdpr_text', [
            'label' => __('GDPR text', 'stcblog'),
            'section' => 'section_footer',
            'settings' => 'settings_footer_gdpr_text'
        ]));

        //Adding an url input control to the Customizer.
        $customizer->add_control(new WP_Customize_Control($customizer, 'control_footer_gdpr_link', [
            'label' => __('GDPR link', 'stcblog' ),
            'section' => 'section_footer',
            'settings' => 'settings_footer_gdpr_link',
            'type' => 'url'
        ]));
}

//Adding functions to the Customizer.
function stcblog_customize_register($wp_customize){

    // ***********************************
    // Footer section
    // ***********************************
    // Adding a section to the Customizer.
    $wp_customize->add_section('section_footer', [
        'title' => __( 'Footer', 'stcblog' ),
        'priority' => 30,
    ]);
        // ===================================
        // Custom copyright text
        // ===================================
        // Adding the template setting.
        $wp_customize->add_setting('settings_footer_copyright', [
            'default' => '© 2020 STC, Všechna práva vyhrazena'
        ]);

        //Adding a control to the Customizer.
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'control_footer_copyright', [
            'label' => __( 'Copyright text', 'stcblog' ),
            'section' => 'section_footer',
            'settings' => 'settings_footer_copyright'
        ]));

        // ===================================
        // Custom GDPR link
        // ===================================
        stcblog_add_gdpr($wp_customize);

        // ===================================
        // Custom socials icons
        // ===================================
        stcblog_add_socials(3, $wp_customize);
}
add_action('customize_register', 'stcblog_customize_register');

/**
 * Calculates reading time according to the article word count.
 * @return int Reading time.
 * @author Ondrej Golasowski
 */
function reading_time() {
    //Get contents of the current article.
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);

    //Chooses correct word for specified interval.
    switch($readingtime){
        case 1:
            $timer = " minuta";
            break;
        case 2:
        case 3:
        case 4: 
            $timer = " minuty";
            break;
        default:
            $timer = " minut";
            break;
    }

    $totalreadingtime = $readingtime . $timer;

    return $totalreadingtime;
}

add_action( 'manage_posts_extra_tablenav', 'admin_post_list_top_export_button', 20, 1 );
function admin_post_list_top_export_button( $which ) {
    global $typenow;
 
    if ( 'post' === $typenow && 'top' === $which ) {
        ?>
        <input type="submit" name="export_all_posts" id="export_all_posts" class="button button-primary" value="Exportovat do csv" />
        <?php
    }
}
add_action( 'init', 'func_export_all_posts' );
function func_export_all_posts() {
    if(isset($_GET['export_all_posts'])) {
        $arg = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => -1,
            );
 
        global $post;
        $arr_post = get_posts($arg);
        if ($arr_post) {
 
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="wp.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
 
            $file = fopen('php://output', 'w');
 
            fputcsv($file, array('Post Title', 'URL'));
 
            foreach ($arr_post as $post) {
                setup_postdata($post);
                fputcsv($file, array(get_the_title(), get_the_permalink()));
            }
 
            exit();
        }
    }
}

?>