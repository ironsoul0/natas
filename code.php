<?php

include 'logging.php'; 

class ReadFile {
    public function __tostring() {
        return file_get_contents($this->filename);
    }
}

class User {
    public $username;
    public $isAdmin;
    private $someValue;

    public function __constructor() {
        $this->someValue = 1;
    }

    public function PrintData() {
        if ($this->isAdmin) {
            echo $this->username . " is an admin\n";
        } else {
            echo $this->username . " is not an admin\n";
        }
    }
}

$obj = new User();
$obj->username = 'ippsec';
$obj->isAdmin = true;

echo serialize($obj) . "\n";

if (array_key_exists('ippsec', $_POST)) {
    $obj = unserialize($_POST['ippsec']);
}

?>
