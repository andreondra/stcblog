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
        <div class="fouroufour__picture">
            <img id="404-picture" src="<?php echo get_theme_file_uri( 'assets/img/cat.svg'); ?>"/>
        </div>
        
        <?php get_footer(); ?>
    </body>
</html>