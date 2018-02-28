<?php
/**
 * The template for displaying all single posts Short  Version
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_spool
 */

get_header();
$not_in_post;
?>

    <main id="main" class="site-main" role="main">
        <?php
        while (have_posts()) : the_post(); ?>
            <?php
            wpb_get_post_views(get_the_ID());
            $not_in_post = get_the_ID();
            ?>
            <div class="sidebar-offset">
                <div class="container">
                    <?php if (have_rows('interviewee_info')): ?>
                        <div class="post-header-info post-info display-table">
                            <div class="table-cell">
                                <?php while (have_rows('interviewee_info')): the_row() ?>
                                    <div class="post-header-info-desktop">
                                        <p>
                                            <img
                                                src="<?php bloginfo('stylesheet_directory'); ?>/images/quote-icon-top.png">
                                        </p>
                                        <h3 class="post-heading">
                                            <?php the_sub_field("interviewee_intro"); ?>
                                        </h3>
                                        <p>
                                            <img
                                                src="<?php bloginfo('stylesheet_directory'); ?>/images/quote-icon-bottom.png">
                                        </p>
                                        <h3 class="author-name heading">
                                            <?php echo the_title(); ?>
                                        </h3>
                                        <p class="author-info">
                                            <?php the_sub_field("interviewee_one_liner"); ?>
                                        </p>

                                        <?php if (have_rows('post_read_timing')): ?>
                                            <div class="post-timing">
                                                <?php
                                                $short_url = add_query_arg('template', 'short', get_permalink($post->ID));
                                                # Outputs for example: http://thespool.in/postname/?template=short
                                                ?>
                                                <?php while (have_rows('post_read_timing')): the_row(); ?>
                                                    <ul>
                                                        <li class="long-read">
                                                            <a href="<?php the_permalink(); ?>">Long Read
                                                                - <?php the_sub_field('long_read'); ?> min</a>
                                                        </li>
                                                        <li class="short-read active">
                                                            <a href="<?php echo $short_url; ?>">Quick Read
                                                                - <?php the_sub_field('quick_read'); ?> min</a>
                                                        </li>
                                                    </ul>
                                                <?php endwhile; ?>
                                            </div>
                                        <?php endif; ?>

                                        <div id="share-this-post" class="share-this-post">
                                            <?php $permalink = get_permalink($id); ?>
                                            <p>
                                            <span class="post-fb"> <a
                                                    href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>"
                                                    target="_blank"><i class="fa fa-facebook "></i></a></span>
                                                <span class="post-twitter"> <a
                                                        href="http://twitter.com/share?url=<?php echo urlencode($permalink); ?>&text=<?php the_sub_field('interviewee_quote') ?> <?php -the_title();
                                                        echo urlencode(' | The Spool via @The_Spool'); ?>"
                                                        target="_blank">
                                                        <i class="fa fa-twitter "></i></a></span>
                                                <span class="post-mail"> <a
                                                        href="mailto:?Subject=The Spool - In Conversation with '<?php echo $title; ?>'&Body= <?php echo $permalink; ?>"><i
                                                            class="fa fa-envelope "></i></a></span>
                                                <!-- I got these buttons from simplesharebuttons.com -->
                                            </p>
                                        </div>

                                        <div class="scroll-down">
                                            <a href="#scrollto" id="scrolldown">
                                                <img
                                                    src="<?php bloginfo('stylesheet_directory'); ?>/images/down-arrow.png"/>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div> <!-- #container -->
                <div class="post-author-image dektop-display-table" id="scrollto">
                    <?php if (have_rows('interviewee_image')):
                        while (have_rows('interviewee_image')): the_row();
                            ?>
                            <?php $orientation = get_sub_field('interviewee_image_orientation');
                            if ($orientation == "Vertical") { ?>
                                <div class="dektop-table-row vertical-image">
                                    <div class="image-wraper desktop-image">
                                        <?php echo wp_get_attachment_image(get_sub_field('interviewee_image_file'), 'full', "", array("class" => "img-responsive", "title" => get_the_title())); ?>
                                    </div>
                                    <div class="col-sm-12 dektop-table-cell hide-in-dektop">
                                        <div class="image-wraper mobile-image">
                                            <?php echo wp_get_attachment_image(get_sub_field('interviewee_image_file'), 'full', "", array("class" => "img-responsive", "title" => get_the_title())); ?>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-10 col-md-offset-2  col-sm-12 dektop-table-cell author-image-text">
                                        <?php if (get_field('interviewee_introduction')): ?>
                                            <article>
                                                <?php the_field("interviewee_introduction"); ?>
                                            </article>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php } elseif ($orientation == "Horizontal") { ?>
                                <div class="dektop-table-row horizontal-image">
                                    <div class="image-wraper desktop-image">
                                        <?php echo wp_get_attachment_image(get_sub_field('interviewee_image_file'), 'full', "", array("class" => "img-responsive", "title" => get_the_title())); ?>
                                    </div>
                                    <div class="col-sm-12 dektop-table-cell hide-in-dektop">
                                        <div class="image-wraper mobile-image">
                                            <?php echo wp_get_attachment_image(get_sub_field('interviewee_image_file'), 'full', "", array("class" => "img-responsive", "title" => get_the_title())); ?>
                                        </div>
                                    </div>
                                    <div
                                        class="col-md-10 col-md-offset-2  col-sm-12 dektop-table-cell author-image-text">
                                        <?php if (get_field('interviewee_introduction')): ?>
                                            <article>
                                                <?php the_field("interviewee_introduction"); ?>
                                            </article>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php }
                            ?>
                            <?php
                        endwhile;
                    endif; ?>
                </div>
            </div> <!--  sidebar-offset-->
            <div class="container">
                <div class="wp-post-content">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="post-content">
                                <?php if (get_field('quick_read')): ?>
                                    <article>
                                        <?php the_field("quick_read"); ?>
                                    </article>
                                <?php endif; ?>
                                <div class="unspoool-content">
                                    <h3 class="heading montserrat-font">
                                        Unspool
                                    </h3>
                                    <div class="highlight-info">
                                        <?php the_field("unspool_content"); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sidebar">
                                <?php get_sidebar(); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <?php wp_reset_postdata();
                ?>

                <!--  Next Post  End  -->

                <!--
              Fetch Latest 3 posts of Similar Category.
              https://wordpress.stackexchange.com/questions/30039/how-to-display-related-posts-from-same-category
              -->

                <?php
                /* //for use in the loop, list 3 post titles related to first tag on current post

                $tags = wp_get_post_tags($post->ID);
                if ($tags) {
                $first_tag = $tags[0]->term_id;
                $args = array(
                    'tag__in' => array($first_tag),
                    'post__not_in' => array($post->ID),
                    'posts_per_page' => 3,
                    'caller_get_posts' => 1
                );
                $my_query = new WP_Query($args); */

                $my_query = new WP_Query((
                array('category__in' => wp_get_post_categories($not_in_post),
                    'posts_per_page' => 3,
                    'post__not_in' => array($not_in_post)
                )));

                if ($my_query->have_posts()) { ?>
                <div class="row related-articles">
                    <h5 class="heading">You May Also Like</h5>
                    <?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

                        <div class="col-md-4 post-view">
                            <div class="meta-info">
                                <div class="feature-image">
                                    <a href="<?php the_permalink() ?>" rel="bookmark"
                                       title="Read about <?php the_title_attribute(); ?>">
                                        <?php the_post_thumbnail('thumbnail',
                                            array(
                                                'class' => 'img-responsive'
                                            )); ?>
                                    </a>
                                </div>
                                <div class="caption">
                                    <h3 class="heading"> <?php the_title(); ?>
                                        <span>  <?php the_field("caption"); ?></span>
                                    </h3>
                                    <p class="spool-btn-group">
                                        <?php
                                        $short_url = add_query_arg('template', 'short', get_permalink($post->ID));
                                        /* Outputs for example: http://thespool.in/postname/?template=short */
                                        ?>
                                        <a href="<?php the_permalink() ?>" class="btn btn-default btn-spool"
                                           rel="bookmark"
                                           title="Read about <?php the_title_attribute(); ?>">Long
                                            read</a>
                                        <a href="<?php echo $short_url; ?>"
                                           class="btn btn-default btn-spool">Quick read</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php
                    endwhile;
                    //                    }
                    wp_reset_query();
                    }
                    ?>
                </div>
            </div> <!-- #container -->
        <?php endwhile; // End of the loop.
        ?>
    </main><!-- #main -->

<?php

get_footer();