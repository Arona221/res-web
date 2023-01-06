<?php
session_start();
require_once "db/connectdb.php";
date_default_timezone_set("Africa/Dakar");
$date = date("Y-m-d H-i-s");
$date1 = date("Y-m-d");
if (isset($_SESSION["admin"])) {
  $p_request = getConnection()->prepare("SELECT  nom FROM restaurant WHERE id=:id");
  $p_request->execute(array("id" => $_SESSION["admin"]['resto']));
  $r_request = $p_request->fetchAll(PDO::FETCH_ASSOC);
  $nom = $r_request[0]["nom"];
  //
  $date_pdeuj1 = $date1 . " 06:00:00";
  $date_pdeuj2 = $date1 . " 09:00:00";
  $p1_request = getConnection()->prepare("SELECT count(*) as nbr_petit_dej  FROM detail_transaction_resto WHERE resto=:resto AND type=:type and (date>=:date_pdeuj1 AND date<=:date_pdeuj2)");
  $p1_request->execute(array("resto" => $nom, "type" => "peti_dej", "date_pdeuj1" => $date_pdeuj1, "date_pdeuj2" => $date_pdeuj2));
  $r1_request = $p1_request->fetchAll(PDO::FETCH_ASSOC);
  $nbr_petit_dej = $r1_request[0]["nbr_petit_dej"];
  //
  $date_repas1 = $date1 . " 18:00:00";
  $date_repas2 = $date1 . " 21:00:00";
  $p1_request = getConnection()->prepare("SELECT count(*) as nbr_repas  FROM detail_transaction_resto WHERE resto=:resto AND type=:type and (date>=:date_repas1 AND date<=:date_repas2)");
  $p1_request->execute(array("resto" => $nom, "type" => "repas", "date_repas1" => $date_repas1, "date_repas2" => $date_repas2));
  $r1_request = $p1_request->fetchAll(PDO::FETCH_ASSOC);
  $nbr_repas = $r1_request[0]["nbr_repas"];
  //
  $date_diner1 = $date1 . " 18:00:00";
  $date_diner2 = $date1 . " 21:00:00";
  $p1_request = getConnection()->prepare("SELECT count(*) as nbr_diner  FROM detail_transaction_resto WHERE resto=:resto AND type=:type AND (date>=:date_diner1 AND date<=:date_diner2)");
  $p1_request->execute(array("resto" => $nom, "type" => "diner", "date_diner1" => $date_diner1, "date_diner2" => $date_diner2));
  $r1_request = $p1_request->fetchAll(PDO::FETCH_ASSOC);
  $nbr_diner = $r1_request[0]["nbr_diner"];
} else {
  header("Location:index.php");
}
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
        <h4><?= $_SESSION["admin"]["login"] ?></h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>

      <div class="side_navbar">


        <p> <img src="img/logo.png" class="img_logapp" alt=""></p>
        <a href="#" id="tab" class="active">Tableau de bord</a>

        <ul class="menu">
          <li><a href="#"> Ajouter Menu ou Plat </a>
            <ul class="sousmenu">
              <li><a href="./AjoutMenu.php">Ajouter un menu</a></li>
              <li><a href="./AjoutPlat.php">Ajouter un plat</a></li>

            </ul>
          </li>
        </ul>
        <a id='det' href="detail.php">Detail menu</a>
        <ul class="menu">
          <li><a href="#">Gerer les controleurs</a>
            <ul class="sousmenu">
              <li><a href="./gererContr.php">Ajouter</a></li>
              <li><a href="ConsulterList.php">Consulter liste</a></li>

            </ul>
            <a id="dec" href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>



      </div>
    </nav>

    <div class="main-body">
      <h2>Tableau de bord </h2>
      <div class="promo_card">
        <h1>Bienvenu sur la LaFourchette</h1>
        <span>Restaurant <?= $_SESSION["admin"]["login"] ?></span><br><br>
        <p id="satis"> La satisfaction des étudiants est notre crédo</p>
      </div>
      <h1>
      </h1>
      <div class="history_lists">
        <div class="list1">
          <table>
            <thead>
              <tr>
                <th>Nombre de tickets petit dejeuner</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="nbr"><?= $nbr_petit_dej ?>
                  <p style="font-size: small;"><?= $date1 ?></p>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
        <div class="list2">

          <table>
            <thead>
              <tr>
                <th>Nombre de tickets repas</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="nbr">
                  <p><?= $nbr_repas ?></p>
                  <p style="font-size: small;"><?= $date1 ?></p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="list3">

          <table>
            <thead>
              <tr>
                <th>Nombre de tickets dinner</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td id="nbr">
                  <p><?= $nbr_diner ?></p>
                  <p style="font-size: small;"><?= $date1 ?></p>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>


    </div>

  </div>
  </div>
</body>

</html>