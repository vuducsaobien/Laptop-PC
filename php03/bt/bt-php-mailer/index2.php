<form role="form" action="sendmail.php" method="post">
<input name="name" required="required" type="text" placeholder="Enter Your Name" />
<input name="email" required="required" type="email" placeholder="Email ID"/>
<input name="mobile" required="required" type="text" placeholder="Enter Mobile No"/>
<textarea name="message" placeholder="Enter Any Message"></textarea>
<input name="submit" type="submit" value="Send a Mail" /></form>

<?php
  
    require ("class.phpmailer.php");
  
    if(isset($_POST['submit'])){
        $name=$_POST['name']; // Get Name value from HTML Form
        $mobile=$_POST['mobile'];  // Get Mobile No
        $email=$_POST['email'];  // Get Email Value
        $message=$_POST['message']; // Get Message Value
          
          
        $mail = new PHPMailer();
          
        $mail->IsSMTP();
        $mail->Host = "websapex.com"; // Your Domain Name
          
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = "info@websapex.com"; // Your Email ID
        $mail->Password = "DT~-RQyJlaFV"; // Password of your email id
          
        $mail->From = "info@websapex.com";
        $mail->FromName = "WebsApex Team";
        $mail->AddAddress ("info@websapex.com"); // On which email id you want to get the message
        $mail->AddCC ($email);
          
        $mail->IsHTML(true);
          
        $mail->Subject = "Enquiry from Website submitted by $name"; // This is your subject
          
        // HTML Message Starts here
          
        $mail->Body = "
        <html>
            <body>
                <table style='width:600px;'>
                    <tbody>
                        <tr>
                            <td style='width:150px'><strong>Name: </strong></td>
                            <td style='width:400px'>$name</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Email ID: </strong></td>
                            <td style='width:400px'>$email</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Mobile No: </strong></td>
                            <td style='width:400px'>$mobile</td>
                        </tr>
                        <tr>
                            <td style='width:150px'><strong>Message: </strong></td>
                            <td style='width:400px'>$message</td>
                        </tr>
                    </tbody>
                </table>
            </body>
        </html>
        ";
        // HTML Message Ends here
          
              
        if(!$mail->Send()) {
            // Message if mail has been sent
            echo "<script>
                alert('Submission failed.');
            </script>";
        }
        else {
            // Message if mail has been not sent
            echo "<script>
                alert('Email has been sent successfully.');
            </script>";
        }
  
    }
?>