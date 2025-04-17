<?php



/**

 *  Manage Menus Managements model

 * 

 * PHP version 5
 *  

 * @author sudhakar <sudhakar.c@siriinnovations.com>

 * @version 1.0

 * @license http://URL name 

 * @access public

 */



class menus_model extends Model {

    

    public function __construct() {

        parent::__construct();

    }

    

    /**

     * 

     * @return array

     */

    public function getMenus() {
        $url = RESTURL."menus/getallmenus";
        $result = $this->CallAPI("GET",$url);  
        return $result; 
    }

    /**

     * 

     * @return array

     */

    public function getAllPages() {

        $url = RESTURL."footer_menu/getallpages";  

        $result = $this->CallAPI("GET",$url);
         
        return $result;

    }

    /**

     * 

     * @return array

     */

    public function getAllModules() {

        $url = RESTURL."footer_menu/getallmodules";  

        $result = $this->CallAPI("GET",$url);
         
        return $result;        

    }






    /**

     * 

     * @param array $data

     * @return boolean

     */

    public function addMenuDetails($data) {  

        extract($data); 
        $values = array();

        $values['menu_name'] = $menu_name;

          // $result =  $this->db->find("SELECT page_url FROM ".DB_PREFIX."pages WHERE page_id = $id");           

            // $values['menu_link'] = $result['page_url']; 
        
            $values['menu_module'] = $menu_module;



        $values['menu_status'] = $menu_status;

        $url = RESTURL."menus/addmenudetails"; 

         // echo $url;var_dump(json_encode($values));die();

        $result = $this->CallAPI("POST",$url,$values); 

        return $result;         

    }

    /**

     * 

     * @param integer $id

     * @return array

     */

    /**

     * 

     * @param array $data

     * @return boolean

     */

     public function updateMenu($data) {

        extract($data);

        $values = array();

              
  

        $id = $menu_id;

        

        $result = $this->db->update(DBPREFIX.'_menus',  "`menu_id` = $id");

        if($result) {

            return true;

        } else {

            return false;    

        }

    }


   

   

    

    /*

     * for getting menu details

     * parameter integer $id

     * return array

     */

    public function getMenuDetails($id){

        return $this->db->find("SELECT * FROM ".DBPREFIX."_menus WHERE `menu_id` = :menu_id", array(':menu_id' => $id));

    }

    

    /*

     * for updating menu data

     * parameter array $data

     * return boolean

     */

    public function updateMenuDetails($data){



        $url = RESTURL."menus/updatemenudetails"; 
       
        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("POST",$url,$data); 

        return $result;

        // return $this->db->update(DBPREFIX.'_menus', $values, "`menu_id` = $menuId");

    }

    

    /*

     * foe deleting menu items

     *  parameter array $data

     */

    public function deleteMenuItems($data){
       extract($data);
        $url = RESTURL."menus/deletemenuitems/".$deletId; 
       
        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("GET",$url); 

        return $result;

    }
   



}

    ?>