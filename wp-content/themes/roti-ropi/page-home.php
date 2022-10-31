<?php
/**
 * Template Name: Home Page
 * Description: Home Page Themes
 *
 */
get_header();
// slider
echo do_shortcode('[smartslider3 slider="3"]');
// promos
$promo_args  = array(
    'post_type'      => 'promos',
    'posts_per_page' => -1,
    'post_status'     => 'publish',
    'order'             => 'DESC'
);
$promos = get_posts($promo_args);
// product
$produk_args  = array(
    'post_type'      => 'products',
    'posts_per_page' => -1,
    'post_status'     => 'publish',
    'order'             => 'DESC',
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'kategori_produk',
            'field'    => 'slug',
            'terms'    => array('roti'),
        )
    )
);
$produk = get_posts($produk_args);
// lokasi
$lokasi_args  = array(
    'post_type'      => 'locations',
    'posts_per_page' => 9,
    'post_status'     => 'publish',
    'order'             => 'DESC'
);
$lokasi = get_posts($lokasi_args);
// press
$hepipress_args  = array(
    'post_type'      => 'post',
    'category_name'   => 'press',
    'posts_per_page' => 6,
    'post_status'     => 'publish',
    'order'             => 'DESC'
);
$hepipress = get_posts($hepipress_args);
// news
$news_args  = array(
    'post_type'      => 'post',
    'category_name'  => 'news',
    'posts_per_page' => 4,
    'post_status'     => 'publish',
    'order'             => 'DESC'
);
$news = get_posts($news_args);

if ($promos) {
    ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center my-5">
            <div class="title">
                Hepi Promo
            </div>
        </div>
        <div class="col-md-12 mb-5 text-center ms-md-3">
            <div class="slider-promos">
                <?php
                foreach ($promos as $post) :
                    setup_postdata($post);
                    ?>
                <a class="links" href="<?php the_permalink(); ?>">
                    <img class="img-fluid img-promos" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
                </a>

                <?php endforeach;
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</div>
<?php 
} ?>
<!-- end promos -->
<!-- menus -->
<?php if ($produk) { ?>

<div class="produk-area">
    <div class="row">
        <div class="col-md-12 text-center my-5">
            <div class="title">
                menu favorite
            </div>
        </div>
        <div class="col-md-12 mb-3 text-center">
            <div class="slider-products">
                <?php
                foreach ($produk as $post) :
                    setup_postdata($post);
                    ?>
                <a class="links-products" href="<?php the_permalink(); ?>">
                    <img class="img-fluid img-products" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
                    <div class="title-products">
                        <?php the_title(); ?>
                    </div>
                </a>

                <?php endforeach;
            wp_reset_postdata();
            ?>
            </div>
        </div>
    </div>
</div>

<?php 
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="<?php echo esc_url(get_permalink(14)); ?>" class="btn btn-lg btn-roro">Lihat Semua</a>
            <div class="title my-5">
                location
            </div>
        </div>
    </div>
</div>
<?php if ($lokasi) { ?>
<div class="row text-center mb-5">
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
} ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="<?php echo esc_url(get_permalink(26)); ?>" class="btn btn-lg btn-roro">Lihat Semua</a>
            <div class="title my-5">
                HEPI PRESS
            </div>
        </div>
    </div>
</div>

<?php if ($hepipress) { ?>
<div class="row text-center mb-5">
    <?php
    foreach ($hepipress as $post) :
        setup_postdata($post);
        $post_date = get_the_date();
        $post_title = get_the_title();
        if (strlen($post_title) > 50) {
            $post_title_trim = substr($post_title, 0, 50) . '&hellip;';
        } else {
            $post_title_trim  = $post_title;
        }
        ?>
    <div class="col-md-4 location-list">
        <div class="row">
            <div class="col-5 thumb-location">
                <a href="<?php the_permalink(); ?>" class="link-post">
                    <img class="img-fluid img-press-thumb" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
                </a>
            </div>
            <div class="col-7 content-location">
                <div class="title-press">
                    <a href="<?php the_permalink(); ?>" class="link-post">
                        <?php echo $post_title_trim; ?>
                    </a>
                </div>
                <div class="date-post">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/calendar.svg" alt="<?php the_title(); ?>">
                    <p> <?php echo $post_date ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach;
wp_reset_postdata(); ?>
</div>
<?php 
} ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="<?php echo esc_url(get_permalink(20)); ?>" class="btn btn-lg btn-roro">Lihat Semua</a>
            <div class="title my-5">
                HEPI NEWS
            </div>
        </div>
    </div>
</div>
<?php if ($news) { ?>
<div class="row mb-5">
    <div class="slide-news">
        <?php
        foreach ($news as $post) :
            setup_postdata($post);
            $post_title = get_the_title();
            if (strlen($post_title) > 50) {
                $post_title_trim = substr($post_title, 0, 50) . '&hellip;';
            } else {
                $post_title_trim  = $post_title;
            }
            ?>
        <div class="col-md-3 mb-3">
            <a href="<?php the_permalink(); ?>" class="news-list">
                <div class="thumb-news">
                    <img class="img-fluid" src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="title-news">
                    <?php echo $post_title_trim; ?>
                </div>
            </a>
        </div>

        <?php endforeach;
    wp_reset_postdata(); ?>
    </div>
</div>
<?php 
} ?>
<?php
get_footer();
?>
<script>
    $(document).ready(function() {
        $('.slider-promos').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
        $('.slider-products').slick({
            infinite: false,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
        $('.slide-news').slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            dots: false,
            responsive: [{
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }
            ]
        });
    });
</script> 