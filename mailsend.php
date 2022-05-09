<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '*******',  // 出於安全考量不打出密碼，這個程式會因此無法正常執行
    'email');  // 預設使用的資料庫名稱



$subject=$_POST['subject'];
$content=$_POST['content'];
$content=nl2br($content);

?>

<?php

$sql = "SELECT * FROM email ";
$result = mysqli_query($link, $sql);

$emails=array();
while($row=mysqli_fetch_array($result))
{  
    $emails[]=$row['email'];
}

?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>
<?php

foreach($emails as $email){

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'a1093364@mail.nuk.edu.tw';                     //SMTP username
        $mail->Password   = '*********';                               //// ***********************************出於安全考量不打出密碼，這個程式會因此無法正常執行***********************************
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure ='ssl';
        $mail->CharSet='UTF-8';

        //Recipients
        $mail->setFrom('a1093364@mail.nuk.edu.tw', '電子報');
        $mail->addAddress($email);     //Add a recipient
        //$mail->addAddress('ellen@example.com');               //Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        $message=$content;
        $mail->Body    = $message;
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo '訊息已傳送給'.$email."</br>";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    }


?>

