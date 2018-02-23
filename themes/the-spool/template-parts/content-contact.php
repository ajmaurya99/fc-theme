<?php
/**
 * The template for displaying About Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package The_spool
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <div class="post-header-info post-info display-table about-wrapper">
            <div class="table-cell">
                <div class="post-header-info-desktop">

                    <header class="entry-header">
                        <h3 class="post-heading">
                            <?php the_field('contact_page_heading'); ?>
                        </h3>
                    </header><!-- .entry-header -->

                    <div class="entry-content">
                        <p class="about-info">
                            <?php the_content(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- #container -->
</article>