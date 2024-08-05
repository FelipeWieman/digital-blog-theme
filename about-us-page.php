<?php
/**
 *  Template Name: About us page
 */

get_header();
?>

<section class="section-hero-about ">
    <div class="blog-label  mb-[1rem] ">
        <span>About
            Us</span>
    </div>
    <div class="hero-about-header font-bold w-[88%]">
        <div class="text we-are">We are</div>
        <div class="text number">122</div>
        <div class="text vertical">
            <div>Digital</div>
            <div>Nerds</div>
        </div>

    </div>
    <div class="hero-about-icons">
        <div class="about-us-item">
            <div class="icon-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/product_owner.png" alt="product owner">
            </div>
            <div class="role-name">Product Owner</div>
        </div>
        <div class="about-us-item">
            <div class="icon-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ux_designer.png" alt="product owner">
            </div>
            <div class="role-name">UX-Designer</div>
        </div>
        <div class="about-us-item">
            <div class="icon-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/service_designer.png" alt="product owner">
            </div>
            <div class="role-name">Service Designer</div>
        </div>
        <div class="about-us-item">
            <div class="icon-wrapper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/developer.png" alt="product owner">
            </div>
            <div class="role-name">Developer</div>
        </div>
    </div>
</section>
<section class="section-content-about">
    <div class="content-about-header">Lorem Ipsum</div>
    <div class="content-about-main">
        <div class="main-item-a">
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

        </div>
    </div>
</section>

<?php

get_footer();
