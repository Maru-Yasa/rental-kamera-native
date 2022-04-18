<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/userModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_POST['username'])) {
    $post = $_POST;
    $newUser = [
        "username" => $post['username'],
        'password' => $post['password'],
        'role' => $post['role']
    ];
    User::create($newUser);
    Common::redirect('../users.php');
}


?>

 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../../src/components/head.php'); ?>
 <body>
    <?php require_once('../../src/components/navbar.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow p-3">
                <h3 class="text-primary">Create Order</h3>
                <form class="form" action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input require name="username" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input require name="password" type="password" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <select class="form-select mb-3" aria-label=".form-select-lg" name="role">
                            <option selected>Pilih Role untuk user</option>
                            <option value="owner">Owner</option>
                            <option value="karyawan">Karyawan</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a class="btn btn-danger" href="/admin/users.php">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>