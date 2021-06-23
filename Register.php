<html>
<head>
    <title>Đăng Ký</title>
    <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="Register.php">
        <fieldset>
            <legend>Đăng Ký</legend>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" size="30px"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" size="30px"></td>
                </tr>
                <tr>
                    <td>Repassword:</td>
                    <td><input type="password" name="repassword" size="30px"></td>
                </tr>
                <tr><td colspan="2" align="center">
                <input type="submit" name="btn_ok" value="Ok">
                </td></tr>
            </table>
        </fieldset>
</body>
</html>

<?php
    $host="localhost";
    $username="root";
    $password="";
    $database="newbee";
    $conn=mysqli_connect($host,$username,$password,$database);
    mysqli_query($conn,"SET NAMES'utf8'");

    if(isset($_POST['btn_ok']))
    {
        $user=$_POST["username"];
        $pass=$_POST["password"];
        $repass=$_POST["repassword"];
        $user = strip_tags($user);
		$user = addslashes($user);
		$pass = strip_tags($pass);
		$pass = addslashes($pass);
        $repass = strip_tags($repass);
		$repass = addslashes($repass);
        if($user === "" || $pass === "" || $repass === "")
        {
            echo"Không được để trống Username hoặc Password";
        }
        else if($pass !== $repass)
        {
            echo "Password không giống nhau";
        } else {
            $sql="select * from user where Username='$user'";
            $query=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($query);
            if ($num_rows !== 0){
                echo "Tài khoản đã tồn tại!";
            }else {
                $register = "INSERT INTO `user` (`ID`, `Username`, `Password`, `Status`) VALUES (NULL,  '$user', '$pass', '1')";
                mysqli_query($conn,$register);
            }
        } 
    } 
?>