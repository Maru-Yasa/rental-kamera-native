<?php 
require_once('conn.php');

class Order {

    public function __construct()
    {
        $this->db = new Conn();
    }

    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM transaksi")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM transaksi WHERE `id`=$id")->fetch();
    }

    static function create($data)
    {
        $db = new Conn();
        $nama_customer = $data['nama_customer'];
        $alamat = $data['alamat'];
        $id_kamera = $data['id_kamera'];
        $id_user = $data['id_karyawan'];
        $tanggal_kembali = $data['tanggal_kembali'];
        $sql = "INSERT INTO `transaksi` (`id`, `nama_customer`, `alamat`, `id_kamera`, `id_karyawan`, `total`, `tanggal_pinjam`, `tanggal_kembali`) VALUES (NULL, '$nama_customer', '$alamat', '$id_kamera', '$id_user', NULL, current_timestamp(), '$tanggal_kembali');";
        return $db->assoc($sql);
    }

    static function update($order)
    {
        $db = new Conn();
        $id = $order['id'];
        $order['id'] = null;
        $sql = "UPDATE `transaksi` SET ";
        foreach ($order as $key => $value) {
            if($value !== null){
                $sql .= "`$key` = '$value',";
            }
        }
        $sql = rtrim($sql, ",");
        $sql .= " WHERE `id`=$id";
        var_dump($sql);
        $db->assoc($sql);   
    }

    static function delete($id)
    {
        $db = new Conn();
        $sql = "DELETE FROM `transaksi` WHERE `transaksi`.`id` = $id ";
        $db->assoc($sql);
    }


}


?>