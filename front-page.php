<?php
/*
Template Name: Front Page
*/
get_header(); ?>

<section id="hero" class="section-hero">
    <div class="hero-text">
        <?php echo get_theme_mod('slogan_text', 'Our space for technology 👾, design 🎨 and innovation 🚀.'); ?>
    </div>
    <div class="hero-cards-container">
        <div class="card group " style="background-color:<?php echo get_theme_mod('main_color_1', '#ffe005'); ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="card-name text-black"><span><?php echo get_theme_mod('card_1_title', 'Blog'); ?></span>
                    </div>
                    <div class="card-arrow"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg></div>
                </div>
                <div class="card-bottom">
                    <div class="bottom-text text-black">Number of Posts</div>
                    <div class="bottom-number text-black"><?php echo wp_count_posts('post')->publish; ?></div>
                </div>
            </div>
        </div>
        <div class="card  " style="background-color:<?php echo get_theme_mod('main_color_2', '#5f369c'); ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="card-name"><span><?php echo get_theme_mod('card_2_title', 'About Us'); ?></span></div>
                    <div class="card-arrow"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z"
                                    fill="white" />
                            </g>
                        </svg></div>
                </div>
                <div class="card-bottom ">
                    <div class="bottom-text">Number of Digital Nerds</div>
                    <div class="bottom-number"><?php echo get_theme_mod('card_2_count', '122'); ?></div>
                </div>
            </div>
        </div>
        <div class="card  " style="background-color:<?php echo get_theme_mod('main_color_3', '#d63798'); ?>">
            <div class="card-content">
                <div class="card-top">
                    <div class="card-name"><span><?php echo get_theme_mod('card_3_title', 'Tech Stack'); ?></span></div>
                    <div class="card-arrow"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z"
                                    fill="white" />
                            </g>
                        </svg></div>
                </div>
                <div class="card-bottom ">
                    <div class="bottom-text">Number of Frameworks</div>
                    <div class="bottom-number">33</div>
                </div>
            </div>
        </div>

    </div>


</section>
<section id="info" class="section-info ">
    <p><?php echo get_theme_mod('moto_text', 'Say something'); ?></p>
</section>

<?php

// Getting settings from Customizer
$blog_section_title = get_theme_mod('blog_section_title', '');
$blog_section_description = get_theme_mod('blog_section_description', '');
$blog_section_post_count = get_theme_mod('blog_section_post_count', 4);
$blog_section_button_text = get_theme_mod('blog_section_button_text', __('Explore all posts', 'blog-theme'));
$blog_section_button_url = get_theme_mod('blog_section_button_url', '');

?>

<section class="section-blog rounded-[2rem]  px-[5rem] pb-[1rem]"
    style="background-color:<?php echo get_theme_mod('main_color_1', '#ffe005'); ?>">
    <div class="section-header flex justify-between">
        <div class="section-header-left">
            <h1><?php echo esc_html($blog_section_title); ?></h1>
            <p><?php echo wp_kses_post($blog_section_description); ?></p>
        </div>
        <div class="section-header-right"><?php echo wp_count_posts('post')->publish; ?></div>
    </div>
    <div class="section-content">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $blog_section_post_count,
        );
        $blog_posts = new WP_Query($args);
        if ($blog_posts->have_posts()):
            while ($blog_posts->have_posts()):
                $blog_posts->the_post(); ?>
                <div class="card">
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="card-top">
                            <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <!-- <p> <?php
                            if (strpos(get_the_content(), '<!--more-->') !== false) {
                                the_content('Read More');
                            } else {
                                the_excerpt();
                            }
                            ?>-->
                            <?php the_excerpt(); ?>
                        </div>

                        <div class="author-info flex">

                            <div class="author-left">
                                <div class="font-bold"> <span><?php the_author(); ?></span> •</div>
                                <div><span><?php echo get_the_date(); ?></span> • &bull;
                                    <span><?php comments_number(); ?></span>
                                </div>
                            </div>
                            <a href="<?php the_permalink(); ?>">
                                <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                                        </g>
                                    </svg>
                                </div>
                            </a>



                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
    <div class="explore-button-container">
        <a href="<?php echo esc_url($blog_section_button_url); ?>">
            <button class="explore-button"><?php echo esc_html($blog_section_button_text); ?></button>
        </a>
    </div>
</section>

<!-- <section class="section-blog rounded-[2rem]  px-[5rem] pb-[1rem]">
    <div class="section-header flex justify-between">
        <div class="section-header-left">
            <h1>Digital Blog</h1>
            <?php the_field('digital_blog_description') ?>

        </div>
        <div class="section-header-right">32</div>
    </div>
    <div class="section-content">
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/macbook_pro_laptop-wallpaper-3840x2400-1.jpg"
                alt="Image 1">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                        <div class="font-bold">Marta Musterfrau</div>
                        <div>06 August 2023 &bull; 0 Comments</div>
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">

            <img src="<?php echo get_template_directory_uri(); ?>/images/macbook_pro_laptop-wallpaper-3840x2400-1.jpg"
                alt="Image 1">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                        <div class="font-bold">Marta Musterfrau</div>
                        <div>06 August 2023 &bull; 0 Comments</div>
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">

            <img src="<?php echo get_template_directory_uri(); ?>/images/macbook_pro_laptop-wallpaper-3840x2400-1.jpg"
                alt="Image 1">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                        <div class="font-bold">Marta Musterfrau</div>
                        <div>06 August 2023 &bull; 0 Comments</div>
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
        <div class="card">

            <img src="<?php echo get_template_directory_uri(); ?>/images/macbook_pro_laptop-wallpaper-3840x2400-1.jpg"
                alt="Image 1">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                        <div class="font-bold">Marta Musterfrau</div>
                        <div>06 August 2023 &bull; 0 Comments</div>
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="explore-button-container">
        <a href="/blog"><button class="explore-button">Explore all posts</button></a>
    </div>
</section> -->

<section class="section-about-us rounded-[2rem]  px-[5rem] pb-[1rem]"
    style="background-color:<?php echo get_theme_mod('main_color_2', '#5f369c'); ?>">
    <div class="section-header flex justify-between">
        <div class="section-header-left">
            <h1><?php echo get_theme_mod('about_us_title', 'About Us'); ?></h1>
            <p><?php echo get_theme_mod('about_us_description'); ?></p>
        </div>
        <div class="section-header-right"> </div>
    </div>
    <div class="section-content">

        <?php
        $cards = array();
        for ($i = 1; $i <= 4; $i++) {
            if (get_theme_mod("about_us_card_{$i}_enabled", true)) {
                $cards[] = array(
                    'order' => get_theme_mod("about_us_card_{$i}_order", $i),
                    'image' => get_theme_mod("about_us_card_{$i}_image"),
                    'text' => get_theme_mod("about_us_card_{$i}_text"),
                    'title' => get_theme_mod("about_us_card_{$i}_title"),
                );
            }
        }

        usort($cards, function ($a, $b) {
            return $a['order'] - $b['order'];
        });

        foreach ($cards as $card): ?>
            <div class="card">
                <img src="<?php echo $card['image']; ?>" alt="Card">
                <div class="card-body">
                    <h2>
                        <?php echo $card['title']; ?>
                    </h2>

                    <p><?php echo $card['text']; ?></p>

                    <div class="author-info flex">
                        <div class="author-left">
                        </div>
                        <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <path d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <!-- <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about_us_pic.png" alt="Image 1">

            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about_us_pic_2.png" alt="Image 2">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">

                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about_us_pic_3.png" alt="Image 3">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">
                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <img src="<?php echo get_template_directory_uri(); ?>/images/about_us_pic_4.png" alt="Image 4">
            <div class="card-body">
                <h2>Lorem Ipsum dolor</h2>
                <p>Introduction Testing email functionality
                    during the
                    pre-production
                    phase is critical to ensuring that emails are delivered correctly and with the
                    necessary…</p>
                <div class="author-info flex">
                    <div class="author-left">

                    </div>
                    <div class="author-right flex w-[2rem] hover:scale-[1.3] transition-all cursor-pointer">
                        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <g>
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
                            </g>
                        </svg>
                    </div>

                </div>
            </div>
        </div> -->
    </div>
    <div class="explore-button-container">
        <a href="<?php echo get_theme_mod('about_us_button_url', '/about'); ?>"> <button
                class="explore-button"><?php echo get_theme_mod('about_us_button_text', 'More about us'); ?></button></a>
    </div>
</section>

<section id="tech_stack" class="section-tech-stack rounded-[2rem]"
    style="background-color:<?php echo get_theme_mod('main_color_3', '#d63798'); ?>">
    <div class="section-header">
        <div class="section-header-left">
            <h1>Tech Stack</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis ea
                harum
                voluptatem
                suscipit <span> &nbsp;fugiat ad, esse fuga, &nbsp;</span> aperiam nostrum temporibus
                sapiente, hic
                reiciendis odio
                accusantium aut magnam? Sint, culpa ex.</p>
        </div>
        <div class="section-header-right"> </div>
    </div>
    <div class="section-content">
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="translate-y-[-3rem]" src="<?php echo get_template_directory_uri(); ?>/images/js.png" alt="">
            </div>
            <p>JavaScript</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="translate-y-[-1.5rem]" src="<?php echo get_template_directory_uri(); ?>/images/python.jpg"
                    alt="">
            </div>
            <p>Python</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1.5rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/nodejs.png" alt="">
            </div>
            <p>Node.js</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.7] translate-y-[-.5rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/react.png" alt="">
            </div>
            <p>React</p>
        </div>
        <div class="tech-card ">
            <div class="tech-card-image  ">
                <img class="scale-[1.2] translate-y-[1rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/html5.png" alt="">
            </div>
            <p>HTML5</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1rem] "
                    src="<?php echo get_template_directory_uri(); ?>/images/java.png" alt="">
            </div>
            <p>Java</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1.9rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/ngnix.png" alt="">
            </div>
            <p>NGINX</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.7] translate-y-[]"
                    src="<?php echo get_template_directory_uri(); ?>/images/MongoDB-Emblem.jpg" alt="">
            </div>
            <p>MongoDB</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">

                <img class="tech-card-image translate-y-[-2rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/ts.png" alt="">
            </div>
            <p>TypeScript</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/es6.png" alt="">
            </div>
            <p>ES6</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.9] translate-y-[-.1rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/apache.jpg" alt="">
            </div>
            <p>Apache HTT...</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1.2rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/css.jpg" alt="">
            </div>
            <p>CSS3</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/redis.jpg" alt="">
            </div>
            <p>Redis</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.8] translate-y-[-.1rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/sass.png" alt="">
            </div>
            <p>Sass</p>
        </div>

        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/ruby.png" alt="">
            </div>
            <p>Ruby</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-.7rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/redux.png" alt="">
            </div>
            <p>Redux</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/springboot.png" alt="">
            </div>
            <p>Spring Boot</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/ms-azure.png" alt="">
            </div>
            <p>MS Azure</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img class="scale-[0.6] translate-y-[-1.6rem]"
                    src="<?php echo get_template_directory_uri(); ?>/images/kafka.png" alt="">
            </div>
            <p>Kafka</p>
        </div>
        <div class="tech-card">
            <div class="tech-card-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/apache-tomcat.png" alt="">
            </div>
            <p class="">Apache Tomcat</p>
        </div>


    </div>
    <div class="explore-button-container">
        <button class="explore-button">How we code</button>
    </div>
</section>

<?php get_footer();