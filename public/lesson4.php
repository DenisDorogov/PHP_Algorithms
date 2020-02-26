<?php
$file = new SplFileObject('numbers.txt');
$file->seek(0);
echo $file->current();