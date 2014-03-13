<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'wp_placecol3');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'root');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ';q@y4@2dZB80oDHvFtF& _FD6ALA=L#(!^4p2B/YLj[>Fk0L~(&-:+>?b#?fDlS!'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 'ut}%jpz4^{<omJm)zoaYeP. @V0dx!KWSl*G{@iBc%29_AtMG5*}X1r^5(>]xSaI'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', '9B>JU~u&?89&7be$g,$)b&3>{%]SE|Wx|;Z65|Dk/QDa>%#Lcx=c~Ma3I!TSnt^l'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'R%JD$NP^|$5bEsQ.{PzVY{e:065j>)ap0$@6~Hn O[SiSAJTKVA.Bl]_v_5Vdr<U'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', 'm8)]v$D5_>#,>xc0,4l)<:Acbr%;ro(-4%n5<J=Bab`FNvY[(1,!oALokR&bJ<<D'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', '+~{TYf&FpArblT7nu&Pd3u):_^UBtNw_piX&YmC51qdvG]d7B9sH#P}!Bm,I&+Ly'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '(bI!U`v-1)P_|(ddsKJ@W{A@ 4aO.zs(L`GBH*^3;Fsrh9Ykl8-xD^/4 Z3}%8pU'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '6!$-p~w8Q1fg>P;~lA_,`k7nXN*fTOz2C]^8MEKMBDH7?/2~=A.$vjSVGBn> }@,'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

define('FS_METHOD', 'direct');

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

