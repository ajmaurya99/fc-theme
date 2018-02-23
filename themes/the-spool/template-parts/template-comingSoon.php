<?php
/**
 * Template for coming soon post
 */
?>


<?php if (have_rows('next_interview_details', get_id_by_slug('about'))): ?>
<?php while (have_rows('next_interview_details', get_id_by_slug('about'))): the_row(); ?>
        <div class="meta-info">
            <div class="feature-image">
                <?php $image = get_sub_field('next_interviewee_image', get_id_by_slug('about'));
                if (!empty($image)): ?>
                    <img src="<?php echo $image['url']; ?>" class="img-responsive"/>
                <?php endif; ?>
            </div>
            <div class="caption">
                <h3 class="heading">
                    <?php the_sub_field('next_interviewee_title', get_id_by_slug('about')) ?>
                    <br>
                    <span class="font-change">
                                        <?php the_sub_field('coming_dates', get_id_by_slug('about')) ?>
                                    </span>
                </h3>
            </div>
        </div>
    <?php
endwhile;
endif;