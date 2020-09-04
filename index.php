<?php 
	
	define('BASE_URL', 'http://localhost/Teste_Bitix/');

	$autoload = function($class) {
		if (file_exists('Controllers/'.$class.'.php')) {
			require 'Controllers/'.$class.'.php';
		} else if(file_exists('Models/'.$class.'.php')) {
			require 'Models/'.$class.'.php';
		} else if(file_exists('Core/'.$class.'.php')) {
			require 'Core/'.$class.'.php';
		}
	};


	spl_autoload_register($autoload);

	$app = new Core();

	$app->run();