<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connectdb.php");
$connectionDB = getConnection();
$p_connect = new PDO("mysql:host=localhost;port=3306;dbname=memdb", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$p_request = $p_connect->prepare("SELECT *FROM plats WHERE resto=:resto");
$p_request->execute(["resto" => (int)$_SESSION["admin"]["resto"]]);
$plats = $p_request->fetchAll(PDO::FETCH_ASSOC);
if (isset($_POST['date']) && isset($_POST['plat_repas']) && isset($_POST['plat_diner']) && isset($_POST['plat_repas2']) && isset($_POST['plat_diner2']) && !empty($_POST['date']) && !empty($_POST['plat_repas']) && !empty($_POST['plat_diner'])) {
  $p_request = $p_connect->prepare("INSERT INTO memu(dateMenu,repas,diner,repas1,diner1,resto) VALUES (:dateMenu, :repas,:diner,:repas1,:diner1,:resto)");
  $date = $_POST["date"];
  $repas = $_POST["plat_repas"];
  $diner = $_POST["plat_diner"];
  $repas1 = $_POST["plat_repas2"];
  $diner1 = $_POST["plat_diner2"];
  $p_request->execute(array("dateMenu" => $date, "repas" => $repas, "diner" => $diner, "repas1" => $repas1, "diner1" => $diner1, "resto" => (int)$_SESSION["admin"]["resto"]));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Ajout menu</title>
  <link rel="stylesheet" href="style/menu.css" />
  <link rel="stylesheet" href="style/dasbord.css" />
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
      <div class="decor">
        <form method="POST" action="" enctype="multipart/form-data">
          <form method="POST">
            <p id="A"> Menu du Jour</p><br>
            <p>
              <label>Date </label>
              <input type="date" name="date"><br>
            </p>
            <p id="A"> Repas</p>
            <p>
              <label for="ipRepas1" class="form-label mt-4">Plat 1</label>
              <select class="form-select" id="ipRepas1" name="plat_repas">
                <?php foreach ($plats as $plat) : ?>
                  <option value="<?= $plat['id'] ?>"><?= $plat['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </p>
            <p>
              <label for="" class="form-label mt-4">Plat 2</label>
              <select class="form-select" id="ipNomRepat1" name="plat_repas2">
                <?php foreach ($plats as $plat) : ?>
                  <option value="<?= $plat['id'] ?>"><?= $plat['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </p>
            <p id="A"> Dinner</p>
            <p>
              <label for="ipNomPlat1Diner" class="form-label mt-4">Plat 1</label>
              <select class="form-select" id="idClasse" name="plat_diner">
                <?php foreach ($plats as $plat) : ?>
                  <option id="ipNomPlat1Diner" value="<?= $plat['id'] ?>"><?= $plat['nom'] ?></option>
                <?php endforeach ?>
              </select>
            </p>
            <p>
              <label for="">Plat 2</label>
              <select id="ipNomPlatDiner2" class="form-select" id="idClasse" name="plat_diner2">
                <?php foreach ($plats as $plat) : ?>
                  <option value="<?= $plat['id'] ?>"><?= $plat['nom'] ?></option>
                <?php endforeach ?>
              </select>
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
    padding-top: 2%;


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
    margin-left: 10%;
    box-sizing: border-box;
    background-color: #FA4A0C;
    border: none;
    color: #ffffff;
    border-radius: 5px;
    margin-bottom: 5%;
  }

  #A {
    font-weight: bold;
    color: #FA4A0C;
  }
</style>