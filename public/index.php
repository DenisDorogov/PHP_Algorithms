<?php
const PATH_PUBLIC = "/domains/PHP.ALGO/public";

$path = PATH_PUBLIC;

function test() {
    var_dump('test');
}

$dir = new DirectoryIterator($path);
echo "<a href='../'>{$path}</a>";
echo "<list>";
foreach ($dir as $item) {
    if ($item == '.' || $item == '..') continue;
//    echo $item. '/';
    echo "<li><a href='/{$item}'>{$item}</a></li>";
}
echo '</list>';
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>Hello</p>
</body>
</html>


