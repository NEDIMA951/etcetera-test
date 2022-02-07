<?php
//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
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
define( 'DB_NAME', 'etcetera' );

/** MySQL database username */
define( 'DB_USER', 'admin__root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Root12345' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'O;!/tWk@c=mu;<i2NC=rc4nubOnpZj VH)XjP3O9rYf;HE<$i@9^$|qji*#S9O~q' );
define( 'SECURE_AUTH_KEY',  'fJP|47VrU5Q69d?xehYZg#yQ3>XPfQc2UkM85|?SS+?Qd+ejUGQ_z5;1)sE-`Vg5' );
define( 'LOGGED_IN_KEY',    '(2d/4Q~nE71mZ{7NM#8T$mR2QLExE+zu&#?Id+sBD%J3rHYsP#LD{yh-AD5py~fb' );
define( 'NONCE_KEY',        '*1IT^i=>gww8g{Qk/3SJpq ~fCLBq^^s?Vd7Ewb2h4Nc2H5+>LD,M(U}~1Yv:0 S' );
define( 'AUTH_SALT',        'o/# njW6=eJrq~o}Ky4l&nj$!Q-$xS{kt2[HqE+2*!}=Cyujgk=B}F}s>v+trVvp' );
define( 'SECURE_AUTH_SALT', '?&5ek><-jp~s|E&2iQ+s:]5gT8|U9mI;dZhdxl;5W?[7t|3w|fRSxwZf#yj]W7X$' );
define( 'LOGGED_IN_SALT',   '$uP]+xw5n:psEh1~?~&?<b[%X|DYZg}s|_EtL^ ?7&oxsldEA^QCt~kHNE=Xw) ?' );
define( 'NONCE_SALT',       'R^>GL>[!Ca3E_ABYP[p9$+)he4vU*?+mMJj:Z=WN@d}DNBW@8LFl=Vd%m/fuVgr|' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
