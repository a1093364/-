
<html>
<title>發送電子報</title>
    <body bgcolor='#be77f' >
        <font color="red" size="7" face="標楷體"><center><b>發送電子報</b></center></font></br>
        

        <form action="mailsend.php" method="post" enctype="multipart/form-data">
                <center><b>主題 : <input type="text" name="subject" required> </b></center></br></br>
                <center><b>內容 : <textarea cols='30' rows='30' name="content" required></textarea><center></br>
                    
                <center><b><input type="submit"></b></center>
        </form>
        
    </body>
</html>