<?php
include_once 'function.php';

$protocal = "http://";
$server = $_SERVER['HTTP_HOST'];

define('DS', DIRECTORY_SEPARATOR);
//prepare root factory director
$inc_directory_path = explode('\\',__DIR__);
array_pop($inc_directory_path);
define('BASE_PATH', implode('\\', $inc_directory_path). '\\');


define('CONFIG_PATH', BASE_PATH.'config/');

define('INCLUDE_PATH', BASE_PATH.'admin/includes/');
define('IMAGE_PATH', BASE_PATH.'public/images/');

$request_uri = $_SERVER['SCRIPT_NAME'];
$uri_sections = explode('/', $request_uri);
array_pop($uri_sections);
array_pop($uri_sections);
$base_url = implode('/',$uri_sections);
$base_url = $protocal.$server.$base_url.'/';

define('MAIN_URL', $base_url.'admin/');
define('FRONT_URL', $base_url.'public/');
define('PUBLIC_URL', $base_url.'admin/public/admin/');
define('FRONTENED_URL', $base_url.'bookstore/admin/public/frontened/');
define('EXTRA_URL', $base_url.'bookstore/admin/public/extra/');


