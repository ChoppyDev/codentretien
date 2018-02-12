<?php
  $username = ($this->session->userdata['logged_in']['username']);
  $email = ($this->session->userdata['logged_in']['email']);
?>

<p> Bonjour <?php echo $username?>  bienvenue sur Manita, votre email est <?php echo $email ?></p>
</br>
<b id="logout"><a href="<?php echo base_url() ?>login/logout">Logout</a></b>
<?php
  $id = ($this->session->userdata['logged_in']['id']);
  if($this->permission->user_as_permission($id, 1))
    echo "<a href=\"".base_url()."administration\"> Administration</a>";
?>
