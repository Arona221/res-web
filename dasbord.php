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
        <a href="#" id="tab" class="active">Tableau de bord</a>
        
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
          <li><a href="ConsulterList.php">Consulter liste</a></li>
         
        </ul>
      </li>
      </ul>
        <a id="dec" href="index.php"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>



      </div>
    </nav>

    <div class="main-body">
      <h2>Tableau de bord</h2>
      <div class="promo_card">
        <h1>Bienvenu sur la LaFourchette</h1>
        <span>Restaurant  <?=$_SESSION["admin"]["login"]?></span><br><br>
        <p id="satis"> La satisfaction des étudiants est notre crédo</p>
      </div>

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
                <td id="nbr">1</td>


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
                <td id="nbr">2</td>

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
                <td id="nbr">1</td>


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