<p class='validateTips'></p>
<script type='text/javascript' src="<?php echo base_url() ?>assets/js/editUser.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<div id="form_container_2">
	<h1 id="form_title">Editer vos informations</h1>
  <div class="form_bigitem_left">
    <div class="form_item_left">
      <label for="edit-username">Nom d'utilisateur: </label>
      <input type="text" id ="edit-username" disabled />
    </div>
    <div class="form_item_left">
      <label for="edit-newPassword">Nouveau mot de passe* : </label>
      <input type="password" id ="edit-newPassword" disabled />
    </div>
    <div class="form_item_left">
      <label for="edit-newPasswordConfirmation">Confirmation du nouveau mot de passe: </label>
      <input type="password" id ="edit-newPasswordConfirmation" disabled />
    </div>
  </div>
  <div class="bar_horizontal"></div>
  <div class="form_bigitem_left">
    <div class="form_item_left">
      <label for="edit-firstName">Prénom: </label>
      <input type="text" id ="edit-firstName" disabled />
    </div>
    <div class="form_item_left">
      <label for="edit-lastName">Nom: </label>
      <input type="text" id ="edit-lastName" disabled />
    </div>
    <div class="form_item_left">
      <label for="edit-email">Adresse e-mail: </label>
      <input type="text" id ="edit-email" disabled />
    </div>
    <div class="form_item_left">
      <label for="edit-numberphone">Numero de téléphone: </label>
      <input type="text" id ="edit-numberphone" disabled />
    </div>
  </div>
  <p>Compte créé le:</p><p id="createdOn"></p>

  <p>* laisser vide si vous ne voulez pas modifier le mot de passe</p>

  <button id="edit-button" class="form_button_small_style">Editer</button>
  <button id="edit-save" class="form_button_normal_style">Sauvegarder</button><!--submit-->
</div>
