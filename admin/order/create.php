<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/orderModel.php');
require_once('../../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_POST['nama_customer'])) {
    $post = $_POST;
    $newOrder = [
        "nama_customer" => $post['nama_customer'],
        "alamat" => $post['alamat'], 
        "id_kamera" => $post['id_kamera'],
        "id_karyawan" => $_SESSION['user']['id'],
        "tanggal_kembali" => $post['tanggal_kembali']
    ];
    Order::create($newOrder);
    Device::update([
        'id' => $newOrder['id_kamera'],
        'is_avaible' => 0,
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
            <div class="col-12 col-md-5 shadow p-3">
                <h3 class="text-dark">Create Order</h3>
                <form class="form" action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input require name="nama_customer" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                        <input require name="alamat" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <select class="form-select mb-3" aria-label=".form-select-lg" name="id_kamera">
                            <option selected>Pilih Device yang tersedia</option>
                            <?php foreach ($devices as $key => $value) { ?>
                                <option value="<?= $value['id'] ?>"> <?= $value['nama'] ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">tanggal Kembali</label>
                        <input require name="tanggal_kembali" type="date" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a class="btn btn-danger" href="/admin/orders.php">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>