<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title><?php echo get_bloginfo('name'); ?> <?php wp_title('| ', true,'left'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body class="ms-Fabric">
        <?php get_header(); ?>
               
        <main class="main post">
            <header class="post__header">
                <h1><?php the_post(); the_title(); ?></h1>
                <div class="post__header__meta">
                    <span class="post__header__meta__date"><?php echo get_the_date(); ?></span>
                    <span>•</span>
                    <span class="post__header__meta__category"><?php echo the_category(' ,'); ?></span>
                    <span>•</span>
                    <span class="post__header__meta__readtime">Doba čtení: <?php echo reading_time(); ?></span>
                    <span><br></span>
                    <span class="post__header__meta__tags"><?php echo the_tags('#',' #',''); ?></span>       
                </div>
            </header> 

            <article class="post__content">
                <?php the_content(); ?>
            </article>

            <footer class="post__footer">
                <div class="post__footer__author">
                    <div class="post__footer__author__photo"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></div>
                    <div class="post__footer__author__data">
                        <h1 class="post__footer__author__data__name"> <!--<a href="<?php echo the_author_link(); ?>">--><?php the_author(); ?><!--</a>--> </h1>
                        <p class="post__footer__author__data__description"><?php the_author_meta('description'); ?> </p>
                        <p class="post__footer__author__data__email">Email: <a href="mailto:<?php the_author_meta('user_email'); ?>"><?php the_author_meta('user_email'); ?></a></p>
                    </div>
                </div>
            </footer>  
        </main>

        <?php get_footer(); ?>
    </body>
</html>