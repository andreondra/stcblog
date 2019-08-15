<header class="header ms-depth-8">
    <section id="section_header" class="header__logo">
        <a class="header__logo__stclogo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img class="header__logo__stclogo__std" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_std.svg"/>
            <img class="header__logo__stclogo__small" src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/stclogo_small.svg"/>
        </a>
        <div id="input_search" class="header__logo__search">
            <a><i class="ms-Icon ms-Icon--Search header__logo__search__button" aria-hidden="true"></i></a>
            <input id="input_searchInput" class="header__logo__search__input" type="text"/>
        </div>
    </section>
    <nav class="header__nav">
        <?php wp_nav_menu(); ?>
    </nav>
</header>