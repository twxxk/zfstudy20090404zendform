<?php 
require_once 'Zend/Loader.php';

set_include_path(
	'application' . DIRECTORY_SEPARATOR . 'library'
	. PATH_SEPARATOR . get_include_path());

Zend_Loader::registerAutoload();
Zend_Controller_Front::getInstance()->throwExceptions(true);
Zend_Controller_Front::run('application' . DIRECTORY_SEPARATOR . 'controllers');
