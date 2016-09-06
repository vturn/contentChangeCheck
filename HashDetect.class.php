<?php

class HashDetect {

    private $file = null;

    public function __construct($file = null){
        if ($file == null){
            die('No file given!');
        }
        $this->file = $file;
    }

    public function detectChange($value = null){
        if ($value == null){
            die('No value given!');
        }
        $file = $this->file;
        $hash = MD5(serialize($value));
        if (file_exists($file)){
            $fileHandle = fopen($file, 'r') or die("Error opening file");
            $old_hash = fread($fileHandle, filesize($file));
        }
        if (empty($old_hash) || $old_hash != $hash){
            $this->changeAction();
            $fileHandle = fopen($file, 'w') or die("Error opening file");
            fwrite($fileHandle, $hash);
        }
        fclose($fileHandle);
    }

    public function changeAction(){
        echo 'changed';
    }

}