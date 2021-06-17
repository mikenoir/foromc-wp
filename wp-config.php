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
define( 'DB_NAME', 'cursos_yaydoo' );

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
define( 'AUTH_KEY',         '-zD.g[Bnypc4omvV5J(*tK5,go0 X&_2x<sNf9)m{f0h+t12|{7Vd(Vt5g&[&q6A' );
define( 'SECURE_AUTH_KEY',  'oL&CI,?YM=+Y_9-wQOCLd~qZ2Ys:s&aAk76D%>;Y47PC7S%|Eb/sbfhBe8+Pt|B6' );
define( 'LOGGED_IN_KEY',    'c$5fYk,h0FXqn`xC@3ZR[0-50Rd::WSFRY&u-MF]A/}< @Ro~&=ywaR`/8o5jUO>' );
define( 'NONCE_KEY',        'M0_|(EaQ!C/EGusxnYTNIFbj!Y<Jup)LpO}j??M<}C|zYkvHF!7=RGGR2`I@G*]h' );
define( 'AUTH_SALT',        'ec7/RcOOtT178E43rMog+fk^E tofxes~c~<u%lk?HJh7m{_z%p^I4[UsWZ_W|)Q' );
define( 'SECURE_AUTH_SALT', 'A$DOs_MTy1>QEwRB]s[vr^p@@G;C(Xg@*CV#*CJs_D7iC+%(7btg+qCNe)X=w],[' );
define( 'LOGGED_IN_SALT',   'Lyn)9iTWHmC^*Sksf^j]l=;uy9.7*O1G5=2Z,dxSO0*;#Z@ ?4$4&Ac[_fSjr`6G' );
define( 'NONCE_SALT',       'vc~_@fyu/VfIt.+eHaym]1@bbnS{0DS_vo;iM&97<9z:hsjeU7,svpiWGZ?AyKu;' );

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
