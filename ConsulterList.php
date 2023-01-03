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
  <link rel="stylesheet" href="style/styles.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="script/confirmation.js"></script>
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
      

      <table>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Identifiant</th>
            <th>Téléphone</th>
            <th>Addresse</th>
            <th>Activé/Desactivé</th>
            <th>Supprimé</th>
          </tr>
     <?php

        $connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $resto=$_SESSION["admin"]["login"];
        $resConsult= $connect->query("SELECT * FROM controler where nomRest='$resto'");
       
        while($ligne=$resConsult->fetch())
        {
    
         $id=$ligne["id"];
         $nom=$ligne["nom"];
         $prenom=$ligne["prenom"];
         $identifiant=$ligne["idenifiant"];
         $telephone=$ligne["telephone"];
         $adresse=$ligne["adresse"];

        ?>

         <tr>
              <td>  <?php echo"$id "; ?> </td>
              <td> <?php echo"$nom"; ?></td>
              <td>  <?php echo"$prenom"; ?></td>
              <td>  <?php echo"$identifiant "; ?> </td>
              <td>  <?php echo"$telephone"; ?></td>
              <td>  <?php echo"$adresse "; ?> </td>
              <td><?php
                if($ligne["status"]==1)
                {
                  echo'<p> <a href="activer.php? id='.$ligne['id'].'&status=0" style="background-color:green;color:black"> Activité </a> </p>';
                }else
                {
                  echo'<p> <a href="activer.php? id='.$ligne['id'].'&status=1" style="background-color:red;color:black"> Désactivité </a> </p>';
                }

                ?>
               
            </td>
              <td><?php echo" <a href='deleteControl.php? id=$id' style='color:red;';> <i class='fa fa-trash' aria-hidden='true' onclick='return confirmation();'></i> </a> "?> <td>
        
            </tr>

       <?php
        }
        ?>
        </table>
        


    

     

   

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