<?php
				// If Single or Archive (Category, Tag, Author or a Date based page).
if ('products' === get_post_type()) :
	?>
</div><!-- /.col -->
<?php

elseif (is_single() || is_archive()) :
	?>
</div><!-- /.col -->


<?php get_sidebar(); ?>
</div><!-- /.row -->
</div>
<?php
endif;
$phone_string = get_theme_mod('phone_number');
$phone_number = preg_replace('/[\s-]+/', '', $phone_string);
?>
</main><!-- /#main -->
<footer id="footer">
    <div class="container footer-top">
        <div class="row">
            <div class="col-md-1 col-3">
                <a class="logo-footer" href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                    <?php
					$header_logo = get_theme_mod('header_logo'); // Get custom meta-value.

					if (!empty($header_logo)) :
						?>
                    <img class="img-fluid img-logo-footer" src="<?php echo esc_url($header_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
                    <?php
				else :
					echo esc_attr(get_bloginfo('name', 'display'));
				endif;
				?>
                </a>
            </div>
            <div class="col-md-3 col-9">
                <p class="about">
                <?php echo get_theme_mod('footer_add');?>
                </p>
            </div>
            <div class="col-md-6">
                <?php
				if (has_nav_menu('footer-menu')) :
					wp_nav_menu(
						array(
							'theme_location'  => 'footer-menu',
							'container'       => '',
							'container_class' => 'col-2',
							'fallback_cb'     => '',
							'items_wrap'      => '<ul class="menu nav footer-menu justify-content-start">%3$s</ul>',
							'walker'          => new WP_Bootstrap4_Navwalker_Footer(),
						)
					);
				endif;
				?>
            </div>
            <div class="col-md-2">
                <div class="title-follow">Follow us</div>
                <ul class="list-group list-group-horizontal">
                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('facebook'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/fb.svg" alt="Facebook"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('instagram'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/ig.svg" alt="Instagram"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('linkedin'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/linked.svg" alt="Linkedin"></a></li>
                                <li class="list-group-item"><a href="<?php echo esc_url(get_theme_mod('youtube'));?>" target="_blank" rel="noopener noreferrer"><img src="<?php echo get_template_directory_uri() ?>/assets/images/yt.svg" alt="Youtube"></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row text-center bg-ropi">
        <div class="col-12">
            <p class="text-white mark-footer"><?php printf(esc_html__('&copy; %1$s %2$s. All rights reserved.', 'roti-ropi'), date_i18n('Y'), get_bloginfo('name', 'display')); ?></p>
        </div>

        <?php
		if (is_active_sidebar('third_widget_area')) :
			?>
        <div class="col-12">
            <?php
			dynamic_sidebar('third_widget_area');

			if (current_user_can('manage_options')) :
				?>
            <span class="edit-link"><a href="<?php echo esc_url(admin_url('widgets.php')); ?>" class="badge badge-secondary"><?php esc_html_e('Edit', 'roti-ropi'); ?></a></span><!-- Show Edit Widget link -->
            <?php
		endif;
		?>
        </div>
        <?php
	endif;
	?>
    </div><!-- /.row -->
</footer><!-- /#footer -->
</div><!-- /#wrapper -->
<?php
wp_footer();
?>
</body>

</html> 