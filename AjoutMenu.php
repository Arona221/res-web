<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Ajout menu</title>
  <link rel="stylesheet" href="dasbord.css" />
  
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>
<body>
  <header class="header">
    <div class="logo">
        
      <a  id="name" href="#">LaFourchette</a>
     
    </div>

    <div class="header-icons">
     
      <div class="account">
        <img src="./pic/img.jpg" alt="">
        <h4>Argentin</h4>
      </div>
    </div>
  </header>
  <div class="container">
    <nav>
   
      <div class="side_navbar">
     
       
       <p> <img src="logoapp.png" alt=""></p>
        <a href="./dasbord.php" id="tab" class="active">Tableau de bord</a>
        <a href="#">Ajouter le menu du jour</a>
        <a href="#">Gerer les controleurs</a>
        <a id="dec" href="#"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>
       

      
      </div>
    </nav>

    <div class="main-body">
     


    <form method="POST" action="" enctype="multipart/form-data">
    <div class="decor">
       <p> 
      <label>Libellé</label>
      <input type="text" name="nomPlat"  require/> <br/>
      </p>  
      <p>
        <label for="">image</label>
        <input type="file">
      </p>
      <p>
      <label for="">Description</label>
      <textarea name="description" id="" cols="2" rows="2"></textarea><br>
      </p>
      <p id="A"> Menu</p>
      <p>
      <label>Date  </label>
      <input type="date"><br>
      </p>
      <p id="A"> Repas</p>
      <p>
        <label for="">Plat 1</label>
        <select name="nomPlat" id="">
          <option value="yassa">yassa</option>
          <option value="thiebouDjeune"> Thiebou Dieune</option>
        </select>
      </p>
      <p>
        <label for="">Plat 2</label>
        <select name="nomPlat" id="">
          <option value="thiere">Thiéré basse</option>
          <option value="vermiselle"> vermiselle</option>
        </select>
      </p>
      <p id="A"> Dinner</p>
      <p>
        <label for="">Plat 1</label>
        <select name="nomPlat" id="">
          <option value="yassa">yassa</option>
          <option value="thiebouDjeune"> Thiebou Dieune</option>
        </select>
      </p>
      <p>
        <label for="">Plat 2</label>
        <select name="nomPlat" id="">
          <option value="yassa">Thiebou Dieune</option>
          <option value="thiebouDjeune"> yassa</option>
        </select>
      </p>
        
       <button type="submit">Ajouter</button>
      
    </div>
   

  </div>
</body>
</html>


<style>
 
.decor
{
    background-color: #ffffff;
    width: 70%;
    height: auto;
    margin: auto;
    text-align: center;
    padding-top: 2%;
   
   
}

.decor input ,textarea,select
{
    width: 50%;
    height: auto;
    font-size: 10px;
    margin: 10px 0px;
    padding: 6px 6px ;
    box-sizing: border-box;
    background-color: #f2f2f2;
    border: 2px solid #cccccc;
    border-radius: 5px;
    text-align: center;
}
.decor button
{
    width: 50%;
    height: auto;
    font-size: 20px;
    margin-top: 4%;
    margin-bottom: 2%;
    margin-left: 10%;
    box-sizing: border-box;
    background-color:#FA4A0C;
    border: none;
    color: #ffffff;
    border-radius: 5px;
}
#A
{
  font-weight: bold;
  color:#FA4A0C;
}



</style>

