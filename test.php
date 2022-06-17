<?php
require_once './vendor/autoload.php';

$mapper = new \Uocnv\Dictionary\Mapper();

$result = $mapper->map('file_vi.srt', 'file_ja.srt');

var_dump($result);
die();
