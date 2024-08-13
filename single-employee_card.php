<?php
// Template for displaying single employee card
get_header('employee'); ?>

<div class="employee-card">
    <div class="employee-card__header">
        <img src="<?php echo get_template_directory_uri() . '/images/hacka_tum_vorbereitung_p1011265_small.jpg'; ?>"
            alt="Team Background" class="employee-card__background">

        <!-- Mitarbeiterfoto -->
        <div class="employee-card__photo">
            <img src="<?php the_field('profil_bild'); ?>" alt="<?php the_field('employee_name'); ?>">
        </div>

        <!-- Firmenlogo -->
        <div class="employee-card__logo"
            style="background-image: url('<?php echo get_template_directory_uri() . '/images/logo_interhyp-gruppe_2021_rgb.svg' ?>');">
        </div>
    </div>

    <!-- Name, Position und Unternehmen -->
    <div class="employee-card__body">
        <h2 class="employee-card__name"><?php the_field('employee_name'); ?></h2>
        <p class="employee-card__position"><?php the_field('employee_position'); ?></p>
        <p class="employee-card__company"><?php the_field('company_name'); ?></p>
    </div>

    <!-- Kontaktmethoden -->
    <div class="employee-card__contacts">
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

<?php get_footer('employee'); ?>