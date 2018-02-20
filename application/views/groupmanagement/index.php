
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />

<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js" ></script>   
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.jqgrid.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/grid.locale-fr.js" ></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/js/groupTable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js"></script>

<button id="create-group"> Créer un nouveau groupe</button>
<table id="groupTable"></table>
<div id="gridpager"></div>
<script> 
  $( function() {
   dialog = $( "#groupDialog" ).dialog({
    	autoOpen: false,
    	modal: true,
    });
  });
  $( "#create-group" ).button().on( "click", function() {
  		$("#labelgroup").val('');
  		dialog.dialog("open");
      	dialog.dialog({
      	title: "Nouveau groupe",
      	buttons: {
      		"Créer": function(){
      			permList = [];
      			url = "http://localhost:9090/codentretien/groupmanagement/creategroup";
              	$('input[type=checkbox]').each(function(){
                	if(this.checked){
                  	permList.push($(this).attr('name'));
                	}
              	});
              	console.log(permList);
              	data = {labelGroup: $('#labelgroup').val(), permissions: permList};
              	$.ajax({
              		type: 'POST',
              		url: url,
              		data: data,
              		success: function(){
              			$("#groupDialog").dialog("close");
              			$('#groupTable').trigger( "reloadGrid" );
              		},
              		error: function(data, msg){
              			alert("Une erreur est survenue, veuillez contacter un administrateur");
              		}
              	});

      		},
      		"Annuler": function(){
      			$(this).dialog("close");
      		}
      	}
      });  
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