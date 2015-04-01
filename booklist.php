<?php
/**
 * Created by PhpStorm.
 * User: sony
 * Date: 2015/4/1
 * Time: 11:15
 */
if(isset($_POST['submit'])) echo $_POST['submit'];
    $link = mysql_connect('localhost','root','123');
    if(!$link){
        die('Connection database failed !');
    }

    echo '<br/>';

    $select = mysql_select_db("bookstore",$link);
    if(!$select) {
        echo('Select database failed ! ');
    }

    $list = "SELECT * FROM booklist";
    $result = mysql_query($list);



?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Book list</title>
    <?php session_start(); ?>
</head>
<header>
    <div style="padding-top: 5px;margin:0 auto ; text-align: center">
        <b>
            <?php
                include 'menu.php';
                if (isset($_SESSION['username'])){
                    echo "<div class='text' style=' margin-left: -120px '>".'welcome  '.$_SESSION['username']."</div>";
                }
            ?>
        </b>
    </div>
</header>

<form action ="" method ="post">
    <div style="padding-top: 20px;margin:auto ; text-align: center;" >
        <table border="1" style="margin:auto;" >
            <tr>
                <td>编号</td><td>书名</td><td>作者</td><td>价格</td>
            </tr>
            <?php
            while ($row = mysql_fetch_assoc($result)){
                //print_r($row);
                ?><tr>
                <?php
                foreach ($row as $value){
                    //  echo $value.'<br/>';
                    echo "<td>".$value.'</td>';
                }
                if(isset($_SESSION['username'])&&$_SESSION['username']=='root') {
                    echo '<td>' . '<input type="submit" name="submit" value="Delete" />' . '</td>';
                    echo '<td>' . '<input type="submit" name="submit" value="Update" />' . '</td>';
                }
                ?></tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div id="dd" class="easyui-dialog" style="padding:5px;width:400px;height:200px;"
         title="My Dialog" iconCls="icon-ok"
         toolbar="#dlg-toolbar" buttons="#dlg-buttons">
        Dialog Content.
    </div>
    <div style = "padding-top: 20px;margin:auto ; text-align: center;">
        <input type="text" name = 'findname'>
        <input type="submit" name="submit" value="查找书目" />
    </div>
    <div style = "padding-top: 20px;margin:auto ; text-align: left;">
        <?php
        echo "
        书名：<input type='text' name = 'new_name'>
        作者：<input type='text' name = 'new_author'>
        价格：<input type='text' name = 'new_price'>".'<input type="submit" name="submit" value="增加书目" />'
        ?>
    </div>
    <div id="win" class="easyui-window" title="My Window" style="padding:10px;width:500px;height:200px;">
    </div>
</form>
</body>
<b>
<?php include'footer.php' ?>
</b>
<script>
    $('#win').window({
        collapsible:false,
        minimizable:false,
        maximizable:false,
        tools:[{
            iconCls:'icon-add',
            handler:function(){
                alert('add');
            }
        },{
            iconCls:'icon-remove',
            handler:function(){
                alert('remove');
            }
        }]
    });
</script>
</html>