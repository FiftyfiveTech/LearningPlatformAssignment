<?php
defined('ABSPATH') || exit;
get_header('shop');
?>

<div class="container py-4">
    <div class="row">
        <!-- Product Details -->
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <?php
          do_action('woocommerce_before_main_content');
          while (have_posts()) :
              the_post();
              wc_get_template_part('content', 'single-product');
          endwhile;
          do_action('woocommerce_after_main_content');
          ?>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <h5><i class="fa fa-user-circle"></i> User Info</h5>
                    <?php if (is_user_logged_in()) :
            $user = wp_get_current_user(); ?>
                    <img class="rounded-circle mb-2" width="80" src="<?php echo esc_url(get_avatar_url($user->ID)); ?>"
                        alt="User Avatar">
                    <h6><?php echo esc_html($user->display_name); ?></h6>
                    <p class="text-muted"><?php echo esc_html($user->user_email); ?></p>
                    <?php else : ?>
                    <p><a href="<?php echo wp_login_url(); ?>">Log in</a> to see your profile</p>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (is_active_sidebar('product-sidebar')) : ?>
            <div class="card p-3">
                <?php dynamic_sidebar('product-sidebar'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer('shop'); ?>