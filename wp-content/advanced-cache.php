<?php
defined( 'ABSPATH' ) or die( 'Cheatin\' uh?' );

define( 'WP_ROCKET_ADVANCED_CACHE', true );
$rocket_cache_path  = 'D:\OpenServer\domains\psychologue.loc/wp-content/cache/wp-rocket/';
$rocket_config_path = 'D:\OpenServer\domains\psychologue.loc/wp-content/wp-rocket-config/';

if ( file_exists( 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket\inc\vendors/classes/class-rocket-mobile-detect.php' ) && ! class_exists( 'Rocket_Mobile_Detect' ) ) {
	include_once 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket\inc\vendors/classes/class-rocket-mobile-detect.php';
}
if ( file_exists( 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket\inc\front/process.php' ) && file_exists( 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket/vendor/autoload.php' ) && version_compare( phpversion(), '5.4' ) >= 0 ) {
	include 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket/vendor/autoload.php';
	include 'D:\OpenServer\domains\psychologue.loc\wp-content\plugins\wp-rocket\inc\front/process.php';
} else {
	define( 'WP_ROCKET_ADVANCED_CACHE_PROBLEM', true );
}
