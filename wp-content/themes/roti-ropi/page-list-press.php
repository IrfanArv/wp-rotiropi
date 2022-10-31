<?php

/**
 * Template Name: Listing Press
 * Description: Listing Press Page Themes
 *
 */
get_header();
$hepipress_args  = array(
	'post_type'      => 'post',
	'category_name'   => 'press',
	'posts_per_page' => -1,
	'post_status'	 => 'publish',
	'order'			 => 'ASC'
);
$hepipress = get_posts($hepipress_args);
// echo '<pre>'; print_r($hepipress); echo '<pre>';
?>
<div class="row content-listings">
	<?php foreach ($hepipress as $post) :
		setup_postdata($post);
		$link = get_field('source_link', $post->ID);

		$post_date = get_the_date();
		$post_title = get_the_title();
		if (strlen($post_title) > 50) {
			$post_title_trim = substr($post_title, 0, 50) . '&hellip;';
		} else {
			$post_title_trim  = $post_title;
		}

		?>
	<div class="col-md-4 mb-5">
		<a href="<?php the_permalink(); ?>" class="news-list">
			<div class="thumb-news">
				<img class="img-fluid rounded-20" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="title-news">
				<?php echo $post_title_trim; ?>
			</div>
		</a>
		<a class="press-url" href="<?php echo $link['url']; ?>" target="_blank" rel="noopener noreferrer">
			<div class="link-sources">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/koran.svg" alt="<?php the_title(); ?>">
				Sumber <?php echo $link['title']; ?>
			</div>
		</a>
	</div>
	<?php endforeach;
	wp_reset_postdata(); ?>
</div>
<?php
get_footer();
?>