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
                        <li><a href="#how-it-was">How it was</a></li>
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
                            <span id="days" class="countdown-number"></span>
                            <span class="countdown-label">Days</span>
                        </div>
                        <div class="countdown-item">
                            <span id="hours" class="countdown-number"></span>
                            <span class="countdown-label">Hours</span>
                        </div>
                        <div class="countdown-item">
                            <span id="minutes" class="countdown-number"></span>
                            <span class="countdown-label">Minutes</span>
                        </div>
                        <div class="countdown-item">
                            <span id="seconds" class="countdown-number"></span>
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
            <section id="schedule" class="schedule-section">
                <div class="container">
                    <h2>Event Schedule</h2>
                    <div class="schedule-table">
                        <!-- Заголовки колонок -->
                        <div class="schedule-header">
                            <div class="time">Time</div>
                            <div class="session">Session</div>
                            <div class="room">Room</div>
                            <div class="type">Type</div>
                            <div class="speaker">Speaker</div>
                        </div>
                        <!-- Пример строки расписания -->
                        <div class="schedule-row">
                            <div class="time">09:00 - 10:00</div>
                            <div class="session">Opening Keynote: Importance of Collaboration</div>
                            <div class="room">Main Hall</div>
                            <div class="type keynote">Keynote</div>
                            <div class="speaker">Jonas Hueber</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">10:15 - 11:15</div>
                            <div class="session">Tools for Collaboration in IT Teams</div>
                            <div class="room">Thinktunk</div>
                            <div class="type panel">Panel Discussion</div>
                            <div class="speaker">Sümeyye Onur</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">11:30 - 12:30</div>
                            <div class="session">Agile for Distributed Teams</div>
                            <div class="room">Library</div>
                            <div class="type workshop">Workshop</div>
                            <div class="speaker">Jonas Hueber</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">12:30 - 13:30</div>
                            <div class="session">Lunch Break</div>
                            <div class="room">Dining Hall</div>
                            <div class="type">Break</div>
                            <div class="speaker">-</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">13:45 - 14:45</div>
                            <div class="session">The Role of Emotional Intelligence</div>
                            <div class="room">Techlab</div>
                            <div class="type roundtable">Roundtable Discussion</div>
                            <div class="speaker">Andre Wruszczak</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">15:00 - 16:00</div>
                            <div class="session">Speed Networking</div>
                            <div class="room">Library</div>
                            <div class="type networking">Networking</div>
                            <div class="speaker">Alexander Gornung</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">16:15 - 17:15</div>
                            <div class="session">CI/CD Automation</div>
                            <div class="room">Main hall</div>
                            <div class="type workshop">Workshop</div>
                            <div class="speaker">Sümeyye Onur</div>
                        </div>
                        <div class="schedule-row">
                            <div class="time">17:30 - 18:30</div>
                            <div class="session">Closing Keynote: The Future of Teamwork</div>
                            <div class="room">Main Hall</div>
                            <div class="type keynote">Keynote</div>
                            <div class="speaker">Jonas Hueber</div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="how-it-was" class="how-it-was-section">
                <title> How it was </title>
                <div class="slider-container">
                    <div class="slider-track">
                        <div class="slide active">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo.jpg"
                                alt="Event Photo 1">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo-2.jpg"
                                alt="Event Photo 2">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo-3.jpg"
                                alt="Event Photo 3">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo-4.jpg"
                                alt="Event Photo 4">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo-5.jpg"
                                alt="Event Photo 5">
                        </div>
                        <div class="slide">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/event-photo-6.jpg"
                                alt="Event Photo 6">
                        </div>
                    </div>
                    <button class="prev">&#10094;</button>
                    <button class="next">&#10095;</button>
                    <div class="dots"></div>
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
    <?php wp_footer(); ?>

    <script>

        //HEADER SHRINK (scroll)
        document.addEventListener("scroll", function () {
            const header = document.querySelector("header");
            if (window.scrollY > 50) {
                header.classList.add("shrink");
            } else {
                header.classList.remove("shrink");
            }
        });


        //SLIDER

        document.addEventListener('DOMContentLoaded', function () {
            const slides = document.querySelectorAll('.slide');
            const dotsContainer = document.querySelector('.dots');
            const prevButton = document.querySelector('.prev');
            const nextButton = document.querySelector('.next');
            let currentIndex = 0;
            const totalSlides = slides.length;
            const slideWidth = slides[0].clientWidth;
            let interval;

            // creating navigation dots
            slides.forEach((_, index) => {
                const dot = document.createElement('span');
                dot.classList.add('dot');
                if (index === 0) dot.classList.add('active');
                dotsContainer.appendChild(dot);
            });

            const dots = document.querySelectorAll('.dot');

            const updateSlidePosition = () => {
                document.querySelector('.slider-track').style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                slides.forEach((slide, index) => {
                    slide.classList.remove('active');
                    dots[index].classList.remove('active');
                    if (index === currentIndex) {
                        slide.classList.add('active');
                        dots[index].classList.add('active');
                    }
                });
            };

            const nextSlide = () => {
                currentIndex = (currentIndex + 1) % totalSlides;
                updateSlidePosition();
            };

            const prevSlide = () => {
                currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
                updateSlidePosition();
            };


            const startAutoSlide = () => {
                interval = setInterval(nextSlide, 4000);
            };

            const stopAutoSlide = () => {
                clearInterval(interval);
            };

            nextButton.addEventListener('click', nextSlide);
            prevButton.addEventListener('click', prevSlide);

            dots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    currentIndex = index;
                    updateSlidePosition();
                });
            });

            slides.forEach(slide => {
                slide.addEventListener('mouseenter', stopAutoSlide);
                slide.addEventListener('mouseleave', startAutoSlide);
            });

            startAutoSlide();



            const eventDate = new Date("December 2, 2024 00:00:00").getTime();


            function updateCountdown() {
                const now = new Date().getTime();
                const timeRemaining = eventDate - now;


                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);


                document.getElementById("days").innerText = days;
                document.getElementById("hours").innerText = hours;
                document.getElementById("minutes").innerText = minutes;
                document.getElementById("seconds").innerText = seconds;


                if (timeRemaining < 0) {
                    clearInterval(countdownInterval);
                    document.querySelector('.countdown').innerHTML = "The event has started!";
                }
            }


            const countdownInterval = setInterval(updateCountdown, 1000);





        });





    </script>
</body>

</html>