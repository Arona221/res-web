<?php
session_start();
require("db/connectdb.php");
require("functions.php");
$p_connect = getConnection();
$p_request = $p_connect->prepare("SELECT *FROM plats where resto=:resto");
$p_request->execute(array("resto" => $_SESSION["admin"]["resto"]));
$r_request = $p_request->fetchAll(PDO::FETCH_ASSOC);
if (isset($_GET["idplatsDel"])) {
    $id_plats = (int) $_GET["idplatsDel"];
    $p_request = $p_connect->prepare("DELETE  FROM plats where id=:resto");
    $p_request->execute(array("resto" => $id_plats));
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
    <script src="script/confirmation.js"></script>
</head>

<body>
    <div class="container-fluid p-0">
        <header class="header">
            <div class="logo">

                <a id="name" href="dasbord.php">LaFourchette</a>

            </div>

            <div class="header-icons">
                <div class="account">
                    <img src="./pic/img.jpg" alt="">
                    <h4><?= $_SESSION["admin"]["login"] ?></h4>
                </div>
            </div>
        </header>
        <div class="container-main">
            <div class="container p-0">
                <nav>
                    <?php require("elements/side_navbar.php") ?>
                </nav>
                <div class="main-body">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th></th>
                            <th>supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($r_request as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value["nom"] ?></td>
                                <td><?= $value["description"] ?></td>
                                <td><?= $value["type"] ?></td>
                                <td><img src="<?= $value["img_url"] ?>" alt="plats description" width="5%"></td>
                                <td> <a href='afficherPlats.php?idplatsDel=<?= $value["id"] ?>' style='color:red;' ;> <i class='fa fa-trash' aria-hidden='true' onclick='return confirmation();'></i> </a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
            
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