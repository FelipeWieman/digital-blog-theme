<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package blog_theme
 */

get_header();
?>

<section class="section-hero-blog">
	<div class="blog-label">
		<span>Blog</span>
	</div>
	<div class="hero-blog-header">
		<?php echo get_theme_mod('blog_page_title', 'Want to stay up to date with our latest topics?'); ?>
	</div>
	<div class="hero-blog-info">
		<div class="blog-count"><?php echo wp_count_posts('post')->publish; ?> Articles</div>
		<div class="blog-search">
			<span>Sort by: Newest</span>
			<div class="search-arrow"><svg height="1.2rem" id="Layer_1" fill="white"
					style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" xml:space="preserve"
					xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					<path
						d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9  c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3  z" />
				</svg></div>
		</div>
	</div>
</section>
<section class="section-blog-blog flex flex-col items-center">
	<div class="blog-grid">

		<?php
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => get_theme_mod('blog_page_count', 8),
		);
		$blog_posts = new WP_Query($args);
		if ($blog_posts->have_posts()):
			while ($blog_posts->have_posts()):
				$blog_posts->the_post(); ?>
				<div class="card">
					<?php if (has_post_thumbnail()): ?>
						<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
							alt="<?php the_title(); ?>">
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

		<!-- <div class="card">
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
						<div class="text-[0.8rem]">06 August 2023 &bull; 0 Comments</div>
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
	
	 -->



	</div>
	<div class="explore-button-container">
		<button id="load-more" class="explore-button">Load More</button>
	</div>
</section>

<?php

get_footer();
