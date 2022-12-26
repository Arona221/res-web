<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard </title>
  <link rel="stylesheet" href="style/dasbord.css" />
  <link rel="stylesheet" href="style/menu.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
  <header class="header">
    <div class="logo">

      <a id="name" href="#">LaFourchette</a>

    </div>

    <div class="header-icons">

      <div class="account">
        <img src="./pic/img.jpg" alt="">
        <h4><?=$_SESSION["admin"]["login"]?></h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>

      <div class="side_navbar">


        <p> <img src="img/logo.png" class="img_logapp" alt=""></p>
        <a href="./dasbord.php" id="tab" class="active">Tableau de bord</a>
        
         <ul class="menu">
      <li><a href="#"> Ajouter Menu ou Plat </a>
        <ul class="sousmenu">
          <li><a href="./AjoutMenu.php">Ajouter un menu</a></li>
          <li><a href="./AjoutPlat.php">Ajouter un plat</a></li>
         
        </ul>
      </li>
      </ul>
        <a id ='det' href="#">Detail menu</a>
        <ul class="menu">
      <li><a href="#">Gerer les controleurs</a>
        <ul class="sousmenu">
          <li><a href="./gererContr.php">Ajouter</a></li>
          <li><a href="#">Consulter liste</a></li>
         
        </ul>
      </li>
      </ul>
        <a id="dec" href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>



      </div>
    </nav>

    <div class="main-body">
      <h2 style="text-align: center; color:#FA4A0C;">Liste de controleurs</h2>
      
     <?php

      try
      {
        $connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $resConsult= $connect->query("SELECT * FROM controler");
        echo"<table>";
        echo"<tr>";
        echo"<th>Id</th>";
        echo"<th>Nom</th>";
        echo"<th>Prénom</th>";
        echo"<th>Identifiant</th>";
        echo"<th>Téléphone</th>";
        echo"<th>Addresse</th>";
        echo"<th>Activé/desactivé</th>";
        echo"<th>Supprimé</th>";
        echo"</tr>";
        while($ligne=$resConsult->fetch())
        {
         $id=$ligne["id"];
         $nom=$ligne["nom"];
         $prenom=$ligne["prenom"];
         $identifiant=$ligne["idenifiant"];
         $telephone=$ligne["telephone"];
         $adresse=$ligne["adresse"];

        

         echo"<tr>";
         echo"<td> $id </td>";
         echo"<td> $nom </td>";
         echo"<td> $prenom</td>";
         echo"<td> $identifiant </td>";
         echo"<td> $telephone</td>";
         echo"<td> $adresse </td>";
         echo"<td>validé</td>";
         echo"<td> <a  style=' color:red;';href='#'> <i class='fa fa-trash' aria-hidden='true'></i></a>  <td>";
         echo"</tr>";

        }
        echo"</table>";
        

      }
     catch (Exception $e) {
        die('Eureur:' . $e->getMessage());
      }



     ?>

     

   

  </div>
  </div>
</body>

</html>
<style>
  table
  {
   margin: auto;
   margin-top: 5%;
  }
</style>