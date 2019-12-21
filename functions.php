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
add_filter('the_content', 'remove_empty_p', 20, 1);
add_theme_support( 'post-thumbnails' );
//set_post_thumbnail_size( 300, 200);

function get_css_name(){
    $version = 3;
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
        $customizer->add_control(new WP_Customize_Image_Control($customizer, 'settings_footer_logo' . $id, [
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
            'default' => '© 2019 STC, Všechna práva vyhrazena'
        ]);

        //Adding a control to the Customizer.
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'control_footer_copyright', [
            'label' => __( 'Copyright text', 'stcblog' ),
            'section' => 'section_footer',
            'settings' => 'settings_footer_copyright'
        ]));

        // ===================================
        // Custom socials icons
        // ===================================
        stcblog_add_socials(3, $wp_customize);
}
add_action('customize_register', 'stcblog_customize_register');

function reading_time() {
    $content = get_post_field( 'post_content', $post->ID );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);

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

?>