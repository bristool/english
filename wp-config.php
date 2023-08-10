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
define( 'DB_NAME', 'english' );

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
define( 'AUTH_KEY',         '_gcRZ;/0*m2HT7=.%,8Z~9`/!/F(9lTAss$#}UyH9wAQFU;-4?3M B:sRqXB#({>' );
define( 'SECURE_AUTH_KEY',  'A!V&)TBWfd1<PrVX}oQjsut uXpM,.i}KF`rRmb+#Z/-PA{pHAlwI$8jjJcchIi+' );
define( 'LOGGED_IN_KEY',    'DN!^da<33{ ^gM}hu&!S@_<:s#:~z-(g>UF5&M$4kMMV]-o,{dzYAW<X!o_X~FWG' );
define( 'NONCE_KEY',        'x/O0nc3+,!@+C}ZnME}Q,QF)H{0I9CrmQjhW7cSXa<IB]dn[6K`:qbU]M9{}BC|Q' );
define( 'AUTH_SALT',        'u!8@%n:p,`J8#k)wk*l6N[gqH6!A5L5(on#_2(tQkVeAXs.ug=J{T&]L%nsSSEQC' );
define( 'SECURE_AUTH_SALT', 'ib,7U.(a:tz$|f]}s>aBX,OxZ}2[yUFgq)7z/&i#zK+gd2Btj%P1`])u({BBSg*E' );
define( 'LOGGED_IN_SALT',   '^nfQii^VfhJNYj/}-bBuOWjd08&A0*L+q~h,uT#BoQL7|gi}-/yxv7rgyOe8?aA8' );
define( 'NONCE_SALT',       'H[i87TCrxP< lSTkYdZio7Vi1E,s6^p|YcLow(O|KYlmN*p:Nb)L`Z&Gwq(Eq3y&' );

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
