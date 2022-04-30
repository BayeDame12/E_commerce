<?php
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");

   if($_SERVER['REQUEST_METHOD']=="POST"){
       if(isset($_POST['action'])){
           echo"quand l util";
       }
   }
       /**
       * Traitement des Requetes GET
       * quand utilisateur a cliquer sur un lien et nous devons lui charger la page de connexion
       */
      if($_SERVER['REQUEST_METHOD']=="GET"){
           if(isset($_GET['action'])){
              
                   if($_GET['action']=="accueil"){       
                    if(is_admin())
                        require_once(PATH_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");
                    }  
                    else if($_GET['action']=="ajouter"){       
                        
                        ajouter_client();
                    }
                    
                    else if($_GET['action']=="lister"){       
                    }
                        lister_client();
                         
                     }
                         else{
                            header("Location:".PATH_POST);
                    
                        }        
            }
            else{
                header("Location:".PATH_POST);
            
            }  
          

     // FONCTION QUI PERMET D AJOUTER UN CLIENT 
    function ajouter_client():void{ 
        ob_start(); 
        $data=find_users(ADMIN);
        require_once(PATH_TEMPLATES."user".DIRECTORY_SEPARATOR."ajouterClient.php");
        $page = ob_get_clean();
        require_once(PATH_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");  
    }
     // FONCTION QUI PERMET DE LISTER UN CLIENT 
    function lister_client():void{ 
        ob_start(); 
        // $data=find_users(JOUEUR);
        require_once(PATH_TEMPLATES."user".DIRECTORY_SEPARATOR."listerClient.user.php");
        $page = ob_get_clean();
        require_once(PATH_TEMPLATES."user".DIRECTORY_SEPARATOR."accueil.html.php");  
    }
