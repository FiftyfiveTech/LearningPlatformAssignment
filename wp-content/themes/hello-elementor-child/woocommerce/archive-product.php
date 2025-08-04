<?php
defined('ABSPATH') || exit;

get_header('shop');
?>

<div class="container my-5">
    <div class="row">

        <!-- ✅ Main Products Column (LEFT) -->
        <main class="col-md-9">
            <?php
      do_action('woocommerce_before_main_content');

      if (woocommerce_product_loop()) :
        do_action('woocommerce_before_shop_loop');
        woocommerce_product_loop_start();

        if (wc_get_loop_prop('total')) :
          while (have_posts()) :
            the_post();
            do_action('woocommerce_shop_loop');
            wc_get_template_part('content', 'product');
          endwhile;
        endif;

        woocommerce_product_loop_end();
        do_action('woocommerce_after_shop_loop');
      else :
        do_action('woocommerce_no_products_found');
      endif;

      do_action('woocommerce_after_main_content');
      ?>
        </main>

        <!-- ✅ Sidebar Column (RIGHT) -->
        <aside class="col-md-3">
            <?php if (is_active_sidebar('shop-sidebar')) : ?>
            <?php dynamic_sidebar('shop-sidebar'); ?>
            <?php else : ?>
            <div class="alert alert-warning">
                <strong>Note:</strong> Sidebar is empty. Add widgets in
                <code>Appearance → Widgets → Shop Sidebar</code>.
            </div>
            <?php endif; ?>
        </aside>

    </div>
</div>

<?php
get_footer('shop');