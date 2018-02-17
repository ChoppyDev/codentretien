<p class='validateTips'></p>
<h1> Editer vos informations</h1>
<script type='text/javascript' src="<?php echo base_url() ?>assets/js/editUser.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />

<label for="edit-username">Nom d'utilisateur: </label>
<input type="text" id ="edit-username" disabled />
<br>
<label for="edit-oldPassword">Ancien mot de passe: </label>
<input type="password" id ="edit-oldPassword" disabled />
<br>
<label for="edit-newPassword">Nouveau mot de passe: </label>
<input type="password" id ="edit-newPassword" disabled />
<br>
<label for="edit-newPasswordConfirmation">Confirmation du nouveau mot de passe: </label>
<input type="password" id ="edit-newPasswordConfirmation" disabled />
<br>
<label for="edit-firstName">Prénom: </label>
<input type="text" id ="edit-firstName" disabled />
<br>
<label for="edit-lastName">Nom: </label>
<input type="text" id ="edit-lastName" disabled />
<br>
<label for="edit-email">Adresse e-mail: </label>
<input type="text" id ="edit-email" disabled />
<br>
<label for="edit-numberphone">Numero de téléphone: </label>
<input type="text" id ="edit-numberphone" disabled />

<p>Compte créé le:</p>
<p id="createdOn"></p>


<button id="edit-button" >Editer</button>
<button id="edit-save" >Sauvegarder</button>