<?php 
session_start();
require_once('../src/utils/common.php');
require_once('../src/utils/orderModel.php');
require_once('../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../login.php');
}

$orders = Order::all();
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
                    <h1 class="text-primary">Orders</h1>
                    <a class="btn btn-sm btn-primary" href="/admin/order/create.php">Create <i class="bi bi-plus"></i></a>
                    <table id="orderTable" class="table table-stripped">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <td>No</td>
                                    <td>Nama Customer</td>
                                    <td>Alamat</td>
                                    <td>Device</td>
                                    <td>Tanggal Pinjam</td>
                                    <td>Tanggal Kembali</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $key => $value) { ?>
                                    
                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $value['nama_customer'] ?></td>
                                        <td><?= $value['alamat'] ?></td>
                                        <td><?= Device::getById($value['id_device'])['nama'] ?></td>
                                        <td><?= $value['tanggal_pinjam'] ?></td>
                                        <td><?= $value['tanggal_kembali'] ?></td>
                                        <td>
                                            <a href="/admin/order/delete.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
                                            <a href="/admin/order/edit.php?id=<?= $value['id']?>" class="btn btn-sm btn-primary"> <i class="bi bi-pencil-fill"></i></a>
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