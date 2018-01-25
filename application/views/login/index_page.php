<link rel="stylesheet" type="text/css" media="screen" href="http://localhost:9090/codentretien/assets/css/global.css">
<?php 
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
?>
<p> Bonjour <?php echo $username ?>  bienvenue sur Codentretien, votre email est <?php echo $email ?></p>
<br>
<b id="logout"><a href="logout">Logout</a></b>