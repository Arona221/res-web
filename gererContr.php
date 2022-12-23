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
          <li><a href="./AjoutPlat.php">Ajouter un plat</a></li>
         
        </ul>
      </li>
      </ul>
        <a id ='det'href="#">Detail menu</a>
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
    <p id="A"> Ajouter un controleur</p><br>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="decor">
          <p>
            <label>Nom</label><br>
            <input type="text" name="nameCon" require /> <br />
          </p>
          <p>
            <label>Prenom</label><br>
            <input type="text" name="PenomCont" require /> <br />
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
    padding-top: 5%;


  }

  .decor input
   {
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
    margin-top: 4%;
    margin-bottom: 8%;
    
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