<?php
	if (isset($this->session->userdata['logged_in']))
		header("location:".base_url()."login/login_process");
?>
<div id="login">
	<div id="error_login">
		<?php
			$message = $this->session->flashdata('error_login');
			echo $message;
		?>
	</div>
	<div id="form_container">
		<h1 id="form_title">Authentification</h1>
		<?php echo form_open('login/login_process'); ?>
			<div class="form_item">
				<input class="form_text_normal_style" type="text" size="30" id="username" name="username" placeholder="Nom d'utilisateur"/>
			</div>
			<div class="form_item">
				<input class="form_text_normal_style" type="password" size="30" id="password" name="password" placeholder="Mot de passe">
			</div>
			</br></br></br>
			<div id="form_submit">
				<input id="form_submit" class="form_button_big_style" type="submit" value="Connexion" name="submit"/>
			</div>
		<!-- Form close -->
	</div>
</div>
