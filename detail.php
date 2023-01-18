<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connectdb.php");
$connectionDB = getConnection();
$p_request = $connectionDB->prepare("SELECT *FROM memu ORDER BY id DESC LIMIT 1");
$p_request->execute();
$r_request =  $p_request->fetchAll(PDO::FETCH_ASSOC);
$id_menu = (int)$r_request[0]["id"];
$date = $r_request[0]["dateMenu"];
//
$p1_request  = $connectionDB->prepare("SELECT *FROM nbr_like_menu WHERE id_menu=:id");
$p1_request->execute(["id" => $id_menu]);
$r1_request = $p1_request->fetchAll(PDO::FETCH_ASSOC);
if (empty($r1_request)) {
  $nbr_likes = null;
} else {
  $nbr_likes = $r1_request[0];
}
$p_requet_repas  = $connectionDB->prepare("SELECT 		
  plats.nom	,
  plats.description	,
  plats.img_url,
  plats.resto	,
  plats.type FROM memu JOIN plats ON memu.repas=plats.id WHERE memu.id=:id_menu");
$p_requet_repas->execute(["id_menu" => $id_menu]);
$repas = $p_requet_repas->fetchAll(PDO::FETCH_ASSOC)[0];
//pour le repas1 du memu correspondant
$p_requet_repas1  = $connectionDB->prepare("SELECT 		
  plats.nom	,
  plats.description	,
  plats.img_url,
  plats.resto	,
  plats.type FROM memu JOIN plats ON memu.repas1=plats.id WHERE memu.id=:id_menu");
$p_requet_repas1->execute(["id_menu" => $id_menu]);
$repas1 = $p_requet_repas1->fetchAll(PDO::FETCH_ASSOC)[0];
//pour le diner du menu correscpondant
$p_requet_diner  = $connectionDB->prepare("SELECT 		
  plats.nom	,
  plats.description	,
  plats.img_url,
  plats.resto	,
  plats.type FROM memu JOIN plats ON memu.diner=plats.id WHERE memu.id=:id_menu");
$p_requet_diner->execute(["id_menu" => $id_menu]);
$diner = $p_requet_diner->fetchAll(PDO::FETCH_ASSOC)[0];
//pour le diner1 du correspondant
$p_requet_diner1  = $connectionDB->prepare("SELECT 		
  plats.nom	,
  plats.description	,
  plats.img_url,
  plats.resto	,
  plats.type FROM memu JOIN plats ON memu.diner1=plats.id WHERE memu.id=:id_menu");
$p_requet_diner1->execute(["id_menu" => $id_menu]);
$diner1 = $p_requet_diner1->fetchAll(PDO::FETCH_ASSOC)[0];

//pour le repas du menu corespondant
//


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
        <h4><?= $_SESSION["admin"]["login"] ?></h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
      <?php require("elements/side_navbar.php") ?>
    </nav>
    <div class="main-body">
      <h2 style="text-align: center; color:#FA4A0C;">Menu du <?php echo "$date" ?> </h2>
      <div id="AA">
        <h3 style="text-align: center; color:#FA4A0C; margin-bottom:2%"> Repas</h3>
        <p> <img src="<?= $repas["img_url"] ?>" alt=""></p><br>
        <p style="text-align: center; color:#FA4A0C;"><?= $repas["nom"] ?></p>
        <p style="text-align: center;"><?= $repas["description"] ?></p>
        <p style="text-align: center; color:#FA4A0C;"><?= $nbr_likes["repas"] ?: 0 ?> likes</p><br>
        <p style=" background-color:#FA4A0C;width: 100%; margin-bottom:2%">-- </p>
        <p> <img src="<?= $repas1["img_url"] ?>" alt=""></p><br>
        <p style="text-align: center; color:#FA4A0C;"><?= $repas1["nom"] ?></p>
        <p style="text-align: center;"><?= $repas1["description"] ?></p>
        <p style="text-align: center; color:#FA4A0C;"><?= $nbr_likes["repas1"] ?: 0 ?> likes</p>
      </div>
      <div id="AB">
        <h3 style="text-align: center; color:#FA4A0C; margin-bottom:2%"> Dinner</h3>

        <p> <img src="<?= $diner["img_url"] ?>" alt=""></p><br>
        <p style="text-align: center; color:#FA4A0C;"><?= $diner["nom"] ?></p>
        <p style="text-align: center;"><?= $diner["description"] ?></p>
        <p style="text-align: center; color:#FA4A0C;"><?= $nbr_likes["diner"] ?: 0 ?> likes</p><br>
        <p style=" background-color:#FA4A0C;width: 100%; margin-bottom:2%">-- </p>
        <p> <img src="<?= $diner1["img_url"] ?>" alt=""></p><br>
        <p style="text-align: center; color:#FA4A0C;"><?= $diner1["nom"] ?></p>
        <p style="text-align: center;"><?= $diner1["description"] ?></p>
        <p style="text-align: center; color:#FA4A0C;"><?= $nbr_likes["diner1"] ?: 0 ?> likes</p>

      </div>

    </div>
  </div>
  <?php include("elements/footer.html") ?>
</body>

</html>
<style>
  #AA {
    margin-top: 1%;
    width: 49%;
    background-color: white;
    display: inline-block;

  }

  #AB {
    margin-top: 1%;
    width: 50%;
    background-color: white;
    display: inline-block;
    vertical-align: top;
  }

  img {
    margin-left: 25%;
  }
</style>