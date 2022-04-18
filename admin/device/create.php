<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_POST['nama'])) {
    $post = $_POST;
    if (!isset($_FILES['img'])) {
        $newDevice = [
            "nama" => $post['nama'],
            "harga" => $post['harga'], 
            "img" => null,
        ];    
        Device::create($newDevice);
        Common::redirect('../devices.php');
    }
    $image=$_FILES['img']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $uploadPath="../../public/uploads/".$newImageName;
    $isUploaded=move_uploaded_file($_FILES["img"]["tmp_name"],$uploadPath);
    $newDevice = [
        "nama" => $post['nama'],
        "harga" => $post['harga'], 
        "img" => "/public/uploads/$newImageName",
    ];
    Device::create($newDevice);
    Common::redirect('../devices.php');
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
                <h3 class="text-dark">Create Device</h3>
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input require name="nama" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Harga</label>
                        <input require name="harga" type="number" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input require name="img" type="file" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a class="btn btn-danger" href="/admin/devices.php">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>