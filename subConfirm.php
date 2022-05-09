<?php
$link = @mysqli_connect( 
    'localhost',  // MySQL主機名稱 
    'root',       // 使用者名稱 
    '******',  // 出於安全考量不打出密碼，這個程式會因此無法正常執行
    'email');  // 預設使用的資料庫名稱
?>

<?php

$email=$_POST["email"];

$SQL="INSERT INTO email(email) VALUES('$email')";
$sql = "SELECT * FROM email WHERE email='$email'";
$result = mysqli_query($link, $sql);


if(mysqli_num_rows($result)==1)
{
    echo "<script type='text/javascript'>";
    echo "alert('您已經訂閱過了');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=subscribe.php'>";
}
elseif(mysqli_query($link,$SQL))
{
    echo "<script type='text/javascript'>";
    echo "alert('您已成功訂閱');";
    echo "</script>";
    echo "<meta http-equiv='Refresh' content='0; url=dispatch.php'>";
}




?>


