<?php
const PATH_PUBLIC = "/domains/PHP.ALGO/public";

$path = PATH_PUBLIC;
$list = '';

//$url = $_SERVER['REQUEST_URI'];

function render($path) {
    $dir = new DirectoryIterator($path);
    $upDir = substr_replace($path, '', strrpos($path, '/'));
    $list = "<a href=\'{$upDir}\'>{$path}</a><list>";
    foreach ($dir as $item) {
        if ($item == '.' || $item == '..') continue;
        $list = $list . "<li><a href='/{$item}'>{$item}</a></li>";
    }
    $list = $list . '</list>';
    return $list;
}
$list = render($path);

//var_dump($_POST);


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Проводник</title>
</head>
<body>
<form action="index.php">
    <?=$list?>

</form>

</body>
</html>


