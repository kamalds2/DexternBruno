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



class footer_menu_model extends Model {

    

    public function __construct() {

        parent::__construct();

    }

    

    /**

     * 

     * @return array

     */

    public function getMenus() {
        $url = RESTURL."footer_menu/getallmenus";
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

        $values['menu_type'] = $menu_type;

        $url = RESTURL."footer_menu/addmenudetails"; 

         // echo $url;var_dump(json_encode($values));die();

        $result = $this->CallAPI("POST",$url,$values); 
        var_dump($result);
        die();

        return $result;         

    }

    /**

     * 

     * @param integer $id

     * @return array

     */

     public function getApiDetails($id) {

        

        $result = $this->db->find('SELECT * FROM '.DBPREFIX.'_apilines WHERE  api_id = :api_id', array(':api_id' => $id));

        return $result;

        

    }

    /**

     * 

     * @param array $data

     * @return boolean

     */

     public function updateMenu($data) {

        extract($data);

        $values = array();

              
  

        $id = $menu_id;

        

        $result = $this->db->update(DBPREFIX.'_footer_menus',  "`menu_id` = $id");

        if($result) {

            return true;

        } else {

            return false;    

        }

    }

    public function updateMenuById($menu_id, $parent_id, $position) {

       
        $url = RESTURL."footer_menu/updatemenubyid";  
        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("POST",$url,$values);
        return $result;
 
    }


     /**

     * 

     * @param integer $id

     * @return array

     */

    public function deleteApi($id) {

         return $this->db->delete(DBPREFIX.'_apilines', "`api_id` = $id");

    }

    

    /**

     * 

     * @param array $data

     * @return boolean

     */

    public function deleteAllApilines($data) {

      extract($data);

      $ids = $deletdata;

      return $this->db->deleteAll(DBPREFIX.'_apilines', "`api_id`", $ids);

    }

        

    /**

     * 

     * @param array $data

     * @return boolean

     */

    public function changeApiStatus($data) {

        

        extract($data);

        $apiId = $apiId;

        $status = $status;

        $values = array();

        if($status == 'y') {

            $values['api_status'] = 'n';

        } else {

            $values['api_status'] = 'y';

        }

        $result = $this->db->update(DBPREFIX.'_apilines', $values, "`api_id` = $apiId");

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
       

        return $this->db->find("SELECT * FROM ".DBPREFIX."_footer_menus WHERE `menu_id` = :menu_id", array(':menu_id' => $id));

    }

    

    /*

     * for updating menu data

     * parameter array $data

     * return boolean

     */

    public function updateMenuDetails($data){



        $url = RESTURL."footer_menu/updatemenudetails"; 

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
     $url = RESTURL."footer_menu/deletemenuitems/".$deletId; 

        // echo $url;var_dump(json_encode($values));die();
        $result = $this->CallAPI("GET",$url); 

        return $result;
    }



}

    ?>