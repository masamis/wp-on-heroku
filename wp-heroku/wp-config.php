<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */




if ( file_exists( dirname( __DIR__ ) . '/wp-heroku/local-config.php' ) ) {


	/** Declare Dev-mode for WordPress */
    define( 'WP_LOCAL_DEV', true );
    /** Include config for dev environment */
    include( dirname( __DIR__ ) . '/wp-heroku/local-config.php' );
}
 else {

    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    /** The name of the database for WordPress */
    define("DB_NAME", trim($url["path"], "/"));
    /** MySQL database username */
    define("DB_USER", trim($url["user"]));
    /** MySQL database password */
    define("DB_PASSWORD", trim($url["pass"]));
    /** MySQL hostname */
    define("DB_HOST", trim($url["host"]));
    /** MySQL database port  */
    // define("DB_PORT", trim($url["port"]));
    /** Database Charset to use in creating database tables. */
    define("DB_CHARSET", "utf8");
    /** Allows both foobar.com and foobar.herokuapp.com to load media assets correctly. Also adds /wp/ to give WordPress its own directory. */
    define("WP_SITEURL", "http://" . $_SERVER["HTTP_HOST"] . "/");
    define("WP_HOME", "http://" . $_SERVER["HTTP_HOST"]);
    define("FORCE_SSL_LOGIN", getenv("FORCE_SSL_LOGIN") == "true");
    define("FORCE_SSL_ADMIN", getenv("FORCE_SSL_ADMIN") == "true");
    if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https")
      $_SERVER["HTTPS"] = "on";
    /** Disable the built-in cron job */
    define("DISABLE_WP_CRON", getenv("DISABLE_WP_CRON") == "true");
    /** Disable automatic updates, they won't survive restarting and scaling dynos */
    define("AUTOMATIC_UPDATER_DISABLED", true );
    /**  Prevent File Modifications */
    define ("DISALLOW_FILE_EDIT", true );

 }

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
define( 'AUTH_KEY',         'e-#+*vEm^E!%RP8)&-BP8*LHp:1%B}GJH+b6]WWN8ad/@x)hnEPM|e0f)P]9QZ/s' );
define( 'SECURE_AUTH_KEY',  'cC1m(SZF~0VZ gO=.Z`?zyhi*LQf?odMY6E`$2]YlwU*3$<VG# rdIFiDN9vc26T' );
define( 'LOGGED_IN_KEY',    'I_Unr*K*U8QqM@`)h]4u#hleHdqm3oh YurbaDcJM.(5%&*vcK2}l}N{VBh+r8g<' );
define( 'NONCE_KEY',        'mC~>p(8Dt)T*KNbU:EK&X<<tP_tsCFWdF2q?sNO6?]O2o,FgS9p%k8UNj{ g&3*4' );
define( 'AUTH_SALT',        'IQ5eh2h-%AlxULPWfjfltZv+Ds>%L[tI_z+j A]5T2DDJ0+vEUN`ct2(`g:`Nf3|' );
define( 'SECURE_AUTH_SALT', 'c/zRqHY+*Q;3!/;YxD~;Y;mih>S*zzFXT]V6]96o)%O7IrwbryXcrq]kc9jK1;&=' );
define( 'LOGGED_IN_SALT',   ';}L=!5,uE}i!t.Zk#S^8=~l|l)NIppApFPRqYwZ|+,UBWg5D2Vr5+h*^K6mb)otr' );
define( 'NONCE_SALT',       'l*W`<],<xQmvH`KTx[^$fPFS,|+?:G~2GrWV;6_%o%iFUolC=CDIZWUL3}-dF3$,' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
//define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
