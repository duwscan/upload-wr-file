
<?php
require_once "File.php";
$file = new File("log.txt");
$file->readLines(function ($line) {
    echo $line;
    echo "<br>";
});
