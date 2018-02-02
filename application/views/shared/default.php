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

      <title>GAR-ES</title>
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

        <div id="bordure">
          <div id="menu">
            <a href="#"><div class="onglets"><p>ACCUEIL</p></div></a>
            <a href="#"><div class="onglets"><p>GESTION BILLET</p></div></a>
            <a href="#"><div class="onglets"><p>GESTION DES AGENTS</p></div></a>
            <a href="#"><div class="onglets"><p>GESTION UTILISATEUR</p></div></a>
            <a href="#"><div class="onglets"><p>HISTORIQUE</p></div></a>
            <a href="#"><div class="onglets"><p>PARAMETRE</p></div></a>
            <a href="#"><div class="onglets"><p>AIDE</p></div></a>
          </div>
        </div>

        <div id="information">
          <div id="left">
            <img id="profil" src="<?php echo base_url()?>/assets/images/profile_picture.png" alt="login">
          </div>
          <div id="top-right">
            <p>KLEIN ssss</p>
          </div>
          <div id="bot-right">
            <a href="#"><p>Déconnexion</p></a>
          </div>

        </div>

        <div id="content">
			<?php echo $output; echo "bite" ?>	
		</div>
       <div id="copyright">
         <p>Copyright</p>
       </div>


       <canvas id = "canvas" width="600" height="600">
         <p>Veuillez activer le javaScript sur votre navigateur</p>
       </canvas>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" > 
	<body>
		
		<div id='footer3'> 
		</div>
		<div id="text_footer">
			<p>Maxence Chauvet - Nicolas Klein - Tayfun Yilmaz © 2017</p>
		</div>
	</body>
</html>