<?php
get_header();
$id = get_the_ID();
$gallery_promo =  get_field('gallery_promo', $id);
$desc = get_the_content();

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 g-md-2 g-0 pe-md-3">
            <nav style="--bs-breadcrumb-divider: '>'; padding-left:10px;" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo get_site_url();?>">Home</a></li>
					<li class="breadcrumb-item"><a class="breadcrumb" href="<?php echo esc_url(get_permalink(18)); ?>">Promo</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title(); ?></li>
                </ol>
            </nav>
            <div class="slider-promos">
                <?php
				foreach ($gallery_promo as $promo) : ?>
                <img src="<?php echo $promo[url] ?>" alt="<?php $promo[title] ?>" class="img-fluid slider-detail">
                <?php
			endforeach ?>
            </div>

        </div>
        <div class="col-md-6 promo-info">
            <div class="masa-promo"><img src="<?php echo get_template_directory_uri() ?>/assets/images/date.svg" alt="Promo"> <?php echo ' Berlaku s.d '. get_field('masa_aktif_promo', $id);?></div>
            <div class="title-promos">
                <?php echo get_the_title(); ?>
            </div>
            <div class="sort-desc-promo">
                <?php echo get_field('deskripsi_singkat', $id);?>
            </div>
            <div class="desc-promo">
                <?php echo $desc; ?>
            </div>
            <div class="mt-md-4 ms-md-4">
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
        $('.slider-promos').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
        });
    });
</script> 