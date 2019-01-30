<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'u12971_zezulinsky');

/** Имя пользователя MySQL */
define('DB_USER', 'u12971_zezulinsk');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'ePW^S[zea,aw');

/** Имя сервера MySQL */
define('DB_HOST', 'db2.unlim.com');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '*E=F~Hejm@C V$)SR^,6KA7g-0a=%-9Z%*z^tnRigi:6>=o]W[5^oYTe-dkA&7H6');
define('SECURE_AUTH_KEY',  '|4Gb&MX9K(,J`pMKor=})K8XM)N#GmF%0VCGx1gg+m<&X@#dfGj%1^|/6YufSTNF');
define('LOGGED_IN_KEY',    'o|ICcIC?<#csNhbrFtz*qyuy+UPdBXb]!FF@9FC2zXl&);?f]k.?BGOn/QcqFh9^');
define('NONCE_KEY',        'T?d-2$%, `Ph=@`/zCNW_v{e Sy#62Gb)cOE]~#LR]n48&jot:km~q,kHrN|,FGR');
define('AUTH_SALT',        ')>1T<?)p 0XQJe&<<2g yKW)uC.`Wm/(w|eXf+EZ*+lrtuhFc0VXF2@<3b>DFZnp');
define('SECURE_AUTH_SALT', 'v%}kz(utq/6@c]4PDHo~)F_2Wx:/FF=OH:S/M!{p |_w{=&O7UB!jbG=&8<9e)rd');
define('LOGGED_IN_SALT',   'jl3y7P_A,MWGe$(%#FX/5Z;:FvRD?H+=|^y8vH!Op4V!H-zF=so5}sf%#)zeAxR2');
define('NONCE_SALT',       'u<F0UwY0RZ;qpiWmFiWrimZBy]$rNnx2&fjHF`U(em4}xzMs7>GX}fe&2r6[y_J_');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'ojwwj_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
