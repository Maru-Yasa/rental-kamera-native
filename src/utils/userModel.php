<?php 
require_once('conn.php');

class User {

    public function __construct()
    {
        $this->db = new Conn();
    }

    static function all()
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM users")->fetchAll();
    }

    static function getById($id)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM users WHERE id=$id")->fetch();
    }

    static function getByUsername($username)
    {
        $db = new Conn();
        return $db->assoc("SELECT * FROM users WHERE username='$username'")->fetch();
    }

    static function create($user)
    {
        $db = new Conn();
        $username = $user['username'];
        $password = $user['password'];
        $role = $user['role'];
        $sql = "INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES (NULL, '$username', '$password', '$role')";
        return $db->assoc($sql);
    }

    static function update($order)
    {
        $db = new Conn();
        $id = $order['id'];
        $order['id'] = null;
        $sql = "UPDATE `users` SET ";
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
        $sql = "DELETE FROM `users` WHERE `users`.`id` = $id ";
        $db->assoc($sql);
    }

    static function login($username,$password)
    {
        $usr = new User();
        $a_user = $usr::getByUsername($username);
        if($a_user === false){
            return false;
        }else{
            if ($a_user['password'] !== $password) {
                return false;
            }else{
                $_SESSION['user'] = $a_user;
                $_SESSION['isAuthenticated'] = true;
                return true;
            }
        }
    }

    static function logout()
    {
        $_SESSION['user'] = null;
        $_SESSION['isAuthenticated'] = false;    
    }


}


?>