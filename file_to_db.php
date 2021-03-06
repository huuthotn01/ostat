<?php
    require('vendor/autoload.php');
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"], $db["port"], $db["user"], $db["pass"],
        ltrim($db["path"], "/")
    ));
    echo "Importing CSV data..." . PHP_EOL;
    $match = ["week", "month", "quarter"];
    foreach ($match as $match_code) {
        if (($file = fopen("csv_data/".$match_code.".csv", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 0, "|")) !== FALSE) {
                $size = count($data);
                foreach ($data as &$temp) {
                    if ($temp === "") $temp = '0';
                }
                $ok = true;
                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $add_row = $pdo->prepare("INSERT INTO $match_code VALUES (DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $add_row->execute((array)$data);
                } catch (Exception $e) {
                    $ok = false;
                    echo $e . PHP_EOL;
                    exit;
                }
                if ($ok) echo "<br/>Added!<br/>";
            }
            fclose($file);
            echo "<br /> OK";
        } else echo "Error opening file";
    }
?>