<?php
/**
 * Created by PhpStorm.
 * User: H.K.
 * Date: 2015/3/31
 * Time: 16:42
 */
$link = mysql_connect('localhost','root','123');
if(!$link){
    die('Connection database failed !');
}

echo '<br/>';

$select = mysql_select_db("bookstore",$link);
if(!$select){
    die ('Select database failed ! ');
}

$username=$pw=$email="";

if(!empty($_POST['username'])&&!empty($_POST['pw'])&&!empty($_POST['email'])) {
    $username=$_POST['username'];
    $pw=$_POST['pw'];
    $email=$_POST['email'];

    $insert = "INSERT INTO user(username,userpasswd,email)
              VALUES(\"$username\",\"$pw\",\"$email\")";
    $result = mysql_query($insert);
    if ($result && mysql_affected_rows() > 0) {
       // echo 'Insert success!<br/>';
        echo "<script language=\"JavaScript\">alert(\"注册成功\"); window.location.href='signup.php';</script>";
    } else {
        echo "<script language=\"JavaScript\">alert(\"注册不成功，请注意所填项格式！\"); </script>";
    }
}
mysql_close($link);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Welcome to my Book Store!</title>
</head>
<header>
    <div style="padding-top: 5px;margin:0 auto ; text-align: center">
        <b>
            <?php include 'menu.php' ?>
        </b>
    </div>
</header>
<body>
<form action ="" method ="post">
    <div style="padding-top: 5px;margin:auto ; text-align: center;" >
        <table border="1" style="margin:auto;" >
            <tr>
                <td>用户名:<input type="text" name="username" /></td>
            </tr>
            <tr>
                <td> 密 码：<input type="text" name="pw" /></td>
            </tr>
            <tr>
                <td> 邮 箱：<input type="text" name="email" /></td>
            </tr>
            <tr>
                <td>
                    <div style="margin:4px ; text-align: center;">
                        <input type="submit" value ="注册" name="regist">
                    </div>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
<b>
    <?php include'footer.php'?>
</b>
</html>