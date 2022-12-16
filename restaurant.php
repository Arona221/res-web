<?php
     session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <link rel ="stylesheet" href="decoration.css"/>
        <title>
           page gérant 
        </title>
    </head>
   
    <body>
        <p>
            
        </p>
        <form method="POST" action="verifAuthent.php" enctype="multipart/form-data">
    <div class="decor">
            <img src="../avatar.png" /><br/>

      <input type="text" name="user" placeholder="Nom du restaurant" require
        <?php
                if(isset($_COOKIE['login']))
                     echo "value= '".$_COOKIE['login']."'";
        ?>
      /> <br/>
      
         <input type="password" name="pwd" placeholder="Mot de passe" require/><br/>
       <button type="submit"> CONNEXION</button>
      
    </div>
    <?php   if(!empty($message)) {?>
                    <p class="messageEurreur">  <?php echo $message ; ?>
                   </p>
                   <?php }?>
    </form>

    </body>
</html>
<style>
button:hover
  {
    background-color: black;
    color:whitesmoke;
  }
  
  </style>