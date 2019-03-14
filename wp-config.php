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
define( 'DB_NAME', 'xscinema_wp959' );

/** MySQL database username */
define( 'DB_USER', 'xscinema_wp959' );

/** MySQL database password */
define( 'DB_PASSWORD', '-2pSFG521@' );

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
define( 'AUTH_KEY',         'lmm5tlc84kvliwocuylheicsf1j83iu8jfuydmd5vgfozq5acnlzcdk5bwgycv5g' );
define( 'SECURE_AUTH_KEY',  'birvmadjg9ts62z6xbfhjc5mwi6gfpn5kcj68sodujrfjfvxwwbbmu0kjgrv1jqo' );
define( 'LOGGED_IN_KEY',    'jxfhiikms7yif7yyddmy3hhkauqq85aufjxuiies9xisjmhembbc7flnk6khqxbb' );
define( 'NONCE_KEY',        'j9mykvdqwjwhkqbt5l2apxwjug5jcqtgzsq4j6ewu6eksykxvzammagk1acxfvxm' );
define( 'AUTH_SALT',        'nrs1gtrycz4y0fl2cplgc55sentdrjzp6snsvpwq2xcomak1osridyn0msow5nno' );
define( 'SECURE_AUTH_SALT', '26pwd5fuo0hu7k3csn2shucdvapuxmllayb9rwt4ogsm3djxvkquahr4eswwuzoh' );
define( 'LOGGED_IN_SALT',   'fdrfznuy9ghb61uzppox577nnrrpjxzrclilx6f5ejopbvz1bkqvhm9rxyh7jn3v' );
define( 'NONCE_SALT',       'nx0zohuetpvqxcjyca2psq0xb2uhhiexlgh3dhg9awnkgt7dtrjoqorfis81n5py' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wpkd_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
