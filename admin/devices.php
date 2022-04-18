<?php 
session_start();
require_once('../src/utils/common.php');
require_once('../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../login.php');
}
$devices = Device::all();
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
                    <h1 class="text-primary">Devices</h1>
                    <a class="btn btn-sm btn-primary" href="/admin/device/create.php">Create <i class="bi bi-plus"></i></a>
                    <table id="deviceTable" class="table table-stripped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <td>No</td>
                                    <td>Nama</td>
                                    <td>Memory</td>
                                    <td>Status</td>
                                    <td>Image</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($devices as $key => $value) { ?>
                                    
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><?= $value['memory'] ?></td>
                                        <td><img src="<?= $value['img'] ?>" alt="" style="width: 100px;"></td>
                                        <td>
                                            <?php if ($value['is_avaible'] === 1) { ?>
                                                <span class="text-success">Belum ada yang meminjam</span>
                                            <?php }else{ ?>
                                                <span class="text-danger">Sudah ada yang meminjam</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <a href="/admin/device/delete.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
                                            <a href="/admin/device/edit.php?id=<?= $value['id']?>" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-fill"></i></a>
                                        </td>
                                    </tr>

                                    <?php $index++ ?>
                                <?php } ?>
                            </tbody>
                            <script>
                                $(document).ready(function() {
                                    $('#deviceTable').DataTable();
                                } );
                            </script>
                    </table>
                </div>
            </div>
        </div>
    </div>


 </body>
 </html>