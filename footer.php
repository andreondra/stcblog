<footer class="footer">
    <section class="footer__copyright"><?php echo get_theme_mod('settings_footer_copyright', '');?></section>
    <section class="footer__socials">
        <?php if(esc_url(get_theme_mod('settings_footer_logo1')) != "") :  ?>
            <a class="footer__socials__icon" href=<?php echo esc_url(get_theme_mod('settings_footer_link1'))?>><img src=<?php echo esc_url(get_theme_mod('settings_footer_logo1'))?> alt=""/></a>
        <?php endif; ?>
        <?php if(esc_url(get_theme_mod('settings_footer_logo2')) != "") :  ?>
            <a class="footer__socials__icon" href=<?php echo esc_url(get_theme_mod('settings_footer_link2'))?>><img src=<?php echo esc_url(get_theme_mod('settings_footer_logo2'))?> alt=""/></a>
        <?php endif; ?>
        <?php if(esc_url(get_theme_mod('settings_footer_logo3')) != "") :  ?>
            <a class="footer__socials__icon" href=<?php echo esc_url(get_theme_mod('settings_footer_link3'))?>><img src=<?php echo esc_url(get_theme_mod('settings_footer_logo3'))?> alt=""/></a>
        <?php endif; ?>
    </section>
</footer>
<?php wp_footer(); ?>
<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/jquery.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory');?>/assets/js/main.js"></script>