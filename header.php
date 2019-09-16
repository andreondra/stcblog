<header class="header ms-depth-8">
    <section id="section_header" class="header__logo">
        <a class="header__logo__stclogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="header__logo__stclogo__std" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_std.svg"/>
            <img class="header__logo__stclogo__small" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_small.svg"/>
        </a>
        <?php get_search_form(); ?>
    </section>
    <nav class="header__nav">
        <?php wp_nav_menu(); ?>
    </nav>
</header>