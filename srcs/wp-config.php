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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'namenega' );

/** MySQL database password */
define( 'DB_PASSWORD', 'mymdp' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '*=-#|6y3^u$UR.$|;&kmf` -kVK12zSz_fC|&},ak#peNp#t]WSmVig1W|=<(1;/');
define('SECURE_AUTH_KEY',  '/Fvev6)+Wr2vA/~)GPy7&I_2~xi|6_bw]|b)~XC8g,}}E6w<~R?p25JQ~8I;.gqw');
define('LOGGED_IN_KEY',    '9|p{2-Wv5=P`f|ML*`TUJYM(SOfh@M?]%+2r#n$c_2E|c[:iy]M%>*C_MR Z~0R%');
define('NONCE_KEY',        '9ucWSp3_+hYA=Nt_sl(-C(+NQrClD}bK5;WS~_+0#_.A1B^gwA+f.5|:S-O};*).');
define('AUTH_SALT',        '(( :O-?oX.!Szr`Ziyw:>AMYp]V2f:;L>Kg+5<RtA4u+[+eIrs422je250&-)Vja');
define('SECURE_AUTH_SALT', '{64V+2UKcyO%1Y2$+h])2tR(I[NrZOA)nt7R6$rzrEatW:U_@_rDDYk1m x*V.n+');
define('LOGGED_IN_SALT',   'eQxqVpp<l_3)9If@K|);x>jL,uaASD2TT0kmmm`Q1Ehn`abd5-:IFLT|,EB+GNC&');
define('NONCE_SALT',       '1BQJ`eSw[&<_;w[3s!f)<~TNy3[t,U}$BF-Vx:>[tW|_R5:q9#<Y bLMe4c|6NkK');

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
