<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost:/var/opt/rocks/mysql/mysql.sock');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2z-r1R>b9]5`%O1v8+BbhYFTZAwVY3vNF0-m90PRh;nF/Z1GMt/D;19M>-USXKch');
define('SECURE_AUTH_KEY',  '/F#>R@|?{e4-vtAl`;#/8+~?R82IT)<vqe3Z-F,:c?087OC*4 mLA<B|1Q(]Ro;h');
define('LOGGED_IN_KEY',    'g+gcrSAcKXQ^c(_eIA6%&4U^VU9W:xS2Q--Gsmvd)ZV<Z*>|mu|}KGfkI+d4j<8h');
define('NONCE_KEY',        'v?V##?1<f;2q-WboDj-S{Sr{bsgFQd@*:72y}]!`DMXrTP~EEFh-VBZ1ZIsCl/D0');
define('AUTH_SALT',        '!9:ym2eD|2yk~@]cV~3H2TW4sDA-qYR?ZIXL%.>C4c_6H99`},cK+8k5SF/mogM,');
define('SECURE_AUTH_SALT', '9ok-~:aHJIH,74~oX9r9,,!8I^K.4I)!+bTN9m|WDoj!tjXme=+;cB8Y;GNw?)%:');
define('LOGGED_IN_SALT',   '8dcGA8Q@2r$K9Dh1f[au>7=uXf.Ag^cwG<MS@R4~z~k#q2Ol.5;Yx>,&4mTKOg=}');
define('NONCE_SALT',       'ES10(n2$/;|k*C l@1V6<7btPQi]|t*3,Ry$F+Q%K~+ghn#v{stjlyv[Vx_BD3eh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

