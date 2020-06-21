<?php
//$student["SV001"] = array ("name" => "John", "sex" => 1, "score" => array(4,5,6));
//$student["SV002"] = array ("name" => "Peter", "sex" => 1, "score" => array(5,6,7));
//$student["SV003"] = array ("name" => "Marry", "sex" => 0, "score" => array(7,8,9));

$student = array (
        "SV001" => array("name"         => "John",
                         "sex"          => 1,
                         "score"        => array(4,5,6)
                        ),
        "SV002" => array("name"         => "Peter",
                         "sex"          => 1,
                         "score"        => array(5,6,7)
                        ),
        "SV003" => array("name"         => "Marry",
                         "sex"          => 0,
                         "score"        => array(7,8,9)
                        ),
                );
        
        


if (!empty($student)) {
        foreach ($student as $key => $value) {
                $name = $value["name"];
                $sex = ($value["sex"]==1) ? "Boy" : "Girl";

                $score = array_sum($value["score"]);

                echo "Name: " . $name . " - Sex: " .$sex . " - Total score: " . $score . "<br />";
        }
}
?>