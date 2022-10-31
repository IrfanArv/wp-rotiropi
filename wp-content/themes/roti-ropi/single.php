<?php
get_header();
$id = get_the_ID();
$desc = get_the_content();
$cat = get_the_category();
$link = get_field('source_link', $post->ID);

if ($cat[0]->slug == 'press'){
	$url = esc_url(get_permalink(20));
}else{
	$url = esc_url(get_permalink(22));
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 g-md-2 g-0 pe-md-3">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo get_site_url(); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo $url; ?>"><?php echo $cat[0]->cat_name;?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
                </ol>
            </nav>
			<div class="title-promos min-margin mt-md-0 mt-3">
                <?php echo get_the_title(); ?>
            </div>
			<?php if ($cat[0]->slug == 'press'){?>
			<a class="press-url" href="<?php echo $link['url']; ?>" target="_blank" rel="noopener noreferrer">
				<div class="link-sources-details">
					<img src="<?php echo get_template_directory_uri() ?>/assets/images/koran.svg" alt="<?php the_title(); ?>">
					Sumber <?php echo $link['title']; ?>
				</div>
			</a>
			<?php } ?>

            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" class="img-fluid">
        </div>
        <div class="col-md-12">
            <div class="desc-promo min-desc-news">
                <?php echo $desc; ?>
            </div>
            <div class="mt-md-4">
                <div class="title-share mb-md-2">
                    Share This
                </div>
                <ul class="list-group list-group-horizontal list-share">
                    <li class="list-group-item"><a href="whatsapp://send?text=<?php echo get_permalink() ?>" target="_blank" data-action="share/whatsapp/share"> <img src="<?php echo get_template_directory_uri() ?>/assets/images/whatsapp.svg" alt="Whatsaap"> </a></li>
                    <li class="list-group-item"><a href="https://twitter.com/share?url=<?php echo get_permalink() ?>" target="_blank"> <img src="<?php echo get_template_directory_uri() ?>/assets/images/twitter.svg" alt="Twitter"></a></li>
                    <li class="list-group-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink() ?>" target="_blank" rel="noopener noreferrer"> <img src="<?php echo get_template_directory_uri() ?>/assets/images/facebook.svg" alt="Facebook"></a></li>
                    <li class="list-group-item"><a href="https://telegram.me/share/url?url=<?php echo get_permalink() ?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/telegram.svg" alt="Telegram"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



<?php
get_footer();
?> 