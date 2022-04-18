<?php 
session_start();
require_once('../src/utils/common.php');
require_once('../src/utils/userModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../login.php');
}

$users = User::all();
$index = 1;
?>
 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../src/components/head.php'); ?>
 <body>
     
    <div class="container-fluid">
        <div class="row">
            <?php require_once('../src/components/sidebar.php'); ?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
                <div class="col-10 mt-5">
                    <h1 class="text-dark">Karyawan</h1>
                    <a class="btn btn-sm btn-dark" href="/admin/user/create.php">Create <i class="bi bi-plus"></i></a>
                    <table id="orderTable" class="table table-stripped">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <td>No</td>
                                    <td>Username</td>
                                    <td>Role</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $value) { ?>
                                    
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $value['username'] ?></td>
                                        <td><?= $value['role'] ?></td>
                                        <td>
                                            <a href="/admin/user/delete.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
                                            <a href="/admin/user/edit.php?id=<?= $value['id']?>" class="btn btn-sm btn-dark"> <i class="bi bi-pencil-fill"></i></a>
                                        </td>
                                    </tr>
                                    <?php $index++ ?>
                                <?php } ?>
                            </tbody>
                            <script>
                                $(document).ready(function() {
                                    $('#orderTable').DataTable();
                                } );
                            </script>
                    </table>
                </div>
            </div>
        </div>
    </div>


 </body>
 </html>