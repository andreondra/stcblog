<header class="header ms-depth-8">
    <section id="section_header" class="header__logo">
        <a class="header__logo__stclogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="header__logo__stclogo__std" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_std.svg"/>
            <img class="header__logo__stclogo__small" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_small.svg"/>
        </a>
        <div class="header__forms">
            <?php get_search_form(); ?>
            <a class="header__forms__menuButton" id="button_menu"><i class="ms-Icon ms-Icon--GlobalNavButton" aria-hidden="true"></i></a>
        </div>
    </section>
    <nav class="header__nav" id="section_menu">
        <?php wp_nav_menu(); ?>
    </nav>
</header>