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
                <h1><?php echo the_title(); ?></h1>
                <div class="post__header__meta">
                    
                    <span class="post__header__meta__date"><?php echo get_the_date(); ?></span>
                    <span> | </span>
                    <span class="post__header__meta__category"><?php echo the_category(' ,'); ?></span>
                    <span> | </span>
                    <span class="post__header__meta__readtime">Doba čtení: <?php echo reading_time(); ?></span>
                
                    <span><br></span>
                    <span class="post__header__meta__tags"><?php echo the_tags('#',' #',''); ?></span>
                
                
                
                </div>
            
            
            
            </header>
            
            <section>
                <article class="post__article">
                    <div class="poste__article__content">
                    
                    
                    <?php the_post(); the_content(); ?>
                    </div>
                
                
                
                </article>
                
            
            
            
            </section>
            

            <footer>
                <div class="post__author">
                    <div class="post__author__photo"><?php echo get_avatar( get_the_author_meta( 'ID' )); ?></div>
                    <div class="post__author__data">
                        <h1 class="post__author__data__name"><?php the_author(); ?></h1>
                        <p class="post__author__data__description"><?php the_author_meta('description'); ?> </p>
                        <p class="post__author__data__email"><?php the_author_meta('user_email'); ?></p>
                    
                    </div>
                    
                </div>
            
            
            </footer>  

        </div>



        <?php get_footer(); ?>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory');?>/assets/js/main.js"></script>
    </body>
</html>