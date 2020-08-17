<?php
define( 'WP_CACHE', true /* Modified by NitroPack */ ); // Simple Cache
 // Added by WP Rocket
 // Added by WP Rocket
 // Added by WP Rocket
 // Added by WP Rocket
define('JWT_AUTH_SECRET_KEY', 'PJH2rQ4x[fDzs3iLe+e^5ncc2-n>kt??cwTMd#tfu{|+j3KxW,31bEadcyZ^qMyH');
define('JWT_AUTH_CORS_ENABLE', true);
//define( 'WP_DEBUG', true ) ;
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
define( 'DB_NAME', 'u953084172_rest' );
/** MySQL database username */
define( 'DB_USER', 'u953084172_rest' );
/** MySQL database password */
define( 'DB_PASSWORD', '8xJ^]]Ey' );
/** MySQL hostname */
define( 'DB_HOST', 'mysql' );
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
define( 'AUTH_KEY',          'wCx`>HEVgcxyFYOFLSZjtsCxkK>Lf(@FaONLo;5,6J6$L!3h2@=Dm$LJ?5*H1*.`' );
define( 'SECURE_AUTH_KEY',   'Ch(^u&daIcMF|DzhrT;QaAV rGF0h>Vj3yvbjZ3bKn+rI@Lk/b}OBvCd.*l`OT4_' );
define( 'LOGGED_IN_KEY',     '^-J+p{pncM=6 g}VA1%R)t)z eh2%jK,J[rdwn{Z`z1c!V6@S$v.0JS7zoZ1sb:B' );
define( 'NONCE_KEY',         'SK|*cOkkSGBKw-X5BraiDrR*2#EG:iq-y ==`F;hIIzO2};6=JM=p@F]^DXc@aOh' );
define( 'AUTH_SALT',         'fX_wX$dbML`XSo^ouIq??J#tK@Qm)vjtp]{=[7m>oW/g+@]-xYx}rFB4>QWZM{um' );
define( 'SECURE_AUTH_SALT',  'N*,w62o,t!k0qYv`b1{PZ f6GY:CV|UpaPe>CW<N2/~K:SYE3+0Zpn)I..&n=!q`' );
define( 'LOGGED_IN_SALT',    '507a=JpT<ELl;ck_nIBtwWksX.Xfshbr1Sw1=p%&T#M@up2<8l,okFjTqBc,VPo*' );
define( 'NONCE_SALT',        'KuX>2p|Q]15y#05[uV!;Dxr[iNx&ak&O2W;gL-:!6U!T#lmH9_r1,;[?3psE|OpR' );
define( 'WP_CACHE_KEY_SALT', '4HjIDF*I{51}J_LlOC9ab<V&No;GpAbK,xij7W?3&F4W5!].!_E@:3l~QwbpteSW' );
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_7JYhc1_';
/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';