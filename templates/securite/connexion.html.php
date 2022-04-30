
    <?php
    require_once(PATH_TEMPLATES."include/header.html.php"); 
    if (isset($_SESSION[KEY_ERRORS])){
        $errors=$_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
   
    ?> 
            <!-- zone de connexion -->
           <div class="formControl">
           <form class="form-horizontal" id="form1" action="<?=PATH_POST?>" method="POST">
                <input type="hidden" name="controlleurs" value="securite">
                <input type="hidden" name="action" value="connexion">
              <span class="spanh1">CONNEXION</span>

               <div class="div-form-login">
                 <label for="login">Login</label>
                 <input type="text" name="email" id="email"   placeholder="Veiller Entrer votre login " class="input-login"  >
                 <small class="sapnerreurmesslogin"></small>
               </div>

               <div class="div-form-password">
                 <label for="password">Mot de passe</label>
                 <input type="password" name="password" id="password" placeholder="veiller saisir votre mode passe" class="input-login" >
                 <small class="sapnerreurmesspass"></small>

               </div>
                <div class="btn-group">
                <button id="btn" type="submit">Connexion</button>

                </div>
        </form>
           </div>
      
    <?php
            require_once(PATH_TEMPLATES."include/footer.html.php"); 
   ?> 
   