<?php
/**
 *  Template Name: About us page
 */

get_header();
?>

<section class="section-hero-about animated slide-in-diagonal">
    <div class="blog-label  mb-[1rem] ">
        <span>About
            Us</span>
    </div>
    <div class="hero-about-header font-bold w-[88%]">
        <div class="text we-are"><?php echo get_theme_mod('about_text_1', 'We are'); ?></div>
        <div class="text number"><?php echo get_theme_mod('about_number', '122'); ?></div>
        <div class="text vertical">
            <div><?php echo get_theme_mod('about_text_2', 'Digital'); ?></div>
            <div><?php echo get_theme_mod('about_text_3', 'Nerds'); ?></div>
        </div>

    </div>
    <div class="hero-about-icons">

        <?php
        $cards = array();
        for ($i = 1; $i <= 4; $i++) {

            $cards[] = array(
                'order' => get_theme_mod("about_page_card_{$i}_order", $i),
                'image' => get_theme_mod("about_page_card_{$i}_image"),
                'text' => get_theme_mod("about_page_card_{$i}_text"),
                'title' => get_theme_mod("about_page_card_{$i}_title"),
            );

        }

        usort($cards, function ($a, $b) {
            return $a['order'] - $b['order'];
        });

        foreach ($cards as $card): ?>

            <div class="about-us-item">
                <div class="icon-wrapper">
                    <img src="<?php echo $card['image']; ?>" alt="product owner">
                </div>
                <div class="role-name"> <?php echo $card['title']; ?></div>
            </div>


        <?php endforeach; ?>





    </div>
</section>
<section class="section-content-about">
    <div class="content-about-header"></div>
    <div class="content-about-main">

        <div class="main-content">
            <?php

            $about_query = new WP_Query(
                array(
                    'post_type' => 'about',
                    'posts_per_page' => -1,
                )
            );


            if ($about_query->have_posts()):
                $index = 0;

                while ($about_query->have_posts()):
                    $about_query->the_post();
                    // Setting element class
                    $class = ($index % 2 == 0) ? 'main-item-a' : 'main-item-b';
                    ?>
                    <div class="<?php echo $class; ?>">
                        <?php if ($class == 'main-item-a'): ?>
                            <div class="item-image-wrapper">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="item-body">
                            <div class="item-header"><?php the_title(); ?></div>
                            <div class="item-text">
                                <?php
                                $content = get_the_content();
                                $trimmed_content = wp_trim_words($content, 30, '...'); // 20 - количество слов, '...' - символы, добавляемые в конце
                                echo $trimmed_content;
                                ?>
                            </div>
                            <div class="item-button"><a href="<?php the_permalink(); ?>"><span>Mehr erfahren</span></a></div>
                        </div>
                        <?php if ($class == 'main-item-b'): ?>
                            <div class="item-image-wrapper">
                                <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail(); ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php
                    $index++;
                endwhile;

                wp_reset_postdata();
            else:
                echo '<p>No posts found.</p>';
            endif;
            ?>
        </div>
        <!-- <div class="main-item-a">
            <div class="item-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/was_machen_wir.png" alt="">
            </div>
            <div class="item-body">
                <div class="item-header">Was machen wir?</div>
                <div class="item-text">Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary content. However, test-users or test data...</div>
                <div class="item-button"><a href="/what-we-do"><span>Mehr erfahren</span></a></div>
            </div>
        </div>
        <div class="main-item-b">
            <div class="item-body">
                <div class="item-header">Wo arbeiten wir?</div>
                <div class="item-text">Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary content. However, test-users or test data...</div>
                <div class="item-button"><span>Mehr erfahren</span></div>
            </div>
            <div class="item-image-wrapper"> <img
                    src="<?php echo get_template_directory_uri(); ?>/images/wo_arbeiten_wir.png" alt=""></div>

        </div>
        <div class="main-item-a">
            <div class="item-image-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/wie_entwickeln_wir_software.png" alt="">
            </div>
            <div class="item-body">
                <div class="item-header">Wie entwickeln wir software?</div>
                <div class="item-text">Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary content. However, test-users or test data...</div>
                <div class="item-button"><span>Mehr erfahren</span></div>
            </div>
        </div>
        <div class="main-item-b">
            <div class="item-body">
                <div class="item-header">Agile Arbeitsweise</div>
                <div class="item-text">Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary content. However, test-users or test data...</div>
                <div class="item-button"><span>Mehr erfahren</span></div>
            </div>
            <div class="item-image-wrapper"> <img
                    src="<?php echo get_template_directory_uri(); ?>/images/agile_arbeitsweise.png" alt=""></div>

        </div> -->
    </div>
</section>

<?php

get_footer();
