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
define('DB_NAME', 'skenzodo_autocartusa');

/** MySQL database username */
define('DB_USER', 'skenzodo_auadmin');

/** MySQL database password */
define('DB_PASSWORD', 'auadmin@23816');

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
define('AUTH_KEY',         'yBTO.DZcc9n&U !jsy0A8R&w[?dmdjUUokc:6:F&GHJ!b#yqsWhMOe[Okfc8qeDh');
define('SECURE_AUTH_KEY',  'Z8MKQsK]5]mK,YycCFdix8ZT{HNd(I(LOw69e&rafY3f:egxMtXt4h2V7&4CGb6&');
define('LOGGED_IN_KEY',    ' 5A>g[CI|Y9Q:CqOHvM7&%!?RS(oqb9nHo[,g;a~%k2.3A;[(RD)~LD-R;rmWd0n');
define('NONCE_KEY',        '5yH:xilt1FDqBDP+azQU6=k&C].*jDv]}16u0+YLecJAEUUu8%*3,2awCYAZVW1D');
define('AUTH_SALT',        'ub]6*7n`:uY*s5wTu:b6Y2E9i bQ}rh+Lk+wGpSb0j5Ij+?#}Huyi34_N)_zB[3g');
define('SECURE_AUTH_SALT', 'mRJC!2YU0H3JW^ynNH)9~8E;$KH`{?T$#Vj`Q!U%K-BKn;`+w0|+t_9_erD%9]}p');
define('LOGGED_IN_SALT',   '6@tA)AA0E:WdbU$*32fkD+8]9F359pS9mzx3Y9x@[x.:.T4D qH;PTcJ!p1D|W>k');
define('NONCE_SALT',       'nppxSq&u|/:Ax`=XPHO}j/#^V*D,A_Q:m0FMz@8*/yA-%1zG. 7tRMUJVlA$/Gc ');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
