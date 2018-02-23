<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_spool
 */

?>

</div><!-- #content -->
<div class="container">
    <footer id="colophon" class="site-footer" role="contentinfo">
        <div class="footer-info">
            <hr>
            <ul>
                <li><a href="<?php bloginfo('url'); ?>/about" title="About The Spool">About Spool</a></li>
                <li><a href="<?php bloginfo('url'); ?>/contact" title="Contact The Spool">Get In Touch</a></li>
            </ul>
            <ul>
                <?php
                $facebook_url = get_option('facebook_url');
                $twitter_url = get_option('twitter_url');
                $instagram_url = get_option('instagram_url');
                $footer_text = get_option('footer_text');
                ?>
                <li><a href="<?php echo $facebook_url; ?>" target="_blank" title="Facebook The Spool"><i
                            class="fa fa-facebook" aria-hidden="true"
                            aria-label="Facebook"></i></a></li>
                <li><a href="<?php echo $twitter_url; ?>" target="_blank" title="Twitter The Spool"><i
                            class="fa fa-twitter" aria-hidden="true"
                            aria-label="Twitter"></i></a></li>
                <li><a href="<?php echo $instagram_url; ?>" target="_blank" title="Instagram The Spool"><i
                            class="fa fa-instagram" aria-hidden="true"
                            aria-label="Instagram"></i></a></li>
                <!--  <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true" aria-label="You Tube"></i></a></li> -->
            </ul>
            <p class="montserrat-font"><?php  echo $footer_text;?></p>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #container -->
</div><!-- row -->
</div><!-- #page -->
<a href="#" class="scrolltotop" ></a>
<?php wp_footer(); ?>

</body>
</html>
