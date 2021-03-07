<?php
    require('vendor/autoload.php');
    // include "index/index.php";
    echo "Hi" . PHP_EOL;
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"], $db["port"], $db["user"], $db["pass"],
        ltrim($db["path"], "/")
    ));
    
?>
