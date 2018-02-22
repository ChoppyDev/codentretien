<script type="text/javascript" src="<?php echo base_url();?>assets/js/planning/planning.js"></script>
<?php

    $test = "<div class=\"popup\" onclick=\"showTask()\">C114<span class=\"popuptext\" id=\"myPopup\">
    <p class=\"room\">C114</p>
    <p class=\"title\">Problème d'imprimante qui ne fonctionne pas</p>
    <p class=\"author\">Richard Pierre</p>

    <textarea class=\"desc\">Je suis une description</textarea>
    </span></div>";

    $test1 = "<div class=\"popup\" onclick=\"showTask()\">C008<span class=\"popuptext\" id=\"myPopup\">
    <p class=\"room\">C008</p>
    <p class=\"title\">Problème d'imprimante qui ne fonctionne pas</p>
    <p class=\"author\">Richard Pierre</p>

    <textarea class=\"desc\">Je suis une description</textarea>
    </span></div>";

    $test2 = "<div class=\"popup\" onclick=\"showTask()\">C202<span class=\"popuptext\" id=\"myPopup\">
    <p class=\"room\">C202</p>
    <p class=\"title\">Problème d'imprimante qui ne fonctionne pas</p>
    <p class=\"author\">Richard Pierre</p>

    <textarea class=\"desc\">Je suis une description</textarea>
    </span></div>";

    $data = array(
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array($test2,$test1,$test2,"--","--","--","--","--"),
      array($test2,"--","--","--","--","--","--","--"),
      array("--","--","--","--","--",$test1,"--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--",$test,"--","--","--","--"),
      array("--","--","--",$test,"--","--","--","--"),
      array("--","--","--","--","--","--","--","--"),
      array("--","--","--","--","--","--","--","--")
    );

    $this->planning->init($data);
    $this->planning->generate();
?>
