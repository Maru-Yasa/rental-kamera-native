<?php
session_start();
require_once('../src/utils/common.php');
require_once('../src/utils/userModel.php');
if (!isset($_GET['id'])) {
    Common::redirect('/admin');
}

if (isset($_POST['id'])) {
    $post = $_POST;
    $newUser = [
        "id" => $post['id'],
        "username" => $post['username'],
        'password' => $post['password'],
    ];
    User::update($newUser);
    Common::redirect('/admin');
}


$user = User::getById($_GET['id']);


?>
 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../src/components/head.php'); ?>
 <body>
    <?php require_once('../src/components/navbar.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5 shadow p-3">
                    <h3 class="text-primary mb-2"> <i class="bi bi-person-fill"></i> Update Profile</h3>
                    <form class="form" action="" method="POST">
                        <input type="text" name="id" value="<?= $user['id'] ?>" hidden>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input value="<?= $user['username'] ?>" name="username" type="text" class="form-control" id="exampleInputEmail1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input value="<?= $user['password'] ?>" name="password" type="password" class="form-control" id="exampleInputEmail1">
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-fill"></i> Edit</button>
                        <a href="/admin" class="btn btn-danger">cancel</a>
                    </form>
                </div>
        </div>
    </div>

 </body>
 </html>