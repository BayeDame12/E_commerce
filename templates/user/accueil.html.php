
    <?php
            require_once(PATH_TEMPLATES."include/header.html.php"); 
            $action = '';
            if (isset($_GET['action'])) {
               $action = $_GET['action'];
               $action1 = $_GET['action'];
               $action2 = $_GET['action'];
               $action3 = $_GET['action'];
            }
    ?>           
<div class="container">
       <div class="header">
        <h1 id="h1-heade">GESTION CLIENTS ET PAYMENT</h1>
        <a href="<?=PATH_POST.'?controlleurs=securite&action=deconnexion'?>" class="Deconnexion">Deconnexion</a>
       </div>

       <div class="main">
            <div class="main-gauche">
              <a href="<?=PATH_POST."?controlleurs=user&action=ajouter"?>">
                  <div class="ajouter">
                      <img src="" alt="">
                      <span class="spanmaingauche"> Ajouter Nouveau Client</span>
                  </div>
              </a>
              
              <a href="<?=PATH_POST."?controlleurs=user&action=lister"?>">
                  <div class="listerClient">
                      <img src="" alt="">
                      <span class="spanmaingauche"> Lister Client</span>
                  </div>
              </a>
            </div>
            <div class="main-droite">
<?=$page?>
                
            </div>
       </div>
<?php require_once(PATH_TEMPLATES."include/footer.html.php"); ?> 