<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Planning { // only graphics

  private $data;
  private $sizeX;
  private $sizeY;
  private $days;
  private $hours;

  public function __construct(){
    $this->CI     =& get_instance();
    $this->data   = array();
    $this->days   = array("","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
    $this->hours   = array("","8h - 9h","9h - 10h","10h - 11h","11h - 12h","12h - 13h","13h - 14h","14h - 15h","15h - 16h","16h - 17h","17h - 18h","18h - 19h","19h - 20h","20h - 21h","21h - 22h");
  }

  public function init($data){
    if($data != null)
    {
      $this->data   = $data;
      array_unshift($this->data, $this->days);
      $this->sizeY  = count($data);
      $this->sizeX  = count($data[0]);
      return true;
    }
    return false;
  }

  public function generate(){
    //  $test = "<div class=\"popup\" onclick=\"showTask()\">data<span class=\"popuptext\" id=\"myPopup\">data_full</span></div>";

    echo "<table id='table'>";
    for( $y = 0; $y < $this->sizeY; $y++ )
    {
      if($y == 0)
        echo "<tr class='table_tr table_days'>";
      else
        echo "<tr class='table_tr'>";

      for( $x = 0; $x < $this->sizeX; $x++ )
      {
        if($x == 0 && $y != 0)
          echo "<td class='table_td table_hours'>".$this->hours[$y]."</td>";
        else if( $x % 2 == 0 && $y != 0)
          echo "<td class='table_td table_interval'><div class=\"planning_data\">".$this->data[$y][$x]."</div></td>";
        else if( $y != 0)
          echo "<td class='table_td'><div class=\"planning_data\">".$this->data[$y][$x]."</div></td>";
        else
          echo "<td class='table_td'>".$this->data[$y][$x]."</td>";
      }
        echo "</tr>";
    }
    echo "</table>";
  }
}

?>
