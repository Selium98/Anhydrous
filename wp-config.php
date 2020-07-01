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
define( 'DB_NAME', 'anhydrous_db' );

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
define( 'AUTH_KEY',         'KO1(j^=~yea%$|dVx83xLfnXqq.(>}V}RGAK`S`nP^ Uo?+&A}f&{<4bJQ^RRlTt' );
define( 'SECURE_AUTH_KEY',  '+=0R/A(-yPhVg-Xbw?{=6/JiUGSTJFUr^B2$Q3,JqLyj`nSi_Wy*VST4fcaITG/H' );
define( 'LOGGED_IN_KEY',    'CSNDfROIrm=`.suH=W6{gREQ7]K[>8?iYbQUyH*MfA e[u`}n5}N1u,m<7O<xf_a' );
define( 'NONCE_KEY',        'hI9NhHJtcXcZ*4)(R:_#g}d92l.9e3:aL&?/)joc(AIiAbqv3xy4wFAF3>g LoJC' );
define( 'AUTH_SALT',        '9}-Zlj~Ya:v<*YEgucKQJSA2)LGVeD/jBS=m*EE|.>p_eSf4~S?[t`HzFUC=JQ6?' );
define( 'SECURE_AUTH_SALT', '2pz}]e8=)gf>NpM`!leRdgC!?-kUN}zhgJV]GAc3j%MVlq^^Xqg]_q0n7Sw-n9Pw' );
define( 'LOGGED_IN_SALT',   'OF_}rc2K>m4I6CwV|NkT,lIKTNbFP9uMHFsMdcU1Gh}OdcY.lF+B`hxQs^Wd3vM?' );
define( 'NONCE_SALT',       'R>?Kk^$vm@8|u3+q0u*Sx6j?_FRMm2R<J++,y4dyQ2fu6I*$,YZfdbu&O*$gCBs@' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
