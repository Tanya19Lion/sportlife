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
define( 'DB_NAME', 'sportlife' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '-3WA%78f0i?y4lnli=>pf:}}3AZ@?WAbB% :)I0Q|:}ft#]]~1_8 Em8MW_HWdxj' );
define( 'SECURE_AUTH_KEY',  '-Z@R[,>86lzERExSO:+Y{X|k/==?Tp7:&qdjBJ&JRUs>JP!T$kIJYAX-+TCv;2vs' );
define( 'LOGGED_IN_KEY',    '1Z=jpa#[({eD^^=Uo|QRl8N0huKz5w@_Un)Y67Y~]z.@fv,_Fso3EmX=eB|Zee%q' );
define( 'NONCE_KEY',        'T?<AXlR[{5,&_CFbvqc8AvZ8$;L~$fTKdsQ0S@!);:]pE e[QGJ?X{M?1T*Dp.O6' );
define( 'AUTH_SALT',        '|+?|:n2RC~PbTonjd<[ %oDDGPI6v[1*ZN^hdL,,54I$5j_4K070U_Jx*Z*6zu:S' );
define( 'SECURE_AUTH_SALT', ',Nk8kBB3]BnO:?Cf=*|,]wA!,d8hw`8;|#nFByvzC^H-bu  a-!Q? :o$Z PNg~L' );
define( 'LOGGED_IN_SALT',   'dD^|*ueRlENBqpj8:=Z8}{@I+*/imGUNTwqiFcBOpa[E+vWkjP)OEC,Y0T#n1h+F' );
define( 'NONCE_SALT',       'q>y,pggx|S-qS= 1iqVw+sx=R4/3 lKO%-iX~klJ(0RYE7D+Dlzn&{b;S.,7M_+v' );

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
