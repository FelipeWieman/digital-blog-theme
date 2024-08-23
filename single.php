<?php
/**
 * The template for displaying all single posts
 *
 */

get_header();
?>

<section class="section-single">
	<?php
	while (have_posts()):
		the_post(); ?>
		<div class="single-header">
			<p class="single-author"><?php the_author(); ?></p>
			<h1 class="single-title"><?php the_title(); ?></h1>

			<div class="single-picture">
				<div class="picture-container">
					<?php if (has_post_thumbnail()): ?>
						<?php the_post_thumbnail('full'); ?>
					<?php else: ?>
						<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
							alt="<?php the_title(); ?>">
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="single-content">
			<div class="content-info">
				<span><?php echo get_the_date(); ?></span>
			</div>
			<div class="content-body">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; // End of the loop. ?>

	<?php
	// Выводим связанные посты
	$related_posts_count = 3;
	$args = array(
		'posts_per_page' => $related_posts_count,
		'post__not_in' => array(get_the_ID()),
		'orderby' => 'rand',
	);

	$related_posts = new WP_Query($args);

	if ($related_posts->have_posts()): ?>
		<div class="related-posts">
			<h2><?php esc_html_e('Related Posts', 'blog_theme'); ?></h2>
			<div class="related-posts-container">
				<?php while ($related_posts->have_posts()):
					$related_posts->the_post(); ?>
					<div class="card">
						<a href="<?php the_permalink(); ?>">
							<?php if (has_post_thumbnail()): ?>
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							<?php else: ?>
								<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
									alt="<?php the_title(); ?>">
							<?php endif; ?>
						</a>

						<div class="card-body">
							<div class="card-top">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<?php the_excerpt(); ?>
							</div>

							<div class="author-info flex">
								<div class="author-left">
									<div class="font-bold"><span><?php the_author(); ?></span> •</div>
									<div><span><?php echo get_the_date(); ?></span> • &bull;
										<span><?php comments_number(); ?></span>
									</div>
								</div>
								<div class="author-right">
									<a href="<?php the_permalink(); ?>">
										<svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
											<g>
												<path d="M0 0h24v24H0z" fill="none" />
												<path
													d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2zm0 9H8v2h4v3l4-4-4-4v3z" />
											</g>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>
</section>

<?php
get_footer();
