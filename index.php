<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Welcome to my Book Store!</title>
    <?php session_start(); ?>
</head>
<header>
<div style="padding-top: 5px;margin:0 auto ; text-align: center">
<b>
    <?php include 'menu.php' ?>
</b>
</div>
</header>
<body>

<div style="margin:0 auto;text-align: center;padding:10px;background:#ffffff;width:1000px;border: 0px solid #ccc">
    <a href="#" class="easyui-linkbutton" iconCls="icon-cancel">Cancel</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-reload">Refresh</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-search">Query</a>
    <a href="#" class="easyui-linkbutton">text button</a>
    <a href="#" class="easyui-linkbutton" iconCls="icon-print">Print</a>
</div>
</body>
<b>
<?php include'footer.php'?>
</b>
</html>