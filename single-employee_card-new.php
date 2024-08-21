<?php
// Template for displaying single employee card
get_header('employee'); ?>

<div class="employee-card-petrol">
    <!-- SVG должен быть на заднем плане, поэтому его z-index ниже всех -->
    <div class="employee-card-petrol_svg">
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            x="0px" y="0px" viewBox="0 0 375 487.8" style="enable-background:new 0 0 375 487.8;" xml:space="preserve">
            <style type="text/css">
                .st0 {
                    fill: white;
                }
            </style>
            <polygon class="st1" points="382.4,554.9 -8.6,554.9 -8.6,257.9 382.4,398.9 " style="fill:#5fa9ba;">
            </polygon>
            <rect x="182" y="121.7" transform="matrix(0.3448 -0.9387 0.9387 0.3448 -186.7654 389.4778)" class="st0"
                width="7.2" height="413.7"></rect>
            <rect x="315.3" y="328.2" transform="matrix(0.3374 -0.9414 0.9414 0.3374 -158.1293 560.2241)" class="st0"
                width="7.2" height="128.4"></rect>
            <rect x="303.8" y="279.1" transform="matrix(0.3412 -0.94 0.94 0.3412 -132.2774 523.5345)" class="st0"
                width="7.2" height="154.1"></rect>
            <rect x="216.3" y="-113.9" transform="matrix(0.3425 -0.9395 0.9395 0.3425 90.2338 241.7497)" class="st0"
                width="3.1" height="340.6"></rect>
        </svg>
    </div>

    <div class="employee-card-petrol__header">
        <?php

        $background_image = get_field('background_image');


        if ($background_image):
            ?>
            <img src="<?php echo esc_url($background_image); ?>" alt="Team Background" class="employee-card__background">
        <?php else: ?>
            <img src="<?php echo get_template_directory_uri() . '/images/hacka_tum_vorbereitung_p1011265_small.jpg'; ?>"
                alt="Team Background" class="employee-card__background">
        <?php endif; ?>



    </div>

    <!-- Firmenlogo -->
    <div class="employee-card__logo"
        style="background-image: url('<?php echo get_template_directory_uri() . '/images/logo_interhyp-gruppe_2021_rgb.svg' ?>');">
    </div>

    <!-- Mitarbeiterfoto -->
    <div class="employee-card__photo">
        <?php
        echo wp_get_attachment_image(get_the_ID());
        ?>
    </div>


    <div class="employee-card__photo">
        <?php
        $image_url = get_field('profil_bild'); // Holt die Bild-URL aus dem ACF-Feld
        $image_id = attachment_url_to_postid($image_url); // Holt die Bild-ID basierend auf der URL
        
        if ($image_id) {
            echo wp_get_attachment_image($image_id, 'custom-size'); // 'custom-size' ist die benutzerdefinierte Bildgröße
        } else {
            // Falls keine ID gefunden wird, Bild direkt aus URL anzeigen
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_field('employee_name')) . '" style="width:300px; height:auto;">';
        }
        ?>
    </div>



    <!-- Name, Position und Unternehmen -->
    <div class="employee-card-petrol__body">
        <h2 class="employee-card__name"><?php the_field('employee_name'); ?></h2>
        <p class="employee-card__position"><?php the_field('employee_position'); ?></p>
        <p class="employee-card__company"><?php the_field('company_name'); ?></p>
    </div>



    <!-- Kontaktmethoden -->
    <div class="employee-card-petrol__contacts">
        <?php if (get_field('linkedin_url')): ?>
            <a href="<?php the_field('linkedin_url'); ?>" class="employee-card__contact">
                <?php if (get_field('linkedin_icon')): ?>
                    <img src="<?php the_field('linkedin_icon'); ?>" alt="LinkedIn Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin_icon@72x.png" alt="LinkedIn Icon">
                <?php endif; ?>
                LinkedIn
            </a>
        <?php endif; ?>

        <?php if (get_field('facebook_url')): ?>
            <a href="<?php the_field('facebook_url'); ?>" class="employee-card__contact">
                <?php if (get_field('facebook_icon')): ?>
                    <img src="<?php the_field('facebook_icon'); ?>" alt="Facebook Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/facebook_icon.jpg" alt="Facebook Icon">
                <?php endif; ?>
                Facebook
            </a>
        <?php endif; ?>

        <?php if (get_field('twitter_url')): ?>
            <a href="<?php the_field('twitter_url'); ?>" class="employee-card__contact">
                <?php if (get_field('twitter_icon')): ?>
                    <img src="<?php the_field('twitter_icon'); ?>" alt="Twitter Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/twitter_icon.png" alt="Twitter Icon">
                <?php endif; ?>
                Twitter
            </a>
        <?php endif; ?>

        <?php if (get_field('instagram_url')): ?>
            <a href="<?php the_field('instagram_url'); ?>" class="employee-card__contact">
                <?php if (get_field('instagram_icon')): ?>
                    <img src="<?php the_field('instagram_icon'); ?>" alt="Instagram Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/instagram_icon.png" alt="Instagram Icon">
                <?php endif; ?>
                Instagram
            </a>
        <?php endif; ?>

        <?php if (get_field('website_url')): ?>
            <a href="<?php the_field('website_url'); ?>" class="employee-card__contact">
                <?php if (get_field('website_icon')): ?>
                    <img src="<?php the_field('website_icon'); ?>" alt="Website Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/website_icon.png" alt="Website Icon">
                <?php endif; ?>
                <?php echo the_field('website_name'); ?>
            </a>
        <?php endif; ?>

        <?php if (get_field('email')): ?>
            <a href="mailto:<?php the_field('email'); ?>" class="employee-card__contact">
                <?php if (get_field('email_icon')): ?>
                    <img src="<?php the_field('email_icon'); ?>" alt="E-Mail Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/email_icon.png" alt="E-Mail Icon">
                <?php endif; ?>
                E-Mail
            </a>
        <?php endif; ?>

        <?php if (get_field('telefon')): ?>
            <a href="tel:<?php the_field('telefon'); ?>" class="employee-card__contact">
                <?php if (get_field('telefon_icon')): ?>
                    <img src="<?php the_field('phone_icon'); ?>" alt="Telefon Icon">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/phone_icon.png" alt="Telefon Icon">
                <?php endif; ?>
                Telefon
            </a>
        <?php endif; ?>
    </div>

</div>

<!-- footer-employee.php -->

</main>

<footer class="custom-footer">
    <?php wp_footer(); ?>
</footer>


</body>

</html>