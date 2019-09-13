<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory');?>/style.css"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>STC blog <?php wp_title('| ', true,'left'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body class="ms-Fabric">
        <?php get_header(); ?>
            
            
        <div class="main post">
            <header class="post__header">
                <h1><?php echo wp_title('', true,'right'); ?></h1>
                <div class="post__header__meta">
                    
                    <span class="post__header__meta__date"><?php echo get_the_date(); ?></span>
                    <span>•</span>
                    <span class="post__header__meta__tags"><?php echo the_tags('#',' #',''); ?></span>
                    <span>•</span>
                    <span class="post__header__meta__author"><?php echo the_author(' ', true); ?></span>
                    
                </div>
            
            
            
            </header>
            
            <article class="post__article">
                <div class="poste__article__content">
                
                
                <?php the_post(); the_content(); ?>
                </div>
            
            
            
            </article>
        </div>



        <?php get_footer(); ?>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/main.js"></script>
    </body>
</html>