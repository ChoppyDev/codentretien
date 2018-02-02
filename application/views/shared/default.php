<!DOCTYPE html>
<html>
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset= <?php echo $charset; ?>"/>
		<!-- Style import -->
		<?php foreach ($css as $url): ?>
				<link rel="stylesheet" type="text/css" media="screen" href='<?php echo $url ?>'/>
		<?php endforeach; ?>
		<!--<link rel="stylesheet" type="text/css" media="screen" href="http://localhost:9090/codentretien/assets/css/global.css"> -->

		<!-- Js import-->
		<?php foreach ($js as $url):?>
				<script type="text/javascript" src="<?php echo $url; ?>"></script>
		<?php endforeach ?>

      <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url()?>/assets/css/style.css">
      <title><?php echo $titre; ?></title>
	 	 <noscript>
			<div id="noscript"> Cette page requiert l'activation de Javascript </div>
		</noscript>
    </head>

    <body>

        <header>
          <div id ="titre">
            <img class="image" src="<?php echo base_url()?>/assets/images/gestion-administration.png" alt="logo">
          </div>
        </header>
<?php if(isset($this->session->userdata['logged_in'])){ ?>
        <div id="bordure">
          <div id="menu">
            <a href="home"><div class="onglets"><p>ACCUEIL</p></div></a>
            <a href="#"><div class="onglets"><p>GESTION BILLETS</p></div></a>
            <a href="#"><div class="onglets"><p>GESTION DES AGENTS</p></div></a>
            <a href="<?php echo base_url()?>administration"><div class="onglets"><p>GESTION UTILISATEURS</p></div></a>
            <a href="#"><div class="onglets"><p>HISTORIQUE</p></div></a>
            <a href="#"><div class="onglets"><p>PARAMETRES</p></div></a>
            <a href="#"><div class="onglets"><p>AIDE</p></div></a>
          </div>
        </div> 
        
	        <div id="information">
	          <div id="left">
	            <img id="profil" src="<?php echo base_url()?>/assets/images/profile_picture.png" alt="login">
	          </div>
	          <div id="top-right">
	            <p><?php echo $this->session->userdata['logged_in']['firstname']?> <?php echo $this->session->userdata['logged_in']['lastname']." "; ?></p>
	          </div>
	          <div id="bot-right">
	            <a href="<?php echo base_url()?>login/logout"><p>Déconnexion</p></a>
	          </div>
	        </div>
  		<?php }?>
        <div id="content">
			<?php echo $output;?>	
		</div>
       <div id="copyright">
         <p>Copyright</p>
       </div>


       <canvas id = "canvas" width="600" height="600">
         <p>Veuillez activer le javaScript sur votre navigateur</p>
       </canvas>