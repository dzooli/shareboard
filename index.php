<?php
// include config
require_once('config.php');

// Include basic classes
require('classes/Database.php');
require('classes/Controller.php');
require('classes/Model.php');
// Include the models
require('models/Home.php');
require('models/Share.php');
require('models/User.php');
// Include controllers
require('controllers/Home.php');
require('controllers/User.php');
require('controllers/Share.php');
// Include the bootstrapper
require('classes/Bootstrap.php');

$bootstrap = new Bootstrap($_GET, $_SERVER, $config['app_homedir']);
$controller = $bootstrap->createController();
if ($controller){
	$controller->executeAction();
}

?>	