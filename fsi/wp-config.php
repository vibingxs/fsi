<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

switch($_SERVER['HTTP_HOST']) {
    case 'www.oracle-eppm.local':
    case 'oracle-eppm.local':
    case 'dev.fsi':
        define('ENVIRONMENT', 'development');
        break;

    case 'fsi.oracle-eppm.com':
        define('ENVIRONMENT', 'testing');
        break;

    default:
        define('ENVIRONMENT', 'production');
}


if (defined('ENVIRONMENT')){
    switch (ENVIRONMENT){
        case 'development':

        if($_SERVER['HTTP_HOST'] == "dev.fsi"){
            
            define('DB_NAME', 'oracle_fsi');
            define('DB_USER', 'root');
            define('DB_PASSWORD', '');
            
        }else{
            define('DB_NAME', 'oracle_fsi');
            define('DB_USER', 'ora_us3r');
            define('DB_PASSWORD', 'yANjKu32bH6WfNKu');
        }
//            define('WP_DEBUG', true);
//            error_reporting(E_ALL);
            error_reporting(E_ERROR | E_WARNING);
            break;

        case 'testing':
        case 'production':
            define('DB_NAME', 'oracle_fsi');
            define('DB_USER', 'ora_us3r');
            define('DB_PASSWORD', 'yANjKu32bH6WfNKu');
            define('WP_DEBUG', true);
            // error_reporting(0);
            break;

        default:
            exit('The application environment is not set correctly.');
    }
}

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[;nTPsj|pXcpe|Rut`qz7xawqyk:Y#]46]y7@*U:J)|Yf?`t::=|s:4+W)HrU^hs');
define('SECURE_AUTH_KEY',  'u@o(NLgV(t++ee;<,zPXio[N-jWL|Qm@0T(?#01T]o?{*)Q~D[h>A]|H-]`4|N0i');
define('LOGGED_IN_KEY',    'Q>l-iqSu.$Bx,IA#W;,iw?/5XqDg]o!RaF-D&>e2@TlT%LKjr0]P7jN~?D{lr~S}');
define('NONCE_KEY',        'Tk@2*fQ^MO?kalO88JtN{/g;,A5T<}nk)KAZU8xb6zc;rFGL8,7%|2wG`xGywG>N');
define('AUTH_SALT',        '*AK-Y{:=9@^eR#H.Y?M+qWo<VQ k5QJkuL,UyP|x%Vejb]//_@LgV)g2jE(`/T:{');
define('SECURE_AUTH_SALT', 'IO(M-:J+qFj1R6v1d%DQ/n9S9OsdCwn+HDOaj tNt)G>}/a-eY!eQ8E-Ah$1y?e.');
define('LOGGED_IN_SALT',   'c~65z-0{:W`*2!r^FA0aAQ6!=[-[_4<A{.fOP-G|oc2kyc4/k$`<f#Fc+-qD*M-c');
define('NONCE_SALT',       'vX}E;M+D`?rg@}1@8+bO)DTsqd~4BxjO5Xt4JEdYU>%sj;gK=bL@5Y<t/|j1dB.a');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
