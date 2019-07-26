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

        <main class="category">
            <header class="category__header">
                <h1><?php single_cat_title(); ?></h1>
                <?php echo category_description(); ?>
                <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/mslogo.svg"/>
            </header>
            <section class="category__articles">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <article class="category__articles__article">
                    <div class="category__articles__article__thumbnail">
                        <?php the_post_thumbnail([300, 200]); ?>
                    </div>
                    <div class="category__articles__article__text">
                        <h2 class="category__articles__article__text__title"><?php the_title(); ?></h2>
                        <?php the_excerpt(); ?>
                        <div class="category__articles__article__meta">
                            <span class="category__articles__article__meta__date"><?php echo get_the_date(); ?></span>
                            <span>•</span>
                            <span class="category__articles__article__meta__readtime">Doba čtení: <?php echo reading_time(); ?></span>
                        </div>
                    </div>
                </article>    
                <?php endwhile; endif; ?>
            </section>
            <footer class="category__footer">
                <?php the_posts_pagination([
                    'prev_text' => '« Předcházející',
                    'next_text' => 'Následující »'
                    ]); ?>
            </footer>
        </main>

        <?php get_footer(); ?>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/jquery.min.js"></script>
    </body>
</html>