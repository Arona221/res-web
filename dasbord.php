<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard </title>
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
        <a href="#" id="tab" class="active">Tableau de bord</a>
        <a href="./AjoutMenu.php">Ajouter le menu du jour</a>
        <a href="#">Gerer les controleurs</a>
        <a id="dec" href="#"><i class="fa-solid fa-right-to-bracket"></i> Déconnexion</a>
       

      
      </div>
    </nav>

    <div class="main-body">
      <h2>Tableau de bord</h2>
      <div class="promo_card">
        <h1>Bienvenu sur la  LaFourchette</h1>
        <span>Restaurant Argentin</span><br><br>
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
                <td  id="nbr">1</td>
                
                
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
               <td  id="nbr">1</td>
               
               
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

