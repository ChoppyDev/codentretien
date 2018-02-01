<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>assets/js/jqgrid/css/jquery-ui.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/jquery.jqGrid.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js" ></script>
<!--<script type="text/javascript" src="<?php echo base_url() ?>assets/js/userTable.js"></script>-->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dialog_form.js"></script>

 <script>
	$( function() {
	    $( "#datepicker" ).datepicker({
	      changeMonth: true,
	      changeYear: true,
	      dateFormat: 'yy-mm-dd'
	    });
	  } );
  </script>

<!--<table id="userTable"></table> -->
<button id="create-user">Créer un nouvel utilisateur</button>
<div id="list2"> </div>
<div id="newUserForm">
<p class="validateTips">Tous les champs sont requis</p>
	<form>
		<fieldset>
			<label for="Username">Nom d'utilisteur:</label>
			<input type="text" name="Username" id="username">
			<br>
			<label for="Password">Mot de passe:</label>
			<input type="password" name="Password" id="password">
			<br>
			<label for="Password_confirmation">Confirmation de mot de passe:</label>
			<input type="password" name="Password_confirmation" id="password_confirmation">
			<br>
			<label for="email">Adresse e-mail:</label>
			<input type="text" name="email" id="email">
			<br>
			<label for="datepicker">Date de Naissance(AAAA-MM-JJ): </label>
			<input type="text" id="datepicker">
			<br>
			<label for="gender"> Sexe:</label>
			<br>
			<input name="gender" type="radio" id="gender1" value="1"> Masculin	<br>
	  		<input  name="gender" type="radio" id="gender2" value="2"> Féminin	<br>
	  		<input  name="gender" type="radio" id="gender3" value="3"> Autre
	  		<br>
	  		<label for="numberPhone">Numéro de Téléphone:</label>
	  		<input type="text" name="numberPhone" id="numberPhone">
	  		<br>
	  		<label for="firstName">Prénom:</label>
	  		<input type="firsName" name="numberPhone" id="firstName">
	  		<br>
	  		<label for="lastName">Nom:</label>
	  		<input type="text" name="lastName" id="lastName">
	  		<br>
	  		<label for="groupList">Groupe:</label>
	  		<select id="groupList">
	  		<?php for($i = 0; $i < count($this->groups); $i++){ ?>
	  				<option value="<?php echo $this->groups[$i]->idGroup?>"><?php echo $this->groups[$i]->labelGroup ?> </option>
	  		<?php } ?>
	  		</select>

		</fieldset>

	</form>
</div>