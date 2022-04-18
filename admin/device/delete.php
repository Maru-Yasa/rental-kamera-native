<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_GET['id'])) {
    Device::delete($_GET['id']);
    Common::redirect('../devices.php');
}

?>