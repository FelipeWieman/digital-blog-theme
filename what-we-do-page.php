<?php
/*
Template Name: What-we-do Page
*/
get_header(); ?>

<section class="section-what-we-do">
    <div class="single-header">

        <div class="single-picture">
            <div class="picture-container">
                <img src="<?php echo get_template_directory_uri(); ?>/images/was_machen_wir.png" alt="">

            </div>
            <div class="title"><span>This is how we do it!</span></div>

        </div>
    </div>
    <div class="single-content">
        <div class="content-info"> </div>
        <div class="content-body">
            <div class="text-row">
                <div class="text-underline">
                    <h2>Das ist eine Überschrift</h2>
                </div>
                <p>Testing email functionality during the pre-production phase is critical to ensuring
                    that
                    emails are delivered correctly and with the necessary content. However, test-users
                    or
                    test
                    data frameworks might create existing email addresses and it is not always easy to
                    setup
                    send-restrictions on the existing SMTP infrastructure. To ensure that no external
                    emails
                    are
                    sent from the system while testing emails and layouts in as many actual email
                    clients as
                    possible, a few unique issues arise throughout this process. In this blog article,
                    we
                    will
                    examine traditional methods for testing email functionality and present a novel
                    strategy
                    that we have found to be very successful.</p>
            </div>

            <div class="flex-row">
                <div class="text">
                    <div class="text-underline">
                        <h2>Das ist eine Überschrift</h2>
                    </div>

                    <p>Using email sinks like cloud or on-premises fakeSMTP services is one frequent
                        method for
                        testing email functionality. The drawback of these solutions is that you do not
                        actually
                        get
                        a real email preview, despite how simple they are to set up. </p>
                    <p>Another strategy is
                        to use
                        custom code to take out any external mail or send to shared mailboxes in the
                        mail
                        delivering
                        application. This method, meanwhile, has several drawbacks, including changing
                        the
                        original
                        content and being prone to mistakes because of frequent changes in the
                        application.</p>
                </div>
                <div class="image ">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/what-we-do-example.png" alt="">
                </div>
            </div>
            <div class="flex-row-2">

                <div class="image ">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/what-we-do-example.png" alt="">
                </div>
                <div class="text">
                    <div class="text-underline">
                        <h2>Das ist eine Überschrift</h2>
                    </div>
                    <p>Using email sinks like cloud or on-premises fakeSMTP services is one frequent
                        method for
                        testing email functionality. The drawback of these solutions is that you do not
                        actually
                        get
                        a real email preview, despite how simple they are to set up. </p>
                    <p>Another strategy is
                        to use
                        custom code to take out any external mail or send to shared mailboxes in the
                        mail
                        delivering
                        application. This method, meanwhile, has several drawbacks, including changing
                        the
                        original
                        content and being prone to mistakes because of frequent changes in the
                        application.</p>
                </div>
            </div>
            <div class="text-row">

                <p>Testing email functionality during the pre-production phase is critical to ensuring
                    that
                    emails are delivered correctly and with the necessary content. However, test-users
                    or
                    test
                    data frameworks might create existing email addresses and it is not always easy to
                    setup
                    send-restrictions on the existing SMTP infrastructure. To ensure that no external
                    emails
                    are
                    sent from the system while testing emails and layouts in as many actual email
                    clients as
                    possible, a few unique issues arise throughout this process. In this blog article,
                    we
                    will
                    examine traditional methods for testing email functionality and present a novel
                    strategy
                    that we have found to be very successful.</p>
            </div>





        </div>

    </div>

</section>


<?php get_footer();