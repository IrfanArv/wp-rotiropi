<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?php wp_head(); ?>
</head>

<?php
$navbar_scheme   = get_theme_mod('navbar_scheme', 'navbar-light bg-light'); // Get custom meta-value.
$navbar_position = get_theme_mod('navbar_position', 'static'); // Get custom meta-value.

$search_enabled  = get_theme_mod('search_enabled', '1'); // Get custom meta-value.
?>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <a href="#main" class="visually-hidden-focusable"><?php esc_html_e('Skip to main content', 'roti-ropi'); ?></a>

    <div id="wrapper">
        <header>
            <nav id="header" class="navbar navbar-roro navbar-expand-md <?php echo esc_attr($navbar_scheme);
                                                                        if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' fixed-top';
                                                                        elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' fixed-bottom';
                                                                        endif;
                                                                        if (is_home() || is_front_page()) : echo ' home';
                                                                        endif; ?>">
                <div class="container">
                    <div class="position-relative">
                        <div class="wrap-navbar-logo-ropi">
                            <a class="navbar-brand ropi" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                                <?php
                                $header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

                                if (!empty($header_logo)) :
                                    ?>
                                <img src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                                <?php
                            else :
                                echo esc_attr(get_bloginfo('name', 'display'));
                            endif;
                            ?>
                            </a>
                        </div>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbar" aria-label="<?php esc_attr_e('Toggle navigation', 'roti-ropi'); ?>">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div id="navbar" class="offcanvas offcanvas-end" tabindex="-1" aria-labelledby="<?php esc_attr_e('Toggle navigation', 'roti-ropi'); ?>">
                        <div class="offcanvas-header d-flex justify-content-end d-block d-md-none">
                            <button type="button" class="btn-close " data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'main-menu',
                                    'container'      => '',
                                    'menu_class'     => 'navbar-nav me-auto',
                                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                                    'walker'         => new WP_Bootstrap_Navwalker(),
                                )
                            );

                            if ('1' === $search_enabled) :
                                ?>
                            <form class="search-form my-2 my-lg-0" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="input-group">
                                    <input type="text" name="s" class="form-control" placeholder="<?php esc_attr_e('Search', 'roti-ropi'); ?>" title="<?php esc_attr_e('Search', 'roti-ropi'); ?>" />
                                    <button type="submit" name="submit" class="btn btn-outline-secondary"><?php esc_html_e('Search', 'roti-ropi'); ?></button>
                                </div>
                            </form>
                            <?php
                        endif;
                        ?>
                            <ul class="list-group list-group-horizontal d-flex justify-content-end mt-mobile">
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/fb.svg" alt="Facebook"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ig.svg" alt="Instagram"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linked.svg" alt="Linkedin"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/yt.svg" alt="Youtube"></a></li>
                            </ul>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav><!-- /#header -->
        </header>

        <main id="main" class="container" <?php if (isset($navbar_position) && 'fixed_top' === $navbar_position) : echo ' style="padding-top: 0px;"';
                                            elseif (isset($navbar_position) && 'fixed_bottom' === $navbar_position) : echo ' style="padding-bottom: 0px;"';
                                            endif; ?>>
            <?php
            // If Single or Archive (Category, Tag, Author or a Date based page).
            if (is_single() || is_archive()) :
                ?>
            <div class="container blog-detail">
                <div class="row">
                    <?php if ('products' === get_post_type()) : ?>
                    <div class="col-md-12">
                        <?php elseif (is_single() || is_archive()) : ?>
                        <div class="col-md-12">
                            <?php
                        endif;
                        ?>
                            <?php
                        endif;
                        ?> 