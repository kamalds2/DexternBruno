

    <?php


     class sliders_model extends Model {

          public function __construct() {
              parent::__construct();
          }

           public function getAllSliders($slider_id){
      $url = RESTURL."travelbunny/getsliderdetails/".$slider_id;  

      $res = $this->CallAPI("GET",$url); 
     
      return $res;
    }
 






     }