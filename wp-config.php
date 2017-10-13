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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'asimstoys');

/** MySQL database username */
define('DB_USER', 'admin');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Wt;p+_OKRpdy[8lOkK]$_:xzY Le=`>Dlir@n02B&Hp&n,wHYfaIJIwTLf>MEJmu');
define('SECURE_AUTH_KEY',  'As6>M_.E4HXwxA.dC:8Ran<4Z.)v$kAaMCf*,S.Bj<u9vRbC$p!osD4S^#MyLQ}l');
define('LOGGED_IN_KEY',    '2joHVZe%pLMK8Xq55F<ObBd~^H2;sh%1ANau?jZ!ScqA|9Nyl}OUOtl2;yU,Gbz#');
define('NONCE_KEY',        'Pt^i+?g/14R[y$h|v?0xWC/wBvK;jOVI_~#C5W3:5_M=5;K6O.Cl=TH=R) 8`tS&');
define('AUTH_SALT',        'I:oU=H>qsK?^t;x#1{$00B) B]br{~geHtZvF[HG3=d,>MPY<I>p@]Y>KPGuUoWt');
define('SECURE_AUTH_SALT', 'Y;0n5x52fzLO?EK3Ytxc#>p:b27g}<O++Bp*qS:I{e26EwdVlnJ.ugj*[tS!Cz`K');
define('LOGGED_IN_SALT',   '&iQ84/^7/4ZGL>)lh9E<J)|9H2BvbfK~/clae}Xm*8.`_h]+#]6IWFs|ZS39*+E3');
define('NONCE_SALT',       '>ZfhE6*Ep>{`v$(^AZx{T.KhiUTcq&,@x((a3p/N%IahaU@Cn+Y<&?<<,SFmy`0d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD','direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
