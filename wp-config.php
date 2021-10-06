<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'news-blog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'le&0Yc!B,-awPW/V0SCnP;cLIGvO&]#!,RV??,KB_6o/x*uQbI.^9:q?JRCd=ert' );
define( 'SECURE_AUTH_KEY',  'Ym*o^RRdWJBOY&yN|1]qt5g!)%E#yl]+=Sy= #g}!v*!r,3u7j>/GJ1MCx6QThyF' );
define( 'LOGGED_IN_KEY',    '+&99|2jtna4 Ip,>iWMT~^pV3d0b4+lBV3=@tF Q(Kmr6v)V#FkrM*.fUl??}>!R' );
define( 'NONCE_KEY',        ' )V0zR$)V14VPCHQYu^Ci1+_Zk8GG*Jw-Z:3+z4L4*mg@IY_p+_ZO?Lv&)v[p$M/' );
define( 'AUTH_SALT',        'lU73/xW$Pb2YBV9MHfYx=B%Tt #48WK+&PPr$N)o4jW7g:|7cN3O]ynbckNCqpQ$' );
define( 'SECURE_AUTH_SALT', ';Sg=tO[k5ELf|M~BHvF&[DJ=ZC xBjE_%K@rXO{?jBu]LDtCJYIE)T6o0_WFq7?E' );
define( 'LOGGED_IN_SALT',   '(z7k|#0Utir8nO(UHn#0$1R:TaEUyGc7*]CC0;aK(kl.1@tbuH{=hl8d<sZXCdnZ' );
define( 'NONCE_SALT',       'O;lm*2C/kzrmVe7wm/.,}=G|BaKh:*Mvoi573D?<.P&rCqBsHIAk8Af,EY_[;7J@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpB_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
