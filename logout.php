<?php 
session_start();

require('src/utils/userModel.php');
require('src/utils/common.php');

User::logout();
Common::redirect('login.php');
?>