
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js" ></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->         
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.jqgrid.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/groupTable.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js"></script>
<button id="create-group"> Créer un nouveau groupe</button>
<table id="userTable"></table>
<script> 
  $( function() {
   dialog = $( "#groupDialog" ).dialog({
    	autoOpen: false,
    	modal: true,
    	title: "Noveau Groupe"
    });
  });
  $( "#create-group" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
</script>

<div id="response"> </div>
<div id="groupDialog">

	<label for="labelgroup">Nom du groupe: </label>
	<input id="labelgroup" name="labelgroup" type="text">
	<br>

	<?php for($i = 0; $i < count($this->permissions); $i++){ ?>
		<input type="checkbox" name="<?php echo $this->permissions[$i]->idPermission?>"><?php echo $this->permissions[$i]->labelPermission ?> </input>
		<br>
	<?php } ?>

</div>