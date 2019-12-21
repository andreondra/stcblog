<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory') . get_css_name();?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body class="ms-Fabric">
        <?php get_header(); ?>

        <main class="main feed">
            <header class="main__header">
                <h1><?php echo get_bloginfo('name'); ?></h1>
                <p><?php echo get_bloginfo('description'); ?></p>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/mslogo.svg"/>
            </header>
            <section class="feed__posts">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <article>
                            <a class="excerpt" href="<?php the_permalink(); ?>">
                                <div class="excerpt__thumbnail">
                                    <?php the_post_thumbnail([300, 200]); ?>
                                </div>
                                <div class="excerpt__text">
                                    <h2 class="excerpt__text__title"><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                    <div class="excerpt__text__meta">
                                        <span class="excerpt__text__meta__date"><?php echo get_the_date(); ?></span>
                                        <span>•</span>
                                        <span class="excerpt__text__meta__readtime">Doba čtení: <?php echo reading_time(); ?></span>
                                    </div>
                                </div>
                            </a>    
                        </article>
                <?php endwhile; endif; ?>
            </section>
            <footer class="feed__footer">
                <?php the_posts_pagination([
                    'prev_text' => '« Předcházející',
                    'next_text' => 'Následující »'
                    ]); ?>
            </footer>
        </main>

        <?php get_footer(); ?>
    </body>
</html>