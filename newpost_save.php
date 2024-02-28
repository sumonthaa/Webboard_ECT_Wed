<?php
session_start();
$cate=$_POST['category'];
$top=$_POST['topic'];
$comment=$_POST['comment'];
$user=$_SESSION['user_id'];

$conn=new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");

$sql="INSERT INTO post (title,content,post_date,cat_id,user_id)
    Value ('$top','$comm',NOW(),'$cate','$user')";
$conn->exec($sql);
$conn=null;
header("location:index.php");
die();
?>
