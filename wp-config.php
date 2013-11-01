<?php
/**
 * Il file base di configurazione di WordPress.
 *
 * Questo file definisce le seguenti configurazioni: impostazioni MySQL,
 * Prefisso Tabella, Chiavi Segrete, Lingua di WordPress e ABSPATH.
 * E' possibile trovare ultetriori informazioni visitando la pagina: del
 * Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Editing wp-config.php}. E' possibile ottenere le impostazioni per
 * MySQL dal proprio fornitore di hosting.
 *
 * Questo file viene utilizzato, durante l'installazione, dallo script
 * rimepire i valori corretti.
 *
 * @package WordPress
 */

// ** Impostazioni MySQL - E? possibile ottenere questoe informazioni
// ** dal proprio fornitore di hosting ** //
/** Il nome del database di WordPress */
define('DB_NAME', 'wordpress');

/** Nome utente del database MySQL */
define('DB_USER', 'root');

/** Password del database MySQL */
define('DB_PASSWORD', '');

/** Hostname MySQL  */
define('DB_HOST', 'localhost');

/** Charset del Database da utilizare nella creazione delle tabelle. */
define('DB_CHARSET', 'utf8');

/** Il tipo di Collazione del Database. Da non modificare se non si ha
idea di cosa sia. */
define('DB_COLLATE', '');

/**#@+
 * Chiavi Univoche di Autenticazione e di Salatura.
 *
 * Modificarle con frasi univoche differenti!
 * E' possibile generare tali chiavi utilizzando {@link https://api.wordpress.org/secret-key/1.1/salt/ servizio di chiavi-segrete di WordPress.org}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G+(f:8D]iUU%{d8?y>,fZ&`tV<x?1HH-Jv(-ef9Q,E}-EUy|:F?$5P(MNQF?+Vn8');
define('SECURE_AUTH_KEY',  '>}4zRzn7d)--Kz2Mg7{Rh%[UG*1`cbhQ:(D ?}wCj0lPfa+?ci4-+25qZlE|C>j9');
define('LOGGED_IN_KEY',    'N)A{<5jgDKoB2`~1VO],5Dj4I33NNO+)q8lDC#&X|I=fTW (K1PR V-%3]2y{^Y1');
define('NONCE_KEY',        'Ig-]s(WyKUAYJ88kl Y_(.$Y)p|N|u9~zc75R(BeybrHVRyxT,0C#ql]]b1DN|uw');
define('AUTH_SALT',        'of;IWH0hg+^Q>-ZOu*ME0H@Cmy$$$}5+Uu<@>=HluX/@a[*:B]q}zDQT4MZ QWoY');
define('SECURE_AUTH_SALT', 'UA3JG]{2.v|+jEt?T@O|{KAb>/P-<_]W|Ko?xl=C9)*GrU+k=EbyhA++n{o-AP9Y');
define('LOGGED_IN_SALT',   '>yAi8H[cYmC1k.Ve{>euBTLH|7LoGX=*TDP{h*&_`:JA-R/<EopWWN3|MB%fj7}M');
define('NONCE_SALT',       'A]QuLUJvQn$|$,BfF #)6![s!F_)(Z/F2oOO]7bH|oz> 9_P)>_CXy,ZGg_k>|h_');

/**#@-*/

/**
 * Prefisso Tabella del Database WordPress .
 *
 * E' possibile avere installazioni multiple su di un unico database if you give each a unique
 * fornendo a ciascuna installazione un prefisso univoco.
 * Solo numeri, lettere e sottolineatura!
 */
$table_prefix  = 'wp_';

/**
 * Lingua di Localizzazione di WordPress, di base Inglese.
 *
 * Modificare questa voce per localizzare WordPress. Occorre che nella cartella
 * wp-content/languages sia installato un file MO corrispondente alla lingua
 * selezionata. Ad esempio, installare de_DE.mo in to wp-content/languages ed
 * impostare WPLANG a 'de_DE' per abilitare il supporto alla lingua tedesca.
 *
 */
define('WPLANG', 'it_IT');

/**
 *
 * Modificare questa voce a TRUE per abilitare la visualizzazione degli avvisi
 * durante lo sviluppo.
 * E' fortemente raccomandato agli svilupaptori di temi e plugin di utilizare
 * WP_DEBUG all'interno dei loro ambienti di sviluppo.
 */
define('WP_DEBUG', false);

/* Finito, interrompere le modifiche! Buon blogging. */

/** Path assoluto alla directory di WordPress. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Imposta lle variabili di WordPress ed include i file. */
require_once(ABSPATH . 'wp-settings.php');
