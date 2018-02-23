<?php
/**
 */
?>

    <div class="meta-info">
        <div class="feature-image">
            <a href="<?php the_permalink(); ?>">
                <?php
                the_post_thumbnail('medium',
                    array(
                        'class' => 'img-responsive',
                        'title' => get_the_title()
                    )); ?>
            </a>
        </div>
        <div class="caption">
            <?php if (have_rows('interviewee_info', $post->ID)): ?>
            <?php while (have_rows('interviewee_info', $post->ID)): the_row() ?>
            <h3 class="heading"><?php echo get_the_title(); ?>
                , <?php the_sub_field('interviewee_profession', $post->ID); ?>
                <?php endwhile; ?>
                <?php endif; ?>
                <br>
                <span>
                                                <?php if (have_rows('interviewee_info', $post->ID)): ?>
                                                    <?php while (have_rows('interviewee_info', $post->ID)): the_row(); ?>
                                                        <?php the_sub_field('interviewee_quote', $post->ID); ?>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                            </span>
            </h3>
            <p class="spool-btn-group">
                <?php
                $short_url = add_query_arg('template', 'short', get_permalink($recent['ID']));
                # Outputs for example: http://thespool.in/postname/?template=short
                ?>
                <a href="<?php the_permalink($recent['ID']); ?>"
                   class="btn btn-default btn-spool">Long read</a>
                <a href="<?php echo $short_url; ?>"
                   class="btn btn-default btn-spool">Quick read</a>
            </p>
        </div>
    </div>

