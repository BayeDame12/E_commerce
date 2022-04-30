<?php
	  if (isset($_SESSION[KEY_ERRORS])){
        $errors=$_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>


<div class="listerClasssContener">
    <div class="listerClasssHead"> 

        <div class="listerClasshead1">
            <span class="Membres">Membres</span>

            <div class="listerClassMembeNumber">
            <span class="NombreClientsTotal">Nombre de Clients Total:</span>
            <span class="valeurMenbr">267839</span>
            </div>
            
        </div>


        <div class="listerClasshead2">
            <input type="text" class="inputlisterclasshead" placeholder="Veiller Saisir du text pour rechercher" name="recherche">
            <span class="FiltreClients">Filtre Les Clients</span>
        </div>


        </div>
    <div class="listerClassmain"> 


    
   

    </div>

</div>


