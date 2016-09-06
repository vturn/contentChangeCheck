<?php

require_once "HashDetect.class.php";

$file = 'check.txt';

$hd = new HashDetect($file);

$content = file_get_contents('http://www.example.com/');

$hd->detectChange($content);