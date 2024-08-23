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

			<?php
			// Получаем предыдущий и следующий посты
			$prev_post = get_previous_post();
			$next_post = get_next_post();
			?>

			<?php if ($prev_post || $next_post): ?>
				<div class="related-posts">
					<h2><?php esc_html_e('Related Posts', 'blog_theme'); ?></h2>
					<div class="related-posts-container">
						<?php if ($prev_post): ?>
							<div class="card">
								<a href="<?php echo get_permalink($prev_post->ID); ?>">
									<?php if (has_post_thumbnail($prev_post->ID)): ?>
										<img src="<?php echo get_the_post_thumbnail_url($prev_post->ID); ?>"
											alt="<?php echo esc_attr($prev_post->post_title); ?>">
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
											alt="<?php echo esc_attr($prev_post->post_title); ?>">
									<?php endif; ?>
								</a>

								<div class="card-body">
									<div class="card-top">
										<h2><a
												href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo $prev_post->post_title; ?></a>
										</h2>
										<p><?php echo wp_trim_words($prev_post->post_excerpt, 20); ?></p>
									</div>

									<div class="author-info flex">
										<div class="author-left">
											<div class="font-bold">
												<span><?php echo get_the_author_meta('display_name', $prev_post->post_author); ?></span>
												•</div>
											<div><span><?php echo get_the_date('', $prev_post->ID); ?></span> • &bull;
												<span><?php echo get_comments_number($prev_post->ID); ?></span>
											</div>
										</div>
										<div class="author-right">
											<a href="<?php echo get_permalink($prev_post->ID); ?>">
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
						<?php endif; ?>

						<?php if ($next_post): ?>
							<div class="card">
								<a href="<?php echo get_permalink($next_post->ID); ?>">
									<?php if (has_post_thumbnail($next_post->ID)): ?>
										<img src="<?php echo get_the_post_thumbnail_url($next_post->ID); ?>"
											alt="<?php echo esc_attr($next_post->post_title); ?>">
									<?php else: ?>
										<img src="<?php echo get_template_directory_uri(); ?>/images/post_picture_fallback.png"
											alt="<?php echo esc_attr($next_post->post_title); ?>">
									<?php endif; ?>
								</a>

								<div class="card-body">
									<div class="card-top">
										<h2><a
												href="<?php echo get_permalink($next_post->ID); ?>"><?php echo $next_post->post_title; ?></a>
										</h2>
										<p><?php echo wp_trim_words($next_post->post_excerpt, 20); ?></p>
									</div>

									<div class="author-info flex">
										<div class="author-left">
											<div class="font-bold">
												<span><?php echo get_the_author_meta('display_name', $next_post->post_author); ?></span>
												•</div>
											<div><span><?php echo get_the_date('', $next_post->ID); ?></span> • &bull;
												<span><?php echo get_comments_number($next_post->ID); ?></span>
											</div>
										</div>
										<div class="author-right">
											<a href="<?php echo get_permalink($next_post->ID); ?>">
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
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>

		</div>
	<?php endwhile; // End of the loop. ?>
</section>

<?php
get_footer();
