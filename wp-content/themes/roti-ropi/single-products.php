<?php
get_header();
$id = get_the_ID();
$gallery_product =  get_field('gallery_produk', $id);
$desc = get_the_content();

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 g-md-2 g-0">
            <nav style="--bs-breadcrumb-divider: '>'; padding-left:10px;" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo get_site_url();?>">Home</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo esc_url(get_permalink(14)); ?>">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
                </ol>
            </nav>
            <div class="slider-product">
                <?php
				foreach ($gallery_product as $photos) : ?>
                <img src="<?php echo $photos[url] ?>" alt="<?php $photos[title] ?>" class="img-fluid slider-detail">
                <?php
			endforeach ?>
            </div>

        </div>
        <div class="col-md-6 product-info">
            <div class="title-product">
                <?php echo get_the_title(); ?>
            </div>
            <div class="price-product">
                Rp. <?php echo number_format(get_field('harga', $id)); ?>
            </div>
            <div class="desc-product">
                <?php echo $desc; ?>
            </div>
            <div class="mt-md-5">
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

<script>
    $(document).ready(function() {
        $('.slider-product').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            arrows: false,
            dots: false,
        });
    });
</script> 