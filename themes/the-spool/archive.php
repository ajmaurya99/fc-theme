<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package The_spool
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            if (have_posts()) : ?>

                <header class="page-header">
                    <?php
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                    ?>
                </header><!-- .page-header -->
                         ?>
                <div class="container home-post-container" id="home-post-container">
                    <div class="row">
                        <?php
                        global $post;
                        $args = array('posts_per_page' => 25);
                        $lastposts = get_posts($args);
                        $image_format = 1;
                        foreach ($lastposts as $post) :
                            setup_postdata($post);
                            $media_size = 'medium';
                            // Get Upcoming Post
                            ?>
                            <article class="col-md-6 post-view">
                                <?php get_template_part('template-parts/template', 'regularPost'); ?>
                            </article>
                            <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>


                <?php the_posts_navigation();

            else :

                get_template_part('template-parts/content', 'none');

            endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
