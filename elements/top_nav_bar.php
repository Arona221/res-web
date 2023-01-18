<?php
require_once "db/connectdb.php";
$id_resto = (int) $_SESSION["admin"]["resto"];
$p_connect  = getConnection();
$p_request = $p_connect->prepare("SELECT img_resto FROM restaurant where id=:resto");
$p_request->execute(array("resto" => $id_resto));
$r_request = $p_request->fetchAll(PDO::FETCH_ASSOC)[0]["img_resto"];

//
$p1_request = $p_connect->prepare("SELECT restaurant.nom FROM restaurant JOIN admin_resto ON restaurant.id=admin_resto.resto where restaurant.id=:resto");
$p1_request->execute(array("resto" => $id_resto));
$nom_resto = $p1_request->fetchAll(PDO::FETCH_ASSOC)[0]["nom"];
?>
<div class="logo">

  <a id="name" href="#">LaFourchette</a>

</div>

<div class="header-icons">

  <div class="account">
    <img src="<?= $r_request ?>" alt="">
    <h4><?= $nom_resto ?></h4>
  </div>
</div>