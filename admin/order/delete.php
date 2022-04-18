<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/orderModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_GET['id'])) {
    Order::delete($_GET['id']);
    Common::redirect('../orders.php');
}

?>