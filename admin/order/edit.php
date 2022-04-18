<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/orderModel.php');
require_once('../../src/utils/deviceModel.php');


if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $order = Order::getById($id);
}
if (isset($_POST['id'])) {
    $post = $_POST;
    $newOrder = [
        "id" => $post['id'],
        "nama_customer" => $post['nama_customer'],
        "alamat" => $post['alamat'], 
        "id_kamera" => $post['id_kamera'],
        "tanggal_pinjam" => $post['tanggal_pinjam'],
        "tanggal_kembali" => $post['tanggal_kembali']
    ];
    Device::update([
        'id' => $order['id_kamera'],
        'is_avaible' => 1
    ]);
    Order::update($newOrder);
    Device::update([
        'id' => $newOrder['id_kamera'],
        'is_avaible' => 0
    ]);
    Common::redirect('../orders.php');
}

$devices = Device::getAvaible();

?>

 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../../src/components/head.php'); ?>
 <body>
    <?php require_once('../../src/components/navbar.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <form class="form" action="" method="POST">
                    <input type="text" name="id" value="<?= $order['id'] ?>" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input value="<?= $order['nama_customer'] ?>" name="nama_customer" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input value="<?= $order['alamat'] ?>" name="alamat" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" aria-label=".form-select-lg" name="id_kamera">
                                <option selected>Pilih Device yang tersedia</option>
                                <?php foreach ($devices as $key => $value) { ?>
                                    <option value="<?= $value['id'] ?>"> <?= $value['nama'] ?> </option>
                                <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tanggal Pinjam</label>
                        <input value="<?= $order['tanggal_pinjam'] ?>" name="tanggal_pinjam" type="date" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tanggal Kembali</label>
                        <input value="<?= $order['tanggal_kembali'] ?>" name="tanggal_kembali" type="date" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a href="/admin/orders.php" class="btn btn-danger">cancel</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>