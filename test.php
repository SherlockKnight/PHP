<?php
/**
 * Created by PhpStorm.
 * User: H.K.
 * Date: 2015/3/29
 * Time: 16:07
 */
    $link = mysql_connect('localhost','root','123');
    if(!$link){
        die('Connection failed !');
    }else{
        echo 'Connnect success!<br/>';
    }

    echo '<br/>';

    //$mysql_command = "create database dbtest";
    //mysql_listdbs($link) or die('God know how!');
    //mysql_select_db('phptest'.$link) or die('Select failed ! ');
    mysql_select_db("bookstore",$link) or die ('Select failed ! ');
    echo ('Select success !<br/>');

    echo '<br/>';

    $create = "CREATE TABLE  booklist(
      id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
      bookname VARCHAR(50) NOT NULL UNIQUE,
      author VARCHAR(50) NOT NULL,
      price INT(10) NOT NULL
    )";

    /*$mysql_command= "create table testOne(
      id int not null primary key auto_increment,
      column1 varchar(128))";*/

/*    $result = mysql_query($create);
    if(!$result){
        echo 'Create table success!</br>';
    }else{
        echo 'Fail to create'."REASON".mysql_error() + '<br/>';
    }
    echo '<br/>';
*/
    $insert = "INSERT INTO booklist(bookname,author,price)
              VALUES('Computer network','WU',90)";
    $result = mysql_query($insert);
    if($result&&mysql_affected_rows()>0){
        echo 'Insert success!<br/>';
    }else{
        echo 'Insert fail!'.",Reason".mysql_error()+'<br/>';
    }

    $select = "SELECT * FROM booklist";
    $result = mysql_query($select);
    while ($row = mysql_fetch_assoc($result)){
        //print_r($row);
        foreach ($row as $key => $value){
          //  echo $value.'<br/>';
            echo $key . '->' . $value .'<br/>';
        }
    }

    echo'<br/>';
    mysql_close($link);

?>