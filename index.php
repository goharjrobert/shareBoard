<?php
/**
 * Created by PhpStorm.
 * user: GRobert
 * Date: 2/6/2019
 * Time: 12:08 PM
 */

//Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/Home.php');
require('controllers/User.php');
require('controllers/Share.php');

require('models/home.php');
require('models/user.php');
require('models/share.php');

$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();
//echo $controller;
if($controller){
    $controller->executeAction();
}