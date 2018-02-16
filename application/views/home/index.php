<script type="text/javascript" src="<?php echo base_url();?>assets/js/planning/planning.js"></script>
<?php

    $test = "<div class=\"popup\" onclick=\"showTask()\">data<span class=\"popuptext\" id=\"myPopup\">
    <p class=\"room\">C114</p></span></div>";

    $data = array(
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--",$test,"--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--")
    );

    $this->planning->init($data);
    $this->planning->generate();
?>
