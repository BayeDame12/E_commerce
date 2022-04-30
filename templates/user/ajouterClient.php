<?php
	  if (isset($_SESSION[KEY_ERRORS])){
        $errors=$_SESSION[KEY_ERRORS];
        unset($_SESSION[KEY_ERRORS]);
    }
?>
<div id="aly">
 
	<form id="form" class="form" method="POST" enctype="multipart/form-data" novalidate action="<?=PATH_POST?>">
     
		<input type="hidden" name="controlleurs" value="securite">
		<input type="hidden" name="action" value="inscription">

        
        <h1 id="ENREGISTREMENT">ENREGISTREMENT D'UN NOUVELLE CLIENT</h1>
		<div class="first">
		<div class="form-control">
			<label for="name">PRENOM</label>
            <input type="text" placeholder="veiller saisir votre nom" id="name" name="name" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
			
			<?php if (isset($errors['nom'])):?> 
				<p style="color:red"  > <?=$errors['nom'];?></p>
				<?php endif?>
				
			</div>
			<div class="form-control">
				<label for="username">NOM</label>
				<input type="text" placeholder="veiller saisir votre prenom" id="username" name="username" />
			<i class="fas fa-check-circle"></i>
			<i class="fas fa-exclamation-circle"></i>
	
			<?php if (isset($errors['prenom'])):?> 
				<p style="color:red"  ><?=$errors['prenom'];?></p>
			<?php endif?>
	
			</div>
		</div>
		<div class="first">
		<div class="form-control">
            <label for="Telephone">Telephone</label>
            <input type="text" placeholder="veiller saisir votre numero telephone" id="Telephone" name="Telephone" />
		<i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>

		<?php if (isset($errors['Telephone'])):?> 
            <p style="color:red"  > <?=$errors['Telephone'];?></p>
        <?php endif?>

		</div>

		<div class="form-control">
		<label for="ville">Ville</label>
            <select name="ville" class="selectopt">
				<option>MBORO</option>
				<option>TAIBA-MBAYE</option>
				<option>NDOMOR</option>
			</select>
			
		</div>
	</div>
	
	<div class="first">
	<div class="form-control">
            <label for="Quartier">Quartier</label>
            <input type="text" placeholder="veiller saisir Nom Quartier" id="Quartier" name="Quartier" />
		<i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>

		<?php if (isset($errors['Quartier'])):?> 
            <p style="color:red"  > <?=$errors['Quartier'];?></p>
        <?php endif?>

		</div>
		<div class="form-control">
            <label for="Ampilie">Ampilie</label>
            <input type="text" placeholder="veiller saisir Nom Ampilie Ampilie" id="Ampilie" name="Ampilie" />
		<i class="fas fa-check-circle"></i>
		<i class="fas fa-exclamation-circle"></i>

		<?php if (isset($errors['Ampilie'])):?> 
            <p style="color:red"  > <?=$errors['Ampilie'];?></p>
        <?php endif?>

		</div>
	</div>
	
	<div class="first">
		<button id="btnincriptions" name="valider">Valider</button>

	</div>
		

	</form>
	<div id="wane">
		<label for="file" >
			<img id="imgup" class="avatar"  src="<?=PATH_POST."images".DIRECTORY_SEPARATOR."avatar.jpg"?>" alt="">

		</label>
	</div>
</div>


