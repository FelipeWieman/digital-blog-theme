<?php
get_header();

while (have_posts()):
    the_post();
    $title1 = get_post_meta(get_the_ID(), '_about_title1', true);
    $text1 = get_post_meta(get_the_ID(), '_about_text1', true);
    $title2 = get_post_meta(get_the_ID(), '_about_title2', true);
    $text2 = get_post_meta(get_the_ID(), '_about_text2', true);
    $image2 = get_post_meta(get_the_ID(), '_about_image2', true);
    $title3 = get_post_meta(get_the_ID(), '_about_title3', true);
    $text3 = get_post_meta(get_the_ID(), '_about_text3', true);
    $image3 = get_post_meta(get_the_ID(), '_about_image3', true);
    $text4 = get_post_meta(get_the_ID(), '_about_text4', true);
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
                <div class="text-row">
                    <div class="text-underline">
                        <h2><?php echo esc_html($title1); ?></h2>
                    </div>
                    <p><?php echo esc_html($text1); ?></p>
                </div>

                <div class="flex-row">
                    <div class="text">
                        <div class="text-underline">
                            <h2><?php echo esc_html($title2); ?></h2>
                        </div>

                        <p><?php echo esc_html($text2); ?></p>
                    </div>
                    <div class="image ">
                        <img src="<?php echo esc_url($image2); ?>" alt="Image2">
                    </div>
                </div>
                <div class="flex-row-2">

                    <div class="image ">
                        <img src="<?php echo esc_html($image3); ?>" alt="Image3">
                    </div>
                    <div class="text">
                        <div class="text-underline">
                            <h2><?php echo esc_html($title3); ?></h2>
                        </div>
                        <p><?php echo esc_html($text3); ?></p>
                    </div>
                </div>
                <div class="text-row">

                    <p><?php echo esc_html($text4); ?></p>
                </div>





            </div>

        </div>

    </section>




    <?php
endwhile;

get_footer();