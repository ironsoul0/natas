<?php

class LogFile {
    public function __destruct() {
        file_put_contents($this->filename, $this->fcontents, FILE_APPEND);
    }
}

?>
