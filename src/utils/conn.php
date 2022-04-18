<?php 

class Conn extends PDO {

    public function __construct()
    {
        parent::__construct("mysql:dbname=putra;host=127.0.0.1", 'root', '');
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // always disable emulated prepared statement when using the MySQL driver
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    public function assoc($sql)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt;
    }

    public function srt($sql)
    {
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

}


?>