<?php
try
{
  $connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 
  if (isset($_POST["nameCon"]) && isset($_POST["PenomCont"]) && isset($_POST["IdentCont"])&& isset($_POST["PassCont"]) && isset($_POST["TelCont"]) && isset($_POST["AdresseCont"]))
 
  $reqControl = $connect->prepare("INSERT INTO controler (nom,prenom,idenifiant,mot_passe,telephone,adresse) VALUES(:nameCon,:PenomCont,:IdentCont,:PassCont,:TelCont,:AdresseCont)");
  
  $reqControl->bindValue(':nameCon', $_POST['nameCon']);
  $reqControl->bindValue(':PenomCont', $_POST['PenomCont']);
  $reqControl->bindValue(':IdentCont', $_POST['IdentCont']);
  $reqControl->bindValue(':PassCont', $_POST['PassCont']);
  $reqControl->bindValue(':TelCont', $_POST['TelCont']);
  $reqControl->bindValue(':AdresseCont', $_POST['AdresseCont']);
 
  $resControl_ok =$reqControl->execute();

  if ($resControl_ok)
    header("location:gererContr.php");

  else
    echo 'Echec  <br>';
  } catch (Exception $e) {
    die('Eureur:' . $e->getMessage());
  }
  
  $connect = NULL;

?>