<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Câu điều kiện SWiTCH</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='style.css'>
    <script src='main.js'></script>
    <style type="text/css">
    </style>
</head>
<body>
    <?php

        $n1         = "";
        $caculate   = "";
        $n2         = "";
        
        if (isset ($_POST["number1"]) && isset ($_POST["caculate"]) && isset ($_POST["number2"]) ) {
            $n1         = $_POST["number1"];
            $caculate   = $_POST["caculate"]; 
            $n2         = $_POST["number2"];
            $flag = true; 

                if (is_numeric ($n1) && is_numeric ($n2)) {
                    switch ($caculate) {
                        case '+':
                            $result = $n1 + $n2;
                            break;
    
                        case '-':
                            $result = $n1 - $n2;
                            break;
    
                        case '*':
                        case 'x':
                            $result = $n1 * $n2;
                            break;
    
                        case '/':
                        case ':':
                            $result = $n1 / $n2;
                            break;
    
                        case '%':
                            $result = $n1 % $n2;
                            break;
                        
                        default:
                        $result = $n1 + $n2;
                        $caculate = "+";
                            break;
                    } 
                } else { 
                        $result = "Không thực hiện được!!";
                        $flag = false; 
                    }
        }
    ?>



    <div class="content">
        <h1>Mô phỏng máy tính</h1>
        <form action="#" method="POST" name="main-form">
            <div class="row">
                <span>Số thứ Nhất</span>
                <input type="text" name="number1" value="<?php echo $n1; ?>" />
            </div>

            <div class="row">
                <span>Phép toán</span>
                <input type="text" name="caculate" value="<?php echo $caculate; ?>" />
            </div>

            <div class="row">
                <span>Số thứ Hai</span>
                <input type="text" name="number2" value="<?php echo $n2; ?>" />
            </div>

            <div class="row">
                <input type="submit" value="Xem kết quả" name="submit"/>
            </div>

            <div class="row">
                <p>
                    <?php
                        if ( $flag == true) {
                            echo "Kết quả " . $n1 . " " . $caculate . " " . $n2 . " = " . $result; 
                        } else {
                            echo $result;
                        }
                    ?>
                </p>
            </div>

        </form>
    </div>

</body>
</html>