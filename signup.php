
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript">
        function jump() {
            window.location.href="regist.php";
        }
    </script>
</head>
<header>
    <div style="padding-top: 5px;margin:0 auto ; text-align: center">
        <b>
            <?php include 'menu.php' ?>
        </b>
    </div>
</header>

    <form action ="" method ="post">
        <div style="padding-top: 5px;margin:auto ; text-align: center;" >
        <table border="1" style="margin:auto;" >
            <tr>
                <td>用户名: <input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>密 码： <input type="text" name="pw" /></td>
            </tr>
            <tr>
                <td>
                    <div style="margin:4px ; text-align: center;">
                    <input type="submit" value ="登录" name="login">
                    <input type="button" value ="注册" name="regist" onclick="jump()">
                    </div>
                </td>
            </tr>
        </table>
        </div>
    </form>
</body>
<?php include'footer.php' ?>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: H.K.
 * Date: 2015/3/30
 * Time: 18:40
 */
$link = mysql_connect('localhost','root','123');
if(!$link){
    die('Connection database failed !');
}

echo '<br/>';

$select = mysql_select_db("bookstore",$link);
if(!$select){
    echo ('Select database failed ! ');
}

$username="";
$pw="";
$count=0;

if(!empty($_POST['username'])&&isset($_POST['username'])) {    //echo 'You are '.$_POST['username'];
    $username = $_POST['username'];
    $pw=$_POST['pw'];
    $count+=1;
}

function check_valid($username,$pw)
{
    $check = "SELECT * FROM user";
    $result = mysql_query($check);
    while ($row = mysql_fetch_assoc($result)) {
        if ($row['username'] == $username && $row['userpasswd'] == $pw) return 1;
    }
    return 0;
}

if(check_valid($username,$pw)==0&&$count!=0)
    echo "<script language=\"JavaScript\">alert(\"用户名与密码不匹配，请重新输入\");</script>";
else if(check_valid($username,$pw)==1){
    echo "<script language=\"JavaScript\">alert(\"欢迎您！\");</script>";
    header('Location: ./index.php');
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['pw']=$pw;
}

mysql_close($link);
?>