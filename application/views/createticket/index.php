<div id="form_container">
	<h1 id="form_title">faire une demande</h1>
	<form id="createticket" class="form" method="post" action="<?php echo base_url();?>CreateTicket/publishTicket">
		<div class="form_item">
      <input class="form_text_normal_style" type="text" name="ticket_title" placeholder="Titre..."/>
      <select class="form_text_small_style" name="ticket_room" id="roomsList">
        <?php for($i = 0; $i < count($this->rooms); $i++){ ?>
            <option value="<?php echo $this->rooms[$i]->room_id ?>"><?php echo $this->rooms[$i]->room_label ?> </option>
        <?php } ?>
      </select>
    </div>
    <div class="form_item">
      <textarea class="form_textarea_large_style" name="ticket_description" placeholder="Votre description..." rows="8" cols="45"></textarea>
    </div>
    <div id="form_submit">
      <input class="form_button_normal_style" type="submit" value="Envoyer"/>
    </div>
	</form>
</div>
