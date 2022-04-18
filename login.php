<?php
session_start();

require_once('src/utils/userModel.php');
require_once('src/utils/common.php');

if($_SESSION['isAuthenticated'] === true){
    Common::redirect('/admin');
}

$msg = "";
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $isSuccessLogin = User::login($username, $password);
    if ($isSuccessLogin) {
        Common::redirect("/admin");
    }else{
        $msg = "    <script>
        Swal.fire({
        title: 'Error!',
        text: 'Username atau Password salah',
        icon: 'error',
        confirmButtonText: 'Ok'
        })
    </script>";
    }
}

?>
 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('src/components/head.php'); ?>
 <body>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
    <?php require_once('src/components/navbar.php'); ?>
    <?= $msg ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-10 row justify-content-center">
                <div class="col-12 col-md-7 col-lg-5 border px-4 py-3">
                    <h2 class="mb-4"> <i class="bi bi-person-fill"></i> Login</h2>
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input required name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input required name="password" type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark"> <i class="bi bi-box-arrow-right"></i> Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 </body>
 </html>