<?php
$connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$id=$_GET['id'];
$status=$_GET['status'];
$requeUp=$connect->prepare("update controler set status=$status where id=?");
$requeUp_ok=$requeUp->execute(array($id));
if($requeUp_ok)
header("location:ConsulterList.php");
?>