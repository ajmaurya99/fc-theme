<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_spool
 */

get_header(); ?>

    <div id="primary" class="content-area home-page">
        <main id="main" class="site-main" role="main">
            <?php
            if (have_posts()) : ?>
                <header>
                    <!-- TODO Create Settings Page -->
                    <?php $heading_text = get_option('heading_text'); ?>
                    <h2 class="heading remove-margin">
                        <span><?php echo $heading_text; ?></span>
                        <?php // the_field("website_header_text", '48'); ?>
                    </h2>

                    <div class="scroll-down">
                        <a href="#home-post-container" class="home-page-scroll-down">
                            <img src="<?php bloginfo('stylesheet_directory'); ?>/images/down-arrow-white.png"/>
                        </a>
                    </div>

                </header>
                <div class="container home-post-container" id="home-post-container">
                    <div class="row">
                        <?php
                        global $post;
                          $args = array('posts_per_page' => 25,
                            'post__not_in' => array('253'),  // Exclude Chetan Bhagat Post Version 2.0
                        );
                        $lastposts = get_posts($args);
                        $image_format = 1;
                        $incre = 1;
                        foreach ($lastposts as $post) :
                            setup_postdata($post);
                            $media_size = 'medium';
                            // Get Upcoming Post
                            if ($incre == 2) : ?>
                                <article class="col-md-6 post-view">
                                    <?php get_template_part('template-parts/template', 'comingSoon'); ?>
                                </article>
                            <?php endif; ?>
                            <article class="col-md-6 post-view">
                                <?php get_template_part('template-parts/template', 'regularPost'); ?>
                            </article>
                            <?php
                            if ($incre < 3)
                                $incre++;
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
