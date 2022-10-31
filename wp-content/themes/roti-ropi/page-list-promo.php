<?php

/**
 * Template Name: Listing Promos
 * Description: Listing Promos Page Themes
 *
 */
get_header();
$promo_args  = array(
	'post_type'      => 'promos',
	'posts_per_page' => -1,
	'post_status'	 => 'publish',
	'order'			 => 'DESC'
);
$promos = get_posts($promo_args);
?>

<div class="row content-listings">
	<?php
	foreach ($promos as $post) :
		setup_postdata($post);
		$sortdesc = get_field('deskripsi_singkat', $post->ID);
		$masa_aktif = get_field('masa_aktif_promo', $post->ID);
		$post_title = get_the_title();
		if (strlen($post_title) > 50) {
			$post_title_trim = substr($post_title, 0, 40) . '&hellip;';
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
			<div class="sort-desc">
			<?php echo $sortdesc; ?>
			</div>
			<div class="date-post-promos">
				<img src="<?php echo get_template_directory_uri() ?>/assets/images/cal-primary.svg" alt="<?php the_title(); ?>">
				Berlaku sd <?php echo $masa_aktif; ?>
			</div>
		</a>
	</div>
	<?php endforeach;
	wp_reset_postdata();
	?>
</div>
<?php
get_footer();
?>