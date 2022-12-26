<?php
session_start();
require("db/connectdb.php");
require("functions.php");
$p_connect = getConnection();
if (isset($_POST['platName']) && isset($_POST['description']) && !empty($_POST['platName']) && !empty($_FILES['image']) && !empty($_FILES['image'])) {
  if ($_FILES['image']['error'] === 0) {
    if (checkImgExtension(checkExtention($_FILES["image"]['name']))) {
      $pathFinal =   moveFile($_FILES["image"]['name'], "images", checkExtention($_FILES["image"]['name']));
      $p_request = $p_connect->prepare("INSERT INTO plats(nom,description,img_url,resto) VALUES (:nom, :description,:img_url,:resto)");
      $nom = $_POST["platName"];
      $description = $_POST["description"];
      $p_request->execute(array("nom" => $nom, "description" => $description, "img_url" => $pathFinal, "resto" => (int)$_SESSION["admin"]["resto"]));
    } else
      die("L'extension du fichier: est invalide");
  } else
    die("Une erreur s'est produit lors chargement de l'image");
  //
  //
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Ajout menu</title>
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
        <li><a href="#">Ajout Menu ou Plat</a>
        <ul class="sousmenu">
          <li><a href="./AjoutMenu.php">Ajouter un menu</a></li>
          <li><a href="#">Ajouter un plat</a></li>
         
        </ul>
      </li>
      </ul>
        <a id ='det'href="#">Detail menu</a>
        <ul class="menu">
        <li><a href="#">Gerer les controleurs</a>
        <ul class="sousmenu">
          <li><a href="./gererContr.php">Ajouter</a></li>
          <li><a href="./ConsulterList.php">Consulter liste</a></li>
         
        </ul>
      </li>
      </ul>
        <a id="dec" href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>
      </div>
    </nav>

    <div class="main-body">
    <div class="decor">
    <p id="A"> Plat</p><br>
      <form method="POST" action="" enctype="multipart/form-data">
       
          <p>
            <label>Libellé</label><br>
            <input type="text" name="platName" require /> <br />
          </p>
          <p>
            <label for="">image</label><br>
            <input type="file" name="image">
          </p>
          <p>
            <label for="">Description</label><br>
            <textarea name="description" id="" cols="2" rows="2"></textarea><br>
          </p>
          <button type="submit">Ajouter</button>
    </form>
      

    </div>


  </div>
</body>

</html>


<style>
  .decor {
    background-color: #ffffff;
    width: 70%;
    height: auto;
    margin: auto;
    margin-top: 5%;
    text-align: center;
    padding-top: 5%;
    


  }

  .decor input,
  textarea,
  select {
    width: 50%;
    height: auto;
    font-size: 10px;
    margin: 10px 0px;
    padding: 6px 6px;
    box-sizing: border-box;
    background-color: #f2f2f2;
    border: 2px solid #cccccc;
    border-radius: 5px;
    text-align: center;
  }

  .decor button {
    width: 50%;
    height: auto;
    font-size: 20px;
    margin-top: 4%;
    margin-bottom: 2%;
   margin-bottom: 10%;
    box-sizing: border-box;
    background-color: #FA4A0C;
    border: none;
    color: #ffffff;
    border-radius: 5px;
  }

  #A {
    font-weight: bold;
    color: #FA4A0C;
  }
</style>