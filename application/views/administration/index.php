
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/jquery.jqGrid.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/grid.locale-fr.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dialog_form.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/userTable.js"></script>






<button id="create-user">Créer un nouvel utilisateur</button>
<table id= "userTable"></table>
<div id="gridpager"></div>
<div id="form_container" hidden>
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
            <div class="control-group">
                <label class="control control-radio">
                    Masculin
                        <input type="radio" id="gender1" value="1" name="gender" checked="checked" />
                    <div class="control_indicator"></div>
                </label>
                <label class="control control-radio">
                    Féminin
                        <input type="radio" id="gender2" value="2" name="gender" />
                    <div class="control_indicator"></div>
                </label>
                <label class="control control-radio">
                    Autre
                        <input type="radio" id="gender3" value="3" name="gender" />
                    <div class="control_indicator"></div>
                </label>
            </div>
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
      });
  </script>
</div>

 <div id="edit_form" hidden>
      <table style="text-align: left">
          <tr>
            <th>Prénom:</th>
            <th><p id="info_firstName">Chargement...</p></th>
          </tr>
          <tr>
            <th>Nom:</th>
            <th><p id="info_lastName">Chargement...</p></th>
          </tr>
          <tr>
            <th>Adresse mail:</th>
            <th><p id="info_email">Chargement...</p></th>
          </tr>
          <tr>
            <th>Date de Naissance:</th>
            <th><p id="info_birthday">Chargement...</p></th>
          </tr>
          <tr>
            <th>Numéro de télephone:</th>
            <th><p id="info_numberphone">Chargement...</p></th>
          </tr>
          <tr>
            <th>Date de création du compte:</th>
            <th><p id="info_createdOn">Chargement...</p></th>
          </tr>
      </table>
      <label for="edit_groupList">Groupe:</label>
      <select id="edit_groupList">
          <?php for($i = 0; $i < count($this->groups); $i++){ ?>
              <option value="<?php echo $this->groups[$i]->idGroup?>"><?php echo $this->groups[$i]->labelGroup ?> </option>
          <?php } ?>
      </select>
    </div>
