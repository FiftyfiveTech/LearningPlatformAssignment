<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'learning_platform' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define( 'FS_METHOD', 'direct' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'ZL3{gtqp`0ExN~BGm=6oK {nK9 c5B([N[bJ`.p!*|?5D>QP*=7N<a<=wz6EEy-]' );
define( 'SECURE_AUTH_KEY',   '.RU(A(hp;tGr_H@_%m@by3ASV@qE&rZ;3)$d`14<&KRLY#D?f7V~M^?xuG}%^VJy' );
define( 'LOGGED_IN_KEY',     '{$tO/XbuD1s{f8Q3 |uObqVKL%gU~U}FfO|.UfPxD7Pbw8fCIXHc)k4>Z$r5r7F,' );
define( 'NONCE_KEY',         '-c~a$bl}V<Kp0<JW`-#}1_*NqRMD1Zq.#sa?L&<~o {O2%4bIFQ{?v+qY#}mYli+' );
define( 'AUTH_SALT',         '@b2dppA%egs&)m?o!}QCgBdd<$x,6pa]@ITcDI-@t:{@![Lqj3 ZAc?aZp7v`0Q^' );
define( 'SECURE_AUTH_SALT',  '9-J~W;vVt?o|kuCLeVNfQ`UESwkVe]%*uU8(@AWV%,A0f|n`/2MKQMUV%v6]!e8f' );
define( 'LOGGED_IN_SALT',    'I%VCF~7n0UQq{:55Lr_!CZjTuYX#n*|PBuE)XY;3&I?wx.poCbm)M5iY*Rv.?)&+' );
define( 'NONCE_SALT',        'ah <HQ158-S$4xb6t3F5&r&93`(L!PNn;3tJ4L{VW]kz![#~tp k6DnMsikds3.;' );
define( 'WP_CACHE_KEY_SALT', '$<eRjIj-5QrKyXIqU}|0;/{6y/UsF8g*)P5!js7LSlMzOr7uPB*3k6`,ST4R#wqs' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define('WP_MEMORY_LIMIT', '256M');

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';