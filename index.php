<?php
require(__DIR__ . "/model/bankModel.php");
require(__DIR__ . "/model/connectDB.php");
require(__DIR__ . "/controller/bankController.php");

$controller = new \CotrollerBank\bankController();
$page = isset($_REQUEST['page']) ? $_REQUEST['page'] : NULL;

switch ($page) {
    case 'transfer':
        $controller->transfer();
        break;
    case 'index':
        $controller->index();
        break;
    default:
        $controller->login();
        break;
}
?>
