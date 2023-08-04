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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'block_demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '81j/4R]J| bwv!3<g-K)4{k^3ll|~Jb-[v`R/klX/43Ci54=]1IsvwFM& ,:$dk ' );
define( 'SECURE_AUTH_KEY',  'g&Dkw(RJj0kGeD~iuoOz~8^Ro44_yp{[OJ,pIfY;J|M).y|OG,qm8r$!AN< vB7=' );
define( 'LOGGED_IN_KEY',    ';mc>_?YtYK7I|J9b3|@fN]J0;aqU&G>Nrg2E.BH7C_YU_h$t6?HQ!mjU9=)p?JDx' );
define( 'NONCE_KEY',        '[mJX1avN?D!.dZ-wz1V_<O,ys6nxMt@DMw>@).;<<xs];5tF|deOSs!]&+;`gxTG' );
define( 'AUTH_SALT',        '(//CKIy_wN2#4nV$al_Bd*i{B8D!]wzkJnCau<IPLh%AEI(5UMC]SoYHszV9Eo0K' );
define( 'SECURE_AUTH_SALT', '|aM,uHec:Y<9%$/<bSa_dZWj^}S2|V3e9(C0c^Ju]<nmFN]uG)7J<=p,YJOX0hm|' );
define( 'LOGGED_IN_SALT',   'b|;`5YJI?`z+,ex]|jg}kSS^#8d[H8tVB]&|L#G?6Kfhz9/5JY38M+ta]<1R0lIN' );
define( 'NONCE_SALT',       'uVr`$!$/z@[~ut]{%I^6S5UqNP%nFsT380fYFpW0?SqTZ[>Hx[^MqG4h;Zqxv3$9' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
