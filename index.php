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
        if (($file = fopen("csv_data/".$match[$i].".csv", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 0, "|")) !== FALSE) {
                $size = count($data);
                /*$match_code = $match[$i];
                $ok = true;
                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $add_row = $pdo->prepare("INSERT INTO $match_code VALUES (, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $add_row->execute($data);
                } catch (Exception $e) {
                    $ok = false;
                    echo $e . PHP_EOL;
                }
                if ($ok) echo "<br/>Added!<br/>"; */
                for ($i = 0; $i < size; $i++) echo "<br />".$data[$i];
            }
        } else echo "Error opening file";
    }
?>
