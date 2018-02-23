<?php
/**
 * The loop that displays the post according to the query
 *
 * @package rtPanel
 *
 * @since rtPanel 2.0
 */
global $rtp_post_comments;

/* Archive Page Titles */
if ( is_search() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Search Results for: %s', 'rtPanel' ), '<span>' . get_search_query() . '</span>' ); ?></h1><?php } elseif ( is_tag() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Tags: %s', 'rtPanel' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1><?php } elseif ( is_category() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Category: %s', 'rtPanel' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1><?php } elseif ( is_day() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Archive for %s', 'rtPanel' ), '<span>' . get_the_time( 'F jS, Y' ) . '</span>' ); ?></h1><?php } elseif ( is_month() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Archive for  %s', 'rtPanel' ), '<span>' . get_the_time( 'F, Y' ) . '</span>' ); ?></h1><?php } elseif ( is_year() ) {
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Archive for  %s', 'rtPanel' ), '<span>' . get_the_time( 'Y' ) . '</span>' ); ?></h1><?php
} elseif ( is_author() ) {
	$curauth = ( isset( $_GET[ 'author_name' ] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
	?>
	<h1 class="post-title rtp-main-title"><?php printf( __( 'Author: %s', 'rtPanel' ), '<span>' . $curauth->display_name . '</span>' ); ?></h1><?php
}

/* The Loop */
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		?>

		<article id="post-<?php if ( ! rtp_is_bbPress() ) {
			the_ID();
		} else {
			echo 'forum-index';
		} ?>" <?php post_class( 'clearfix rtp-post-box' ); ?>>
				<?php rtp_hook_begin_post(); ?>

			<header class="post-header <?php echo esc_attr( rtp_is_buddypress() ? 'clearfix' : '' ); ?>">
				<?php rtp_hook_begin_post_title(); ?>

				<?php if ( is_singular() ) { ?>
					<h1 class="post-title entry-title"><?php the_title(); ?></h1><?php } else {
					?>
                                        <h2 class="post-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permanent Link to %s', 'rtPanel' ), the_title_attribute( 'echo=0' ) ); ?>" class="url"><?php the_title(); ?></a></h2><?php }
				?>

				<?php rtp_hook_end_post_title(); ?>

				<?php rtp_hook_post_meta( 'top' ); ?>
			</header><!-- .post-title -->

			<div class="post-content">
				<?php rtp_hook_begin_post_content(); ?>

				<?php rtp_show_post_thumbnail(); ?>

				<?php
		if ( is_singular() || ! $rtp_post_comments[ 'summary_show' ] || rtp_is_bbPress() || rtp_is_rtmedia() ) {
			the_content( __( 'Read More &rarr;', 'rtPanel' ) );
			wp_link_pages( array( 'before' => '<div class="page-link clearfix">' . __( 'Pages:', 'rtPanel' ), 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );
		} else {
			@the_excerpt();
		}
				?>

		<?php rtp_hook_end_post_content(); ?>
			</div><!-- .post-content -->

		<?php rtp_hook_post_meta( 'bottom' ); ?>

		<?php rtp_hook_end_post(); ?>

		</article><!-- .rtp-post-box --><?php
		/* Post Pagination */
		rtp_hook_single_pagination();

		// Comment Form
		rtp_hook_comments();
	}

	rtp_hook_archive_pagination();
} else {
	/* If there are no posts to display */
	if ( ! is_search() ) {
		?>
		<h1 class="post-title rtp-main-title"><?php _e( 'Not Found', 'rtPanel' ); ?></h1><?php }
	?>

	<?php rtp_hook_begin_post(); ?>

	<div class="post-content rtp-not-found">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'rtPanel' ); ?></p>
	<?php get_search_form(); ?>
	</div>

	<?php rtp_hook_end_post(); ?>
	<?php
}