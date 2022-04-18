<?php 
session_start();
require_once('../src/utils/common.php');
require_once('../src/utils/userModel.php');
require_once('../src/utils/deviceModel.php');
require_once('../src/utils/orderModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../login.php');
}

?>
 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../src/components/head.php'); ?>
 <body>
     
    <div class="container-fluid">
        <div class="row">
            <?php require_once('../src/components/sidebar.php'); ?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
               <div class="col-12 row justify-content-center">
                  <h1 class="text-primary mx-3">Dashboard</h1>
                  <div class="text-center">
                     <i class="bi bi-person-circle text-primary" style="font-size: 70px;"></i>
                     <br>
                     <span class="fs-3 mb-2">
                        Halo, <?= $_SESSION['user']['username'] ?>
                     </span>
                     <br>
                     <a class="btn btn-sm btn-outline-primary" href="/admin/edit_profile.php?id=<?= $_SESSION['user']['id'] ?>"> <i class="bi bi-pencil-fill"></i> Edit profile</a>
                  </div>
                  <div class="mt-1 col-10 row justify-content-center" style="height: 150px;">
                     <div class="card bg-primary col-3 mx-1">
                        <div class="card-body row">
                           <h3 class="text-white card-title">
                              Devices
                           </h3>
                           <div class="col-6">
                              <h2 class="text-white"><?= count(Device::all()) ?></h2>
                           </div>
                           <div class="col-6">
                                 <i class="bi bi-grid d-block right" style="font-size:60px;opacity:50%;"></i>
                           </div>
                        </div>
                     </div>
                     <div class="card bg-primary col-3 mx-1">
                        <div class="card-body row">
                           <h3 class="text-white card-title">
                              Orders
                           </h3>
                           <div class="col-6">
                              <h2 class="text-white"><?= count(Order::all()) ?></h2>
                           </div>
                           <div class="col-6">
                                 <i class="bi bi-table d-block right" style="font-size:60px;opacity:50%;"></i>
                           </div>
                        </div>
                     </div>
                     <div class="card bg-primary col-3 mx-1">
                        <div class="card-body row">
                           <h3 class="text-white card-title">
                              Karyawan
                           </h3>
                           <div class="col-6">
                              <h2 class="text-white"><?= count(User::all()) ?></h2>
                           </div>
                           <div class="col-6">
                              <i class="bi bi-people d-block right" style="font-size:60px;opacity:50%;"></i>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
        </div>
    </div>


 </body>
 </html>