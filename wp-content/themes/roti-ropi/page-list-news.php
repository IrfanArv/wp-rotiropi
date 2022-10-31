<?php

/**
 * Template Name: Listing News
 * Description: Listing News Page Themes
 *
 */
get_header();
$hepipress_args  = array(
	'post_type'      => 'post',
	'category_name'   => 'news',
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
		$post_title = get_the_title();
		if (strlen($post_title) > 70) {
			$post_title_trim = substr($post_title, 0, 70) . '&hellip;';
		} else {
			$post_title_trim  = $post_title;
		}

		?>
	<div class="col-md-4 mb-md-5 mb-3">
		<a href="<?php the_permalink(); ?>" class="news-list">
			<div class="thumb-news">
				<img class="img-fluid rounded-20" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="title-news">
				<?php echo $post_title_trim; ?>
			</div>
		</a>
	</div>
	<?php endforeach;
	wp_reset_postdata(); ?>
</div>
<?php
get_footer();
?>