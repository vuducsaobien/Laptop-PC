<?php
    $data = file("question.txt") or die ("Cannot read file");
    array_shift($data);

    $arrayQuestions = array();
    foreach($data as $key => $value) {

    $tmp                 = explode("|", $value);
    $id                  = $tmp[0];
    $question            = $tmp[1];
    $arrayQuestions[$id] = $question;
}

echo "<pre>";
print_r($arrayQuestions);
echo "</pre>";

?>
