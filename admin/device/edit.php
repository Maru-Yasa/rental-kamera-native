<?php 
session_start();
require_once('../../src/utils/common.php');
require_once('../../src/utils/deviceModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}
 
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $device = Device::getById($id);
}

if (isset($_POST['nama'])) {
    $post = $_POST;
    if ($_FILES['img']['name'] === "") {
        $newDevice = [
            "id" => $post['id'],
            "nama" => $post['nama'],
            "memory" => $post['memory'], 
        ];
        var_dump($newDevice);    
        Device::update($newDevice);
        Common::redirect('../devices.php');
    }
    $image=$_FILES['img']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $uploadPath="../../public/uploads/".$newImageName;
    $isUploaded=move_uploaded_file($_FILES["img"]["tmp_name"],$uploadPath);
    $newDevice = [
        "id" => $post['id'],
        "nama" => $post['nama'],
        "memory" => $post['memory'], 
        "img" => "/public/uploads/$newImageName",
    ];
    Device::update($newDevice);
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
            <div class="col-12 col-md-5">
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <input type="text" name="id" value="<?= $device['id'] ?>" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input value="<?= $device['nama'] ?>" name="nama" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input value="<?= $device['memory'] ?>" name="memory" type="number" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Customer</label>
                        <input value="" name="img" type="file" class="form-control" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>