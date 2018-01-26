<link rel="stylesheet" type="text/css" media="screen" href="http://localhost:9090/codentretien/assets/css/global.css">
<?php 
$username = ($this->session->userdata['logged_in']['username']);
$email = ($this->session->userdata['logged_in']['email']);
$ip = $this->input->id_adress();
echo $ip;
?>
<p> Bonjour <?php echo $username ?>  bienvenue sur Codentretien, votre email est <?php echo $email ?></p>
<br>
<b id="fd"><a href="zizi">Logout</a></b>