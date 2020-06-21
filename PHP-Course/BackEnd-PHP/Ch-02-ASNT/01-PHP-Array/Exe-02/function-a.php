<?php
    $data = file("question.txt") or die("Cannot read file");
    array_shift($data);

    foreach($data as $key => $value) {

    $tmp                 = explode("|", $value);
    $id                  = $tmp[0];
    $question            = $tmp[1];
    $arrayQuestions[$id] = array("question" => $question);
}

?>