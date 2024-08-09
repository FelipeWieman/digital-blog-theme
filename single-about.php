<?php
get_header();

while (have_posts()):
    the_post();
    ?>

    <section class="section-what-we-do">
        <div class="single-header">
            <div class="single-picture">
                <div class="picture-container">
                    <?php if (has_post_thumbnail()): ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
                            alt="<?php the_title(); ?>">
                    <?php endif; ?>
                </div>
                <div class="title"><span><?php the_title(); ?></span></div>
            </div>
        </div>
        <div class="single-content">
            <div class="content-info"> </div>
            <div class="content-body">
                <?php
                the_content();
                ?>
            </div>
        </div>
    </section>

    <?php
endwhile;

get_footer();
