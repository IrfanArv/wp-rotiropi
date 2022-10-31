<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php

/**
 * Template Name: Location Pages
 * Description: Location Pages Themes
 *
 */
get_header();
$id = 26;
$post = get_post($id);
$link = get_field('embed_map', $post->ID);

$lokasi_args  = array(
	'post_type'      => 'locations',
	'posts_per_page' => -1,
	'post_status'	 => 'publish',
	'order'			 => 'DESC'
);
$lokasi = get_posts($lokasi_args);

?>

<div class="map-lokasi">
	<iframe src="<?php echo $link; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="container mt-md-5 mt-3">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="jargon">
				Awas nyasar, cekidot di map dulu
			</div>
			<div class="title mt-3">
				YUK MAMPIR BIAR Hepi
			</div>
		</div>
	</div>
</div>
<div class="container my-md-5">
	<div class="row select-lokasi">
		<form class="row g-3">
			<div class="col-md-auto col-12">
				<label for="staticEmail2" class="visually-hidden">Pilih Lokasi</label>
				<input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="Pilih Lokasi">
			</div>
			<div class="col-md-auto col-6">
			<select class="form-select lokasi" aria-label="Default select example">
				<option selected>Jakarta</option>
				<option value="1">Bogor</option>
				<option value="2">Depok</option>
			</select>
			</div>
			<div class="col-md-auto col-6 d-flex justify-content-end">
				<button type="submit" class="btn btn-lg btn-roro">Pilih</button>
			</div>
		</form>
	</div>
</div>

<div class="row text-center mb-5 ms-md-3 px-md-5">
	<?php
		foreach ($lokasi as $post) :
			setup_postdata($post);
			$loc_name = get_field('location_names', $post->ID);
			$loc_url = get_field('location_in_maps', $post->ID);
			?>
	<div class="col-md-4 location-list">
		<div class="row">
			<div class="col-6 thumb-location">
				<img class="img-fluid" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
			</div>
			<div class="col-6 content-location">
				<div class="title-location">
					<?php the_title(); ?>
				</div>
				<div class="store-location">
					<?php echo $loc_name; ?>
				</div>
				<a href="<?php echo $loc_url; ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/loc.svg" alt="<?php the_title(); ?>"></a>
			</div>
		</div>
	</div>
	<?php endforeach;
		wp_reset_postdata(); ?>
</div>
<?php
get_footer();
?>

<script>
	$(document).ready(function() {
		$("#main").removeClass("container");
	});
</script>