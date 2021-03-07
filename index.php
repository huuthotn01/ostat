<?php
    require('vendor/autoload.php');
    // include "index/index.php";
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"], $db["port"], $db["user"], $db["pass"],
        ltrim($db["path"], "/")
    ));
    echo "Importing CSV data..." . PHP_EOL;
    $match = ["week", "month", "quarter"];
    for ($i = 0; $i < 3; $i++) {
        if (($file = fopen("/csv_data"."/".$match[$i]."csv", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 0, "|")) !== FALSE) {
                $size = count($data);
                echo $size;
            }
        } else echo "Error opening file";
    }
?>
