<?php
const PATH_PUBLIC = "/domains/PHP.ALGO/public";

$path = PATH_PUBLIC;

$url = $_SERVER['REQUEST_URI'];

function render($path) {
    $dir = new DirectoryIterator($path);
    $upDir = substr_replace($path, '', strrpos($path, '/'));
    echo "<a href='$upDir'>{$path}</a>";
    echo "<list>";
    foreach ($dir as $item) {
        if ($item == '.' || $item == '..') continue;
//    echo $item. '/';
        echo "<li><a href='/{$item}'>{$item}</a></li>";
    }
    echo '</list>';
}

render($path);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Проводник</title>
</head>
<body>

</body>
</html>


