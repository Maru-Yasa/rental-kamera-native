<?php

class Common{

    static function redirect($url)
    {
        header("location: $url", true, 301);
        exit();
    }

    static function imgToBase64($path)
    {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

}



?>