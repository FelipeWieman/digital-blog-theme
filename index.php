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

<section class="section-hero-blog animated slide-in-diagonal">
	<div class="blog-label">
		<span>Blog</span>
	</div>
	<div class="hero-blog-header">
		<?php echo get_theme_mod('blog_page_title', 'Want to stay up to date with our latest topics?'); ?>
	</div>
	<div class="hero-blog-info">
		<div class="blog-count"><?php echo wp_count_posts('post')->publish; ?> Articles</div>
		<div class="blog-search">
			<form method="GET" id="sort-posts">
				<label for="sort">Sort by:</label>
				<select name="sort" id="sort" onchange="this.form.submit()">
					<option value="date_desc" <?php selected(isset($_GET['sort']) ? $_GET['sort'] : '', 'date_desc'); ?>>Newest</option>
					<option value="date_asc" <?php selected(isset($_GET['sort']) ? $_GET['sort'] : '', 'date_asc'); ?>>
						Oldest</option>
					<option value="title_asc" <?php selected(isset($_GET['sort']) ? $_GET['sort'] : '', 'title_asc'); ?>>Title (A-Z)</option>
					<option value="title_desc" <?php selected(isset($_GET['sort']) ? $_GET['sort'] : '', 'title_desc'); ?>>Title (Z-A)</option>
				</select>
			</form>
		</div>
	</div>
</section>
<section class="section-blog-blog flex flex-col items-center">
	<div class="blog-grid">

		<?php
		$orderby = 'date';
		$order = 'DESC';

		if (isset($_GET['sort'])) {
			switch ($_GET['sort']) {
				case 'date_asc':
					$order = 'ASC';
					break;
				case 'title_asc':
					$orderby = 'title';
					$order = 'ASC';
					break;
				case 'title_desc':
					$orderby = 'title';
					$order = 'DESC';
					break;
			}
		}

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => get_theme_mod('blog_page_count', 8),
			'orderby' => $orderby,
			'order' => $order,
		);
		$blog_posts = new WP_Query($args);
		if ($blog_posts->have_posts()):
			while ($blog_posts->have_posts()):
				$blog_posts->the_post(); ?>

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
					</a>
				</div>

			<?php endwhile;
			wp_reset_postdata();
		endif;
		?>
	</div>
	<!-- <div class="explore-button-container">
		<button id="load-more" class="explore-button">Load More</button>
	</div> -->
</section>

<?php
get_footer();
?>