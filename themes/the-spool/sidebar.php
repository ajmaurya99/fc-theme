<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package The_spool
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
?>

<!--
Show Popular Posts -
http://www.wpbeginner.com/wp-tutorials/how-to-track-popular-posts-by-views-in-wordpress-without-a-plugin/
-->

<aside>

    <div class="coming-next">
        <?php   get_template_part('template-parts/template', 'comingSoon'); ?>
    </div>
    <div class="popular-posts">
        <?php
        $popularpost = new WP_Query(array('posts_per_page' => 3, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'post__not_in' => array($post->ID)));
        if ($popularpost->have_posts()) { ?>
            <h5 class="heading">Popular Interviews</h5>
            <?php while ($popularpost->have_posts()) : $popularpost->the_post(); ?>
                <div class="post-view">
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
                            <?php if (have_rows('interviewee_info')): ?>
                                <?php while (have_rows('interviewee_info')): the_row() ?>
                                    <h3 class="heading"> <?php the_title(); ?>
                                        <span> <?php the_sub_field('interviewee_quote') ?></span>
                                    </h3>
                                <?php endwhile;
                            endif; ?>
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
            <?php endwhile;
        }
        ?>
    </div>

    <?php //dynamic_sidebar( 'sidebar-1' ); ?>
    <?php global $wp;
    if ($wp->query_vars['template'] == 'short') { ?>
        <div class="read-full-btn">
            <a href="<?php the_permalink($recent['ID']); ?>"
               class="btn btn-default btn-spool">Read Full Interview</a>
        </div>
    <?php } ?>
    <div class="add-top-height">
        <div class="email-signup widget-area" id="secondary" role="complementary" data-spy="affix-top">
            <p class="montserrat-font title">
                The best
                conversations,
                delivered to
                your inbox.
            </p>
            <?php echo do_shortcode("[mc4wp_form id=\"58\"]"); ?>
        </div>
    </div>


</aside><!-- #secondary -->
