<?php
if (!defined('ABSPATH')) exit;

/**
 * ✅ Enqueue Bootstrap, Font Awesome, and Child Theme CSS
 */
function enqueue_custom_child_theme_styles() {
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap-css',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
        [],
        '5.3.2'
    );

    // Font Awesome
    wp_enqueue_style(
        'font-awesome-6',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css',
        [],
        '6.5.0'
    );

    // Child Theme CSS (depends on Bootstrap)
    wp_enqueue_style(
        'child-theme-style',
        get_stylesheet_uri(),
        ['bootstrap-css'],
        filemtime(get_stylesheet_directory() . '/style.css')
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_child_theme_styles', 99);

/**
 * ✅ Enqueue Bootstrap JS (Bundle includes Popper)
 */
function enqueue_custom_child_theme_scripts() {
    wp_enqueue_script(
        'bootstrap-js',
        'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.3.2',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_custom_child_theme_scripts');

/**
 * ✅ Register Sidebar for Shop
 */
function register_product_sidebar() {
    register_sidebar([
        'name'          => __('Shop Sidebar', 'hello-elementor-child'),
        'id'            => 'shop-sidebar',
        'before_widget' => '<div class="mb-4">',
        'after_widget'  => '</div>',
        'before_title'  => '<h5 class="mb-2">',
        'after_title'   => '</h5>',
    ]);
}
add_action('widgets_init', 'register_product_sidebar');

/**
 * ✅ Theme Setup - Menus and Custom Logo
 */
function custom_child_theme_setup() {
    register_nav_menu('memberarea', __('Member Area Navigation', 'hello-elementor-child'));
    add_theme_support('custom-logo');
}
add_action('after_setup_theme', 'custom_child_theme_setup');


// 1. Add custom profile picture upload field to My Account > Account Details
add_action('woocommerce_edit_account_form', function () {
    $user_id = get_current_user_id();
    $image_url = get_user_meta($user_id, 'profile_picture_url', true);
    ?>
<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
    <label for="profile_picture">Profile Picture</label><br>
    <?php if ($image_url): ?>
    <img src="<?php echo esc_url($image_url); ?>" width="80" height="80" class="rounded mb-2"><br>
    <?php endif; ?>
    <input type="file" name="profile_picture" id="profile_picture" accept="image/*" />
</p>
<?php
});

// 2. Save profile picture upload
add_action('woocommerce_save_account_details', function ($user_id) {
    if (!function_exists('wp_handle_upload')) {
        require_once ABSPATH . 'wp-admin/includes/file.php';
    }

    if (!empty($_FILES['profile_picture']['name'])) {
        $upload = wp_handle_upload($_FILES['profile_picture'], ['test_form' => false]);

        if (empty($upload['error']) && !empty($upload['url'])) {
            update_user_meta($user_id, 'profile_picture_url', esc_url_raw($upload['url']));
        }
    }
}, 10, 1);