<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Câu điều kiện SWiTCH</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}
		
        .content {
            margin: 20px auto;
            width: 600px;
            border: 1px solid #999;
            padding: 10px;
        }

        .content h1 {
            color: red;
            text-align: center;
        }

        .content div.row span {
            display: inline-block;
            width: 255px;
            text-align: right;
        }

        .content div.row input[type=text] {
            padding: 3px 5px;
            display: block;
            margin: 0px auto 20px auto;
        }

        .content div.row input[type=submit] {
            padding: 3px 5px;
            display: block;
            margin: 0px auto 20px auto;
        }

        .content div.row p {
            font-weight: bold;
            font-size: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php

    $n1     = " ";
    $n2     = " ";
    $caculate     = " ";

    if(isset($_POST["number1"]) && isset ($_POST["number2"]) && isset($_POST["caculate"])) {
        $n1     = $_POST["number1"];
        $n2     = $_POST["number2"];
        $caculate     = $_POST["caculate"];
    }
    ?>



    <div class="content">
        <h1>Mô phỏng máy tính</h1>
        <form action="#" method="POST" name="main-form">
            <div class="row">
                <span>Số thứ Nhất</span>
                <input type="text" name="number1" value="<?php echo $n1;?>" />
            </div>

            <div class="row">
                <span>Phép toán</span>
                <input type="text" name="number2" value="<?php echo $n2;?>" />
            </div>

            <div class="row">
                <span>Số thứ Hai</span>
                <input type="text" name="caculate" value="<?php echo $caculate;?>" />
            </div>

            <div class="row">
                <input type="submit" value="Xem kết quả" name="submit"/>
            </div>

            <div class="row">
                <p>Kết quả 25 % 2 = 1</p>
            </div>

        </form>
    </div>

</body>
</html>