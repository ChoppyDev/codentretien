<link rel="stylesheet" type="text/css" media="screen" href="http://localhost:9090/codentretien/assets/css/global.css">
<div id="login">

	<?php echo form_open('home/login_process'); ?>
     <label for="username">Nom d'utilsateur:</label>
     <input type="text" size="20" id="username" name="username" placeholder="Nom d'utilisateur"/>
     <br/>
     <label for="password">Mot de passe:</label>
     <input type="password" size="20" id="passowrd" name="password" placeholder="**************">
     <br/>
     <input type="submit" value="Login" name="submit"/>

</div>