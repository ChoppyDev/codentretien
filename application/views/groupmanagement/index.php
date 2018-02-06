
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js" ></script>
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>   -->         
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.jqgrid.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/usertable.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<table id="userTable"></table>
<script> 
  $( function() {
    $( "#groupDialog" ).dialog({
    	autoOpen: false	
    });
  });
</script>
<div id="groupDialog">

	<label for="labelgroup">Nom du groupe: </label>
	<input id="labelgroup" name="labelgroup" type="text">
	<br>

	<?php for($i = 0; $i < count($this->permissions); $i++){ ?>
		<input type="checkbox" name="<?php echo $this->permissions[$i]->idPermission?>"><?php echo $this->permissions[$i]->labelPermission ?> </input>
		<br>
	<?php } ?>

</div>