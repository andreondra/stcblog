<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>STC blog</title>
        <?php wp_head(); ?>
    </head>
    <body class="ms-Fabric">
        <?php get_header(); ?>

        <main class="main feed">
            <header class="feed__header">
                <h1><?php echo get_bloginfo('name'); ?></h1>
                <p><?php echo get_bloginfo('description'); ?></p>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/mslogo.svg"/>
            </header>
            <section class="feed__articles">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="feed__articles__article">
                    <div class="feed__articles__article__thumbnail">
                        <?php the_post_thumbnail([300, 200]); ?>
                    </div>
                    <div class="feed__articles__article__text">
                        <h2 class="feed__articles__article__text__title"><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                        <div class="feed__articles__article__meta">
                            <span class="feed__articles__article__meta__date"><?php echo get_the_date(); ?></span>
                            <span>•</span>
                            <span class="feed__articles__article__meta__readtime">Doba čtení: <?php echo reading_time(); ?></span>
                        </div>
                    </div>
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
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/main.js"></script>
    </body>
</html>