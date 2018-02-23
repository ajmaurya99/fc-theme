<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package The_spool
 */

get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="error-404 not-found">
                <div class="container">
                    <div class="post-header-info post-info display-table about-wrapper">
                        <div class="table-cell">
                            <div class="post-header-info-desktop">
                                <h3 class="post-heading">
                                    Oops, Page Not Found...
                                </h3>
                            </div>
                        </div>
                    </div>
                </div> <!-- #container -->
            </section><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
