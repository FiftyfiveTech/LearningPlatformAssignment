<?php
$user_id = get_current_user_id();
$user_name = wp_get_current_user();

$avatar = get_user_meta($user_id, 'profile_picture_url', true);
?>

<div class="myaccount-avatar" style="margin-bottom: 20px;">
    <img src="<?php echo esc_url($avatar ?: get_avatar_url($user_id)); ?>" width="90" height="90" class="rounded-circle"
        alt="Profile Picture" />
    <h1><?php echo esc_html($user_name->display_name); ?></h1>   
</div>