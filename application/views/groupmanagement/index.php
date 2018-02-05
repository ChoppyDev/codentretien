
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/js/jquery-ui.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jqgrid/js/jquery-ui.min.js" ></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>            
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.jqgrid.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assets/css/ui.jqgrid.min.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/usertable.js"></script>

<table id="userTable"></table>
<select id="groupList">
	  		<?php for($i = 0; $i < count($this->groups); $i++){ ?>
	  				<option value="<?php echo $this->groups[$i]->idGroup?>"><?php echo $this->groups[$i]->labelGroup ?> </option>
	  		<?php } ?>
</select>