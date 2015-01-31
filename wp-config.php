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
define('DB_NAME', 'wordpress');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'wordpressuser');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'dbwordpress');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/* * #@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
/** MAR: Redefinidas para la copia local **/
define('AUTH_KEY',         '7F,Lg=&(7Zm+#mWczZF<=Du |R~2k#0`kxHh>Wm+8>+-,*-g=n)]V K@{$*~@`Y ');
define('SECURE_AUTH_KEY',  'MZSZ+A,O5^VVn;=uT`:6UiCbXb=jXD~5?`{X#j.w[bL|A_Ytj#DLt[G#IK/I[%al');
define('LOGGED_IN_KEY',    'n,[H8uuGrW keH%ePOJ~(#4+v)%JJ#_M/qP.J48Iz33@]5ZGFb6l^2sE7TGs2OR9');
define('NONCE_KEY',        '~m-iD/oz75[zB6eWmsNGo[l|qn5xmrDcZ#*O(XYI-6fBIDCMv@sFzC0[~u8d7e:|');
define('AUTH_SALT',        '`[#>K>1k%c;fM&OM+W,F(ELf}Yl:s0.eF4!R2aXT#Lwd1j!ltj>nJ |tGfIFz,0r');
define('SECURE_AUTH_SALT', '~C=&H+</$Xk>yMP)(UUt#5**U(x9y7EW.X+(i[zr|_+=+|E6/xy`Q`gX+|]GD1]~');
define('LOGGED_IN_SALT',   '`a9vl3pb-obMcUdnRGPEv>ZmpcoZT.;+weU8Q;k-k9iD@*gatLp3UQ[=.|uY#^Td');
define('NONCE_SALT',       'Ll1yi&:DY:7c-|> R9YFK-5U^<w/T-F?qm]}Y5v/weDY}Os&rDQ52G/Zk7(/l+|k');

/* * #@- */

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como  *'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

define('WP_MEMORY_LIMIT', '128M');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if (!defined('ABSPATH'))
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

/** MAR: Redefinicion para la copia local **/
define('WP_HOME','http://mg-folder.org/');
define('WP_SITEURL','http://mg-folder.org/');

/** MAR: No pedir contraseña FTP **/
define('FS_METHOD', 'direct');

