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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'fquQyXrVUelRBP8dfhbZcG0afAr6bwJ4P1KJzm5xUjYBlxjF3LeSOjd27zrvES0iHFprFVwP0afiDRQR5eb75Q==');
define('SECURE_AUTH_KEY',  '97r2EmS47kA/IFv25HcgHxEi9t1hpneyXV8qpEQX+xlMSIvIuln3x2j/H9qnr/10sMFUIhvzVlt6fmKCXam5XA==');
define('LOGGED_IN_KEY',    'HsSJQh+yp/+InI81MIkHYFJq0yZeoEdCCaGUAnixZUiLCJP7CO9ucJESO7Gq1MENrUZ+BrtaES8CzwjPXLvZZQ==');
define('NONCE_KEY',        'MK3uge9eMyIu+yy79arlCv8ne/NIpEbqZPedmDrOeBlVhK32+RNdQJ4NzB3mLSpwEsUv0nmhcJTx1GtcyamXlA==');
define('AUTH_SALT',        'HDTBvtqUQx4z0jSwunGw3NctbCJFdFXroW3+1xtvhCfZOt550o/ELjwcndkzIgu+1FVYNmjDx+oA1mjl0T7nEQ==');
define('SECURE_AUTH_SALT', 'UjoKPJP59+5sruZAOsn/j9jZa+a49Z2x5VcKT78Nra+YSIsJoKoxP6dtVibtU5pIWnKTSF6sBZganWIlX6itlg==');
define('LOGGED_IN_SALT',   'LHIVt4c+zhKfg5HWAsKFy9XfLIffaYu5E0UCcnBnO+9aGEkXyNwg+Cwus1yfohaCdANpkkTyBAT46ogHrWf64w==');
define('NONCE_SALT',       'LkO8Xm4ZBFl7gomF1jiQnhA1TZF/GZjew9gFkH2HZkqcz/GKkCEdWFN9XL9kDuMgWNXe4yZvefPCFm1NUjvsJw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
