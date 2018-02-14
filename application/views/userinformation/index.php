<h1>Vos informations:</h1>

<table style="text-align: left">
	<tr>
		<th>Prénom:</th>
		<th><?php echo $this->infos[0]->user_firstName?></th>
	</tr>
	<tr>
		<th>Nom:</th>
		<th><?php echo $this->infos[0]->user_lastName?></th>
	</tr>
	<tr>
		<th>Adresse mail:</th>
		<th><?php echo $this->infos[0]->user_email?></th>
	</tr>
	<tr>
		<th>Date de Naissance:</th>
		<th><?php echo $this->infos[0]->user_birthday?></th>
	</tr>
	<tr>
		<th>Numéro de télephone:</th>
		<th><?php echo $this->infos[0]->user_numberPhone?></th>
	</tr>
	<tr>
		<th>Date de création du compte:</th>
		<th><?php echo $this->infos[0]->user_createdOn?></th>
	</tr>



</table>
