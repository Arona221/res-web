<?php
session_start();
require_once(__DIR__ . DIRECTORY_SEPARATOR . "db" . DIRECTORY_SEPARATOR . "connectdb.php");
$connectionDB = getConnection();
$p_request = $connectionDB->prepare("SELECT *FROM memu ORDER BY id DESC LIMIT 1");
$p_request->execute();
$r_request =  $p_request->fetchAll(PDO::FETCH_ASSOC);
$id_menu = $r_request[0]["id"];
//
$p1_request  = $connectionDB->prepare("SELECT *FROM nbr_like_menu WHERE id_menu=:id");
$p1_request->execute(["id" => $id_menu]);
$nbr_likes = $p1_request->fetchAll(PDO::FETCH_ASSOC)[0];
//pour le repas du menu corespondant
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
//
if (!empty($r_request)) {
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard </title>
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style/dasbord.css" />
  <link rel="stylesheet" href="style/menu.css" />
  <link rel="stylesheet" href="style/styles.css" />
  <script src="script/confirmation.js"></script>
</head>

<body>
  <div class="container-fluid p-0">
    <div class="row m-0" style="background-color:white;">
      <?php include("elements/top_nav_bar.html") ?>
    </div>
    <div class="row h-100">
      <div class=" col-md-3 p-0">
        <?php include("elements/side_navbar.html") ?>
      </div>
      <div class="col-md-9 p-0">
        <div class="row">
          <div class="col-md-6">
            <div class="card" style="width: 100%;">
              <p class="position-relative"><img class="card-img-top mr-2" src="<?= $repas["img_url"] ?>" style="width: 60%;" alt="Card image cap"></p>
              <div class="card-body">
                <h5 class="card-title">Repas 1</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $repas["nom"] ?></h6>
                <p class="card-text"><?= $repas["description"] ?></p>
              </div>
              <div class="card-footer text-muted">
                <p><?= $nbr_likes["repas"] ?> likes</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card" style="width: 100%;">
              <p class="position-relative"><img class="card-img-top mr-2" src="<?= $repas1["img_url"] ?>" style="width: 60%;" alt="Card image cap"></p>
              <div class="card-body">
                <h5 class="card-title">Repas 2</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $repas1["nom"] ?></h6>
                <p class="card-text"><?= $repas1["description"] ?></p>
              </div>
              <div class="card-footer text-muted">
                <p><?= $nbr_likes["repas1"] ?> likes</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card" style="width: 100%;">
              <p class="position-relative"><img class="card-img-top mr-2" src="<?= $diner["img_url"] ?>" style="width: 60%;" alt="Card image cap"></p>
              <div class="card-body">
                <h5 class="card-title">Diner 1</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $diner["nom"] ?></h6>
                <p class="card-text"><?= $diner["description"] ?></p>
              </div>
              <div class="card-footer text-muted">
                <p><?= $nbr_likes["diner"] ?> likes</p>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card" style="width: 100%;">
              <p class="position-relative"><img class="card-img-top mr-2" src="<?= $diner1["img_url"] ?>" style="width: 60%;" alt="Card image cap"></p>
              <div class="card-body">
                <h5 class="card-title">Diner 2</h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $diner1["nom"] ?></h6>
                <p class="card-text"><?= $diner1["description"] ?></p>
              </div>
              <div class="card-footer text-muted">
                <p><?= $nbr_likes["diner1"] ?> likes</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>

</html>
<style>
  table {
    margin: auto;
    margin-top: 5%;
  }

  #AA {
    width: 49%;
    height: 93%;
    background-color: white;
    border-radius: 5px;
    display: inline-block;
  }

  #AB {
    width: 50%;
    height: 93%;
    background-color: white;
    border-radius: 5px;
    display: inline-block;
    vertical-align: top;
  }

  img {
    margin-top: 5%;
    margin-left: 20%;
  }
</style>