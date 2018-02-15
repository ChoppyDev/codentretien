
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/jquery.jqGrid.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dialog_form.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/userTable.js"></script>




 

<button id="create-user">Créer un nouvel utilisateur</button>
<table id= "userTable"></table>
<div id="pager2"> </div>
<div id="form_container">
  <h1 id="form_title">ajouter un utilisateur</h1>
  <p class="validateTips">Tous les champs sont requis</p>
  	<form>
        <div class="form_bigitem_left">
          <div class="form_item_left">
    	      <label for="Username">Nom d'utilisteur</label>
    	      <input class="form_text_normal_style" type="text" name="Username" id="username">
          </div>
            <div class="form_item_left">
      			<label for="Password">Mot de passe</label>
      			<input class="form_text_normal_style" type="password" name="Password" id="password">
          </div>
          <div class="form_item_left">
      			<label for="Password_confirmation">Confirmation de mot de passe</label>
      			<input class="form_text_normal_style" type="password" name="Password_confirmation" id="password_confirmation">
          </div>
          <div class="form_item_left">
      			<label for="email">Adresse e-mail</label>
      			<input class="form_text_normal_style" type="text" name="email" id="email">
          </div>
        </div>
        <div class="bar_horizontal"></div>
        <div class="form_bigitem_left">
          <div class="form_item_left">
      			<label for="datepicker">Date de Naissance (AAAA-MM-JJ) </label>
      			<input class="form_text_normal_style" type="text" id="datepicker">
          </div>
          <div class="form_item_left">
      			<label for="gender">Sexe</label>
      			<br>
      			  <input name="gender" type="radio" id="gender1" value="1"> <?php for($i=0;$i<60;$i++)echo "&nbsp;";?>Masculin	<br>
      	  		<input  name="gender" type="radio" id="gender2" value="2"> <?php for($i=0;$i<60;$i++)echo "&nbsp;";?>Féminin	<br>
      	  		<input  name="gender" type="radio" id="gender3" value="3"> <?php for($i=0;$i<60;$i++)echo "&nbsp;";?>Autre
            </div>
            <div class="form_item_left">
      	  		<label for="numberPhone">Numéro de Téléphone</label>
      	  		<input class="form_text_normal_style" type="text" name="numberPhone" id="numberPhone">
            </div>
            <div class="form_item_left">
      	  		<label for="firstName">Prénom</label>
      	  		<input class="form_text_normal_style" type="firsName" name="numberPhone" id="firstName">
            </div>
            <div class="form_item_left">
      	  		<label for="lastName">Nom</label>
      	  		<input class="form_text_normal_style" type="text" name="lastName" id="lastName">
            </div>
          </div>
          <div class="bar_horizontal"></div>
          <div class="form_bigitem_left">
          <div class="form_item_left">
    	  		<label for="groupList">Groupe</label>
    	  		<select id="groupList">
    	  		<?php for($i = 0; $i < count($this->groups); $i++){ ?>
    	  				<option value="<?php echo $this->groups[$i]->idGroup?>"><?php echo $this->groups[$i]->labelGroup ?> </option>
    	  		<?php } ?>
    	  		</select>
          </div>
        </div>
  	</form>
  <!-- Date Picker-->
  <script>
    $( function() {
        $( "#datepicker" ).datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-mm-dd',
          yearRange: "c-100:c",
          monthNames: ["Janvier", "Février", "Mars", "Avril", 'Mai', "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
          monthNamesShort:["Janvier", "Février", "Mars", "Avril", 'Mai', "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre"],
          dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ]
        });
      } );
  </script>

</div>

