<?php
$current_user = wp_get_current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    require_once ABSPATH . 'wp-admin/includes/file.php';

    // Update display name
    wp_update_user([
        'ID' => $current_user->ID,
        'display_name' => sanitize_text_field($_POST['display_name']),
    ]);

    // Upload avatar
    if (!empty($_FILES['avatar']['name'])) {
        $file = $_FILES['avatar'];
        $upload = wp_handle_upload($file, ['test_form' => false]);

        if (!isset($upload['error']) && isset($upload['url'])) {
            update_user_meta($current_user->ID, 'profile_picture_url', esc_url_raw($upload['url']));
        }
    }

    echo '<div class="alert alert-success">Profile updated successfully.</div>';
}
?>

<form method="post" enctype="multipart/form-data" class="container mt-4">
    <div class="mb-3">
        <label for="display_name" class="form-label">Display Name</label>
        <input type="text" name="display_name" class="form-control"
            value="<?php echo esc_attr($current_user->display_name); ?>">
    </div>

    <div class="mb-3">
        <label for="avatar" class="form-label">Profile Picture</label><br>
        <?php
        $avatar = get_user_meta($current_user->ID, 'profile_picture_url', true);
        if ($avatar) {
            echo '<img src="' . esc_url($avatar) . '" class="rounded-circle mb-2" width="80" height="80">';
        }
        ?>
        <input type="file" name="avatar" class="form-control">
    </div>

    <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
</form>