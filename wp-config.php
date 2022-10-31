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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'rotiropi' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
// define( 'DB_PASSWORD', 'Er@DM#2022!' );
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'vvu4Wzx1(!E&55hagL&8<jcGu(&8r73nsT43+Y/wL%}<(]d{b^1-!;=Wa54cH}]h' );
define( 'SECURE_AUTH_KEY',  'v34+N)8+r5e=%#9 XENFadUUhO;Yk28H8FCZ~pAjB~5ZoU=,1N8C-o2_hk&w4^5|' );
define( 'LOGGED_IN_KEY',    'EE!z:xOUy~)gy0loTK6gBjMJyYQxnal/}<P42RWN`e@2q6=w^RVKfC**2(1-F>9s' );
define( 'NONCE_KEY',        'R^$Y8X5)7@>Khu[9xn_lTRE0F]?M+z0fz]{l69&++JPN37v0saPhz[*j[{Js`ZdH' );
define( 'AUTH_SALT',        'j6mZlo`W7)@tzU:j#tJiCC/xordmJc$&uZm[OJ}4Ur{v9Fpw@=&!TC!atkF57<wI' );
define( 'SECURE_AUTH_SALT', '5esTBV7]ToC]!>Dsq/xJ<QoVBvP8[P#L#jk*l.Uz+zJ_7g.&3y(D2>r0P@pDlggh' );
define( 'LOGGED_IN_SALT',   'j$t^IIYk.>#*Rs(cH_#G=6}R+n?f_GFHeYf<T?X}#&@Hg$)gmk{.39u68=7yz/38' );
define( 'NONCE_SALT',       ' gIXm0H~k!Vv5{9b<cIcteA#_DwsdIZBXaWKy1X}tN[YH#:!O%Yo:,_h#nOg$FhV' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
