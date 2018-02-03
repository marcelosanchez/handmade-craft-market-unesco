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
define('DB_NAME', 'unesco_hos');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME','http://200.10.147.158');
define('WP_SITEURL','http://200.10.147.158');

/**don't need FTP for installing a theme*/
define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'w H=Z WlBm5Y<d6sIwaKi:pVuF-,tI8$hP`e-o)ennSR|d1}88%Q+k8XIq/|Jp5O');
define('SECURE_AUTH_KEY',  ' $K5u*L9{?,%1Da<ZFMhV}W&z8!MBTnSncS[B|o+@M>fPIyaR7R.tNI4ThgPuYGD');
define('LOGGED_IN_KEY',    'W+jMH|O@|M1Z+_deA#4u3tRbuM.klRqb6LS`&~.GSdu/X_f^DwBHD<:#=@moyt0U');
define('NONCE_KEY',        ']!3Ebj==?Ya6cg_-dBk?p Odrb9skI54UNpoUPse9DtN=H>x=M3bQYDB0a/u=YlU');
define('AUTH_SALT',        'rGB_L>/{%m1cI[m$)RALPL|67{RPja`1`0u -PMF2jJiOEAT$08As5,k1/jm6S8f');
define('SECURE_AUTH_SALT', 'msN.,{@0R-Q}w+}Td`YupHqzq[2ldmIri$Cb>M0SymJSJBn2]4!trDaBm>hi~Mnr');
define('LOGGED_IN_SALT',   'Wo{oPk 7Z`C/&m=&oCycD;)E#^-TqwutzhRG2>K@J~f*&!-P}r2dv) KQ#?`4.2A');
define('NONCE_SALT',       'p!N.DL!0V6QwVGXvx4$i57wyb.Flm^z?e{G6|b~Jp.;lmhNB;bm!Y#Zq;D;w_t(i');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'hos_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
