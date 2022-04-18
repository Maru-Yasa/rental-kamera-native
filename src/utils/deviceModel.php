<?php 
require_once('conn.php');

class Device {

    public function __construct()
    {
        $this->db = new Conn();
    }

    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM kamera")->fetchAll();
    }

    static function getAvaible()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM kamera WHERE `is_avaible` = 1")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM kamera WHERE id=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $nama = $data['nama'];
        $harga = (int) $data['harga'];
        $img = $data['img'];
        $is_avaible = 1;
        $sql = "INSERT INTO `kamera` (`id`, `nama`, `harga`, `img`, `is_avaible`) VALUES (NULL, '$nama', '$harga', '$img', '$is_avaible');";
        return $db->assoc($sql);
    }

    static function update($data)
    {
        $db = new Conn();
        $id = $data['id'];
        $data['id'] = null;
        var_dump($data);
        foreach ($data as $key => $value) {
            if($value !== null){
                $sql = "UPDATE `kamera` SET `$key` = '$value' WHERE `kamera`.`id` = '$id'";
                $stmt = $db->prepare($sql);
                $stmt->execute();
            }
        }
    }

    static function delete($id)
    {
        $db = new Conn();
        $sql = "DELETE FROM `kamera` WHERE `kamera`.`id` = $id ";
        $db->assoc($sql);
    }


}


?>