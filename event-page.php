<?php
/*
Template Name: Event Landing Page
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); // Важный тег для подключения стилей, скриптов и мета-информации ?>
</head>

<body <?php body_class(); ?>>

    <div class="wrapper-event">
        <header>
            <div class="container">
                <div class="logo-placeholder">
                    <h1>Interhyp Event</h1>
                </div>
                <nav>
                    <ul class="nav-menu">
                        <li><a href="#wellcome">Wellcome</a></li>
                        <li><a href="#speakers">Speakers</a></li>
                        <li><a href="#agenda">Agenda</a></li>
                        <li><a href="#schedule">Schedule</a></li>
                        <li><a href="#register" class="btn-register">Register</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main id="main-content" class="main-content">
            <!-- Hero Section -->
            <section class="hero" id="wellcome">
                <div class="dark">
                </div>
                <div class="container">
                    <h1><?php the_title(); ?></h1>
                    <p class="event-date">December 02, 2024 | Interhyp Campus</p>
                    <div class="countdown">
                        <div class="countdown-item">
                            <span class="countdown-number">56</span>
                            <span class="countdown-label">Days</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number">17</span>
                            <span class="countdown-label">Hours</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number">58</span>
                            <span class="countdown-label">Minutes</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number">34</span>
                            <span class="countdown-label">Seconds</span>
                        </div>
                    </div>
                    <div class="hero-buttons">
                        <a href="#register" class="btn-register">Register Now</a>

                    </div>
                </div>
            </section>

            <!-- Speakers Section -->
            <section id="speakers" class="speakers-section">
                <div class="container">
                    <h2>Speakers</h2>
                    <div class="speakers-list">
                        <div class="speaker-item">
                            <div class="speaker-photo">
                                <img src="/wp-content/themes/blog-theme/images/jonas_hueber.png" alt="Speaker 1">
                            </div>
                            <div class="speaker-info">
                                <h3>Jonas Hueber
                                </h3>
                                <p><span>"</span> &nbsp; &nbsp; I am a passionate Tech Leader, Visionary and Ultra Trail
                                    Runner with a
                                    proven track
                                    record and a strong wish for having an Impact on people's lives. &nbsp;
                                    <span>"</span>
                                </p>
                            </div>
                        </div>

                        <div class="speaker-item">
                            <div class="speaker-photo">
                                <img src="/wp-content/themes/blog-theme/images/andre_wruszczak.jpg" alt="Speaker 2">
                            </div>
                            <div class="speaker-info">
                                <h3>Andre Wruszczak
                                </h3>
                                <p><span>"</span> &nbsp; &nbsp; As an empathic full-stack developer specializing in
                                    Typescript, I find joy in
                                    crafting software that resonates with users.

                                    As a self-proclaimed "glue worker," I value emotional connections in my work, aiming
                                    for harmony and positive relationships with everyone around me.

                                    &nbsp; <span>"</span></p>
                            </div>
                        </div>

                        <div class="speaker-item">
                            <div class="speaker-photo">
                                <img src="/wp-content/themes/blog-theme/images/Sümeyye.png" alt="Speaker 3">
                            </div>
                            <div class="speaker-info">
                                <h3>Sümeyye Onur</h3>
                                <p>Bachelor of Science - Software Engineering bei Interhyp Gruppe.</p>
                            </div>
                        </div>
                        <div class="speaker-item">
                            <div class="speaker-photo">
                                <img src="/wp-content/themes/blog-theme/images/alexander_gornung.png" alt="Speaker 4">
                            </div>
                            <div class="speaker-info">
                                <h3>Alexander Gornung
                                </h3>
                                <p>Student at Rosenheim Technical University of Applied SciencesвфыВ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Agenda Section -->
            <section id="agenda" class="agenda-section">
                <div class="container">
                    <h2>Agenda</h2>

                    <div class="agenda-items">
                        <!-- Keynote Sessions -->
                        <div class="agenda-item keynote">
                            <h3>Keynote Sessions</h3>
                            <ul>
                                <li>Opening Keynote: Importance of Effective Collaboration in Modern IT Teams</li>
                                <li>Closing Keynote: The Future of Teamwork in the Digital Age</li>
                            </ul>
                        </div>

                        <!-- Panel Discussions -->
                        <div class="agenda-item panel">
                            <h3>Panel Discussions</h3>
                            <ul>
                                <li>Tools for Collaboration in IT Teams</li>
                                <li>The Impact of DevOps on Development and Operations Teams Collaboration</li>
                            </ul>
                        </div>

                        <!-- Workshops -->
                        <div class="agenda-item workshop">
                            <h3>Workshops</h3>
                            <ul>
                                <li>Agile and Scrum for Distributed Teams</li>
                                <li>CI/CD Automation: Streamlining Your Development Pipeline</li>
                            </ul>
                        </div>

                        <!-- Roundtable Discussions -->
                        <div class="agenda-item roundtable">
                            <h3>Roundtable Discussions</h3>
                            <ul>
                                <li>The Role of Emotional Intelligence in IT Team Management</li>
                                <li>Motivating Continuous Learning and Development in Teams</li>
                            </ul>
                        </div>

                        <!-- Networking Sessions -->
                        <div class="agenda-item networking">
                            <h3>Networking Sessions</h3>
                            <ul>
                                <li>Evening Networking: Finding New Partners and Sharing Experiences</li>
                                <li>Speed Networking: Meet Industry Peers Quickly and Effectively</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Schedule Section -->
            <section id="schedule" class="section">
                <div class="container">
                    <h2>Schedule</h2>
                    <!-- Add event schedule here -->
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="logo-placeholder">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    <?php wp_footer(); // Важный тег для подключения скриптов и закрывающих элементов ?>

    <script>
        document.addEventListener("scroll", function () {
            const header = document.querySelector("header");
            if (window.scrollY > 50) {
                header.classList.add("shrink");
            } else {
                header.classList.remove("shrink");
            }
        });
    </script>
</body>

</html>