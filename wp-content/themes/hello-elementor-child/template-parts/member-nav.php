<?php
/**
 * Template: Member Area Navigation with Dropdowns
 * Menu Name: memberarea
 */
?>

<style>
    img.custom-logo {
    margin-left: 110px;
}

    .menu-arrow {
    font-size: 10px;
    vertical-align: middle;
    display: inline-block;
}


.menu-item .label {
    display: inline-block;
}

    .member-navbar nav ul li a svg {
    vertical-align: middle;
    fill: #00e0b8;
    transition: fill 0.3s ease;
}
.member-navbar nav ul li a:hover svg {
    fill: #ffffff;
}

.member-navbar {
    background-color: #2f3e46;
    padding: 10px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-family: 'Segoe UI', sans-serif;
    flex-wrap: wrap;
}
.member-navbar .logo {
    display: flex;
    align-items: center;
}
.member-navbar .menu-container {
    display: flex;
    gap: 30px;
    align-items: center;
    flex-grow: 1;
    justify-content: center;
}
.member-navbar nav ul {
    list-style: none;
    display: flex;
    gap: 24px;
    margin: 0;
    padding: 0;
}
.member-navbar nav ul li {
    position: relative;
}
.member-navbar nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    align-items: center;
    font-size: 14px;
    padding: 6px 10px;
}
.member-navbar nav ul li a:hover {
    color: #00e0b8;
}
.member-navbar nav ul li ul.sub-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #354851;
    padding: 10px 0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
    z-index: 999;
    min-width: 160px;
}
.member-navbar nav ul li:hover > ul.sub-menu {
    display: block;
}
.member-navbar nav ul li ul.sub-menu li a {
    padding: 8px 16px;
    color: #fff;
}
.member-navbar nav ul li ul.sub-menu li a:hover {
    background-color: #00e0b8;
    color: #fff;
}
.member-navbar .user-area {
    display: flex;
    align-items: center;
    color: #fff;
    gap: 10px;
}
.member-navbar .user-area img {
    height: 32px;
    width: 32px;
    border-radius: 50%;
    object-fit: cover;
}
@media (max-width: 768px) {
    .member-navbar {
        flex-direction: column;
        align-items: flex-start;
    }
    .member-navbar .menu-container {
        flex-direction: column;
        align-items: flex-start;
        margin-top: 10px;
    }
    .member-navbar nav ul {
        flex-direction: column;
        gap: 10px;
    }
    .member-navbar nav ul li ul.sub-menu {
        position: static;
        box-shadow: none;
        background: #3d4f57;
        display: none;
    }
    .member-navbar nav ul li:hover > ul.sub-menu {
        display: block;
    }
}
</style>

<div class="member-navbar">
    <!-- Logo -->
    <div class="logo">
        <?php
        if (function_exists('the_custom_logo') && has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<h1 style="color:white;">Platform</h1>';
        }
        ?>
    </div>

    <!-- Navigation Menu -->
    <div class="menu-container">
        <nav>
            <?php
           require_once get_stylesheet_directory() . '/class-member-walker.php';

wp_nav_menu(array(
    'theme_location' => 'memberarea',
    'container'      => false,
    'menu_class'     => '',
    'items_wrap'     => '<ul>%3$s</ul>',
    'fallback_cb'    => false,
    'walker'         => new Member_Nav_Walker()
));
            ?>
        </nav>
    </div>

    <!-- User Info -->
    <div class="user-area">
        <?php if (is_user_logged_in()):
            $user = wp_get_current_user();
            echo get_avatar($user->ID, 32);
            echo '<span>Hello ' . esc_html($user->display_name) . ' &#9662;</span>';
        else: ?>
            <a href="<?php echo esc_url(wp_login_url()); ?>" style="color:#00e0b8;">Login</a>
        <?php endif; ?>
    </div>
</div>

