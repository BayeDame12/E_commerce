<?php

// SECURITE CONTROLLEUR GERE TOUT CE QUI EST RELATIVE A LA CONNEXION ET A LA DECONEXION
/**il se base sur la methode utilise pour faire le traitement
* Traitement des Requetes
POST
//quand l utilisateur a soumis le formulaire et nous nous devons faire le traitement on utilise ceci
*/
require_once(PATH_SRC."models".DIRECTORY_SEPARATOR."user.model.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
   if (isset($_POST['action'])){
     if($_POST['action']=="connexion"){   
      $login=$_POST['email'];
      $password=$_POST['password']; 
      connexion($login,$password);
      
     }
     else if($_POST['action']=="inscription"){ 
      
      $Prenom= segue($_POST['username']);
      $Nom = segue($_POST['name']);
      $Telephone = segue($_POST['Telephone']);
      $Ville = segue($_POST['ville']);
      $Quartier = segue($_POST['Quartier']);
      $Ampilie = segue($_POST['Ampilie']);

      /*============DEBUT===============CONNEXION ET INSERTION DES DONNE A LA BASE DE DONNEEE==============DEBUT====================*/

     $servername = '127.0.0.1';
     $dbname = 'RESEAUX_BASE_DE_DONNEE';
     $username = 'root';
     $password = '';
     
     //On essaie de se connecter
     try{
         $conn = new PDO("mysql:host=$servername;dbname=RESEAUX_BASE_DE_DONNEE", $username, $password);
         //On définit le mode d'erreur de PDO sur Exception
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
     }

     catch(PDOException $e){
       echo "Erreur : " . $e->getMessage();
     }
if (isset($_POST['valider'])) {

$sql =$conn->prepare("INSERT INTO clents(Prenom,Nom,Telephone,Ville,Quartier,Ampilie) VALUES(?,?,?,?,?,?)");
$sql->execute(array($Prenom,$Nom,$Telephone,$Ville,$Quartier,$Ampilie));

echo"LES DONNE ONT ETE BIEN ENVOYER A LA BASE DE DONNNEES";

}
      /*==============FIN=============CONNEXION ET INSERTION DES DONNE A LA BASE DE DONNEEE=============FIN=====================*/






     
     }

    }
}

if($_SERVER['REQUEST_METHOD']=="GET"){
  
      switch($_REQUEST['action']){
      case "connexion": require_once(PATH_TEMPLATES."securite/connexion.html.php"); 
      case "deconnexion": require_once(PATH_TEMPLATES."securite/connexion.html.php");
      case "inscription": require_once(PATH_TEMPLATES."securite/connexion.html.php");
      default: 
  require_once(PATH_TEMPLATES."securite/connexion.html.php"); 
    }
 }
 function connexion(string $login,string $password):void {
  $errors=[];
  champ_obligatoire('login',$login,$errors,"login obligatoire");
  if(count($errors)==0){
    valid_email('login',$login,$errors);
  }
  champ_obligatoire('password',$password,$errors);
  if(count($errors)==0){
      // appel d une fonction du models  
      $user=find_user_login_password($login,$password);

      // utilisateur existe
      if(count($user)!=0){
        $_SESSION[KEY_USER_CONNECT]=$user;
        header("location:".PATH_POST."?controlleurs=user&action=accueil");
      
      }
      // utilisateur n'existe pas
      
      else{
        $errors['connexion']="Login ou mot de passe incorrecte";
        $_SESSION[KEY_ERRORS]=$errors; 
        header("location:".PATH_POST);
      
      }
  }
  else{
      //erreur de validation
      $_SESSION[KEY_ERRORS]=$errors;
      header("location:".PATH_POST);

  }
 }
 //*===================FONCTIONS DE DECONNEXION==================================
 function deconnexion(){
    session_destroy();
    session_unset();
    header("location:".PATH_POST);
    
 }
 //*===================FONCTIONS ENREGISTRER CLIENTS==================================
//  function enregistUser($tableau){
//   $errors=[];
//   champ_obligatoire('nom',$tableau['nom'],$errors,"Nom obligatoire");
//   champ_obligatoire('prenom',$tableau['prenom'],$errors,"Prenom obligatoire");
//   champ_obligatoire('Telephone',$tableau['Telephone'],$errors,"Le numero de Telephone obligatoire");
//   champ_obligatoire('ville',$tableau['ville'],$errors,"Le nom de la ville obligatoire");
  
//   test_existance_logins($tableau['email'],$errors,'email',);
  
//   if(count($errors)==0){
//     recupere_infos($tab);
//     array_to_json("users",$tab);
    
//   }else{
//     $_SESSION[KEY_ERRORS]=$errors; 
//     if(!is_connect()){
//       header("Location:".PATH_POST."?controlleurs=securite&action=inscription");        
//     }
//     if(is_admin()){ 
//       header("Location:".PATH_POST."?controlleurs=user&action=ajouter");        
//     }
//   }
// }
 //*======FONCTIONS QUI FILTRE LES DONNEE ENTRE PAR L UTILISATEUR LORS DE LINSCRIPTION================

 function segue(&$inputIns){
  return strip_tags(trim($inputIns));
 }
     //*======FONCTIONS QUI RECUPERE NON DONNEE DE L INSCRIPTIONS====================
function recupere_infos(&$tab){
  $tab['nom'] = segue($_POST['name']);
  $tab['prenom'] = segue($_POST['username']);
  $tab['Telephone'] = segue($_POST['Telephone']);
  $tab['ville'] = segue($_POST['ville']);
 }


     //*======FONCTIONS QUI TESTE L EXISTANCE D UN LOGIN DUNE PERSONNE DANS MA BASE DE DONNEE=============

     function test_existance_logins($login,&$errors,$key,$message="login existe"){
      if(existe_login($login)){
        
        $errors[$key]=$message;

      }
    }