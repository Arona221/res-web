<?php
if(isset($_GET["id"]));
$connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$delete=$_GET["id"];
$ReqDelete=$connect->prepare("DELETE  FROM controler where id=?");
$ReqDelete_ok=$ReqDelete->execute(array($delete));
if($ReqDelete_ok)
header("location:ConsulterList.php");

?>