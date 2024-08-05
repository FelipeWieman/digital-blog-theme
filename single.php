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
				<span>Schlagwörter: <?php the_category(', '); ?></span>
			</div>
			<div class="content-body">
				<?php the_content(); ?>
			</div>
			<!-- <div class="comments">
				<div class="comment-field">
					<p><?php esc_html_e('Write a comment', 'blog_theme'); ?></p>
				</div>
			</div> -->
			<?php
	endwhile; // End of the loop.
	
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'blog_theme') . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'blog_theme') . '</span> <span class="nav-title">%title</span>',
		)
	);

	?>
	</div>

</section>

<?php

get_footer();