<?php

/**
 * Template Name: Products Page
 * Description: Products Page Themes
 *
 */
get_header();
// slider
echo do_shortcode('[smartslider3 slider="4"]');
$roti_args  = array(
	'post_type'      => 'products',
	'posts_per_page' => -1,
	'post_status'	 => 'publish',
	'order'			 => 'DESC',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'kategori_produk',
			'field'    => 'slug',
			'terms'    => array('roti'),
		)
	)
);
$roti = get_posts($roti_args);
$minuman_args  = array(
	'post_type'      => 'products',
	'posts_per_page' => -1,
	'post_status'	 => 'publish',
	'order'			 => 'DESC',
	'tax_query' => array(
		'relation' => 'AND',
		array(
			'taxonomy' => 'kategori_produk',
			'field'    => 'slug',
			'terms'    => array('minuman'),
		)
	)
);
$minuman = get_posts($minuman_args);
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="jargon">
				Don’t worry, be happy.
			</div>
			<div class="title mt-3">
				ROTI INI BIKIN HEPI
			</div>
		</div>
	</div>
</div>
<div class="row d-flex justify-content-center my-md-5 my-3 produk-section">
	<?php
	foreach ($roti as $post) :
		setup_postdata($post);
		?>
	<div class="col-lg-2 col-6 col-md-6">
		<a class="" href="<?php the_permalink(); ?>">
			<img class="img-fluid img-products" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
			<div class="title-products page-product">
				<?php the_title(); ?>
			</div>
		</a>
	</div>
	<?php endforeach;
	wp_reset_postdata();
	?>
</div>
<div class="container my-5">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="jargon">
				Don’t worry, be happy.
			</div>
			<div class="title mt-3">
				MINUMAN INI JUGA BIKIN HEPI
			</div>
		</div>
	</div>
</div>
<div class="row d-flex justify-content-center my-md-5 my-3 produk-section">
	<?php
	foreach ($minuman as $post) :
		setup_postdata($post);
		?>
	<div class="col-lg-2 col-6 col-md-6 text-center">
		<a class="" href="<?php the_permalink(); ?>">
			<img class="img-fluid img-products" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
			<div class="title-products page-product">
				<?php the_title(); ?>
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