<?php
session_start();

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
        <h4><?= $_SESSION["admin"]["login"] ?></h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
      <?php require("elements/side_navbar.php") ?>
    </nav>

    <div class="main-body">

      <form method="POST" action="./TraitCont.php" enctype="multipart/form-data">
        <div class="decor">

          <p>
            <label>Nom</label><br>
            <input type="text" name="nameCon" require="require" /> <br />
          </p>
          <p>
            <label>Prenom</label><br>
            <input type="text" name="PenomCont" require /> <br />
          </p>
          <p>
            <label>Identifiant</label><br>
            <input type="text" name="IdentCont" require /> <br />
          </p>
          <p>
            <label>Mot de passe</label><br>
            <input type="password" name="PassCont" require /> <br />
          </p>
          <p>
            <label>Telephone</label><br>
            <input type="number" name="TelCont" require /> <br />
          </p>
          <p>
            <label>Adresse</label><br>
            <input type="text" name="AdresseCont" require /> <br />
          </p>

          <button type="submit">Ajouter</button>

        </div>
      </form>
    </div>
</body>

</html>


<style>
  .decor {
    background-color: #ffffff;
    width: 70%;
    height: auto;
    margin: auto;
    text-align: center;
    padding-top: 2%;


  }

  .decor input {
    width: 50%;
    height: auto;
    font-size: 20px;
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
    margin-top: 1%;
    margin-bottom: 2%;

    box-sizing: border-box;
    background-color: #FA4A0C;
    border: none;
    color: #ffffff;
    border-radius: 5px;
  }

  #A {
    text-align: center;
    font-weight: bold;
    color: #FA4A0C;
  }
</style>