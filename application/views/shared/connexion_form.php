<!--<link rel="stylesheet" type="text/css" media="screen" href="http://localhost:9090/codentretien/assets/css/global.css"> -->
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: http://localhost:9090/codentretien/login/login_process");
}
?>
<div id="login">
	<div id="error_login">
		<?php
			$message = $this->session->flashdata('error_login');
			echo $message;
		?>
	</div>
	<?php echo form_open('login/login_process'); ?>
     <label for="username">Nom d'utilsateur:</label>
     <input type="text" size="20" id="username" name="username" placeholder="Nom d'utilisateur"/>
     <br/>
     <label for="password">Mot de passe:</label>
     <input type="password" size="20" id="passowrd" name="password" placeholder="Mot de passe">
     <br/>
     <input type="submit" value="Login" name="submit"/>

</div>