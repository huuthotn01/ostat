<?php
    function jsonDecode($val) {
        return json_decode($val, true);
    }

    function alertMsg($msg, $type) {
        echo '<div class="alert alert-'.$type.' alert-dismissible fade show" role="alert">';
        echo $msg;
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
        if ($type == 'success') {
            echo '<script type="text/javascript">';
            echo '$("#slider-0 #add-form, #slider-1 #add-form, #slider-2 #add-form").trigger("reset");';
            echo '</script>';
        }
    }

    function checkMatchCode($match_code, $match) {
        if ($match_code == "") {
            alertMsg('Enter match code!', 'danger');
            return false;
        } else {
            for ($i = 0; $i < strlen($match_code); $i++) {
                if (ord($match_code[$i]) < 49 || ord($match_code[$i]) > 52) {
                    alertMsg('Invalid character in match code!', 'danger');
                    return false;
                }
            }

            if (($match == "week" && (strlen($match_code) != 3 || $match_code.ord(0) == 52 || $match_code.ord(1) == 52)) || 
                ($match == "month" && (strlen($match_code) != 2 || $match_code.ord(0) == 52)) || ($match == "quarter" && strlen($match_code) != 1)) {
                alertMsg('Unsuitable match code', 'danger');
                return false;
            } else {
                return true;
            }
        }
    }

    if (!(isset($_POST["first"], $_POST["second"], $_POST["third"]))) {
        alertMsg('Error', 'danger');
        exit;
    }
    $input_quest = [$_POST["first"], $_POST["second"], $_POST["third"]];
    $input_quest_array = array_map('jsonDecode', $input_quest);
    $test_regex = "/|/i";
    if ($input_quest_array[0]["match"] != $input_quest_array[1]["match"] || $input_quest_array[0]["match"] != $input_quest_array[2]["match"] || $input_quest_array[1]["match"] != $input_quest_array[2]["match"] ||
        $input_quest_array[0]["match_code"] != $input_quest_array[1]["match_code"] || $input_quest_array[0]["match_code"] != $input_quest_array[2]["match_code"] || $input_quest_array[1]["match_code"] != $input_quest_array[2]["match_code"]) {
        alertMsg('Not the same match, try again!', 'danger');
    } else if ($input_quest_array[0]["num"] != "0" || $input_quest_array[1]["num"] != "1" || $input_quest_array[2]["num"] != "2") {
        alertMsg('Something wrong, refresh page and try again!', 'danger');
    } else {
        $file_name = "D:\\OStat\\csv_data\\".$input_quest_array[0]["match"].".csv";
        $passed = true;
        try {
            $file = fopen($file_name, 'a+');
        } catch(Exception $e) {
            $passed = false;
            alertMsg('Exception opening file: '.$e->getMessage().', try again!', 'danger');
        }
        if ($passed && checkMatchCode(strval($input_quest_array[0]["match_code"]), $input_quest_array[0]["match"])) {
            for ($i = 0; $i < 3; $i++) {
                $input = $input_quest_array[$i];
                $input["match_code"] = strrev($input["match_code"]);
                $array_for_csv = [$input["quest"], $input["answer"], $input["point"], $input["grade"], $input["match_code"], $input["notice"], strval($input["math"]), strval($input["physics"]), strval($input["chemistry"]), strval($input["biology"]), strval($input["literature"]), strval($input["history"]), strval($input["geography"]), strval($input["english"]), strval($input["other"]), strval($input["calculating"]), strval($input["video"])];
                fputcsv($file, $array_for_csv, '|');
            }
            alertMsg('Questions added successfully!', 'success');
        }
        fclose($file);
    }
?>