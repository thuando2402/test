<?php
    session_start();
?>
<html>
<head>
    <title>Đăng Nhập</title>
    <meta charset="utf-8">
</head>
    <body>
        <form method="POST" action="login.php">
        <fieldset>
            <legend>Đăng Nhập</legend>
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" size="30px"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" size="30px"></td>
                </tr>
                <tr><td colspan="2" align="center">
                <input type="submit" name="btn_login" value="Đăng Nhập">
                <input type="submit" name="btn_register" value="Đăng Ký">
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
    
    if (isset($_POST["btn_login"])){
        $Username=$_POST["username"];
        $Password=$_POST["password"];
        $Username = strip_tags($Username);
		$Username = addslashes($Username);
		$Password = strip_tags($Password);
		$Password = addslashes($Password);
        if($Username=="" || $Password=="")
        {
            echo"Không được để trống Username hoặc Password";
        }
        else
        {
            $sql="select * from user where Username='$Username' and Password='$Password'";
            $query=mysqli_query($conn,$sql);
            $num_rows=mysqli_num_rows($query);
            if($num_rows==0)
            {
                echo "Tên đăng nhập hoặc mật khẩu không đúng";
            }else
            {
                $_SESSION['Username']=$Username;
                echo $_SESSION['Username'];
            }
        }
    }
    if (isset($_POST["btn_register"]))
    {
        header('Location:Register.php');
    }
?>