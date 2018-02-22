<!-- STYLE -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />
<!-- SCRIPT -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/jquery.jqGrid.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/trirand/grid.locale-fr.js" ></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/dialog_form.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/historyTable.js"></script>

<table id= "historyTable"></table>
<div id="pagerHistory"></div>
<div id="ticket-dialog" > 
	<table>
		<tr>
			<td>Titre:</td>
			<td id= "ticket-title">tatatatatata</td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><textarea id="ticket-description" disabled></textarea></td>
		</tr>
		<tr>
			<td>Auteur: </td>
			<td id="ticket-creator"></td>
		</tr>
		<tr>
			<td>Date de creation: </td>
			<td id="ticket-createdOn"></td>
		</tr>
		<tr>
			<td>Statut:</td>
			<td id="ticket-status"></td>
		</tr>
	</table>
</div>

