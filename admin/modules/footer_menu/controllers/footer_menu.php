<?php
/**
 * Manage Menus Management
 * 
 * PHP version 5
 * 
 * @author sudhakar <sudhakar.c@siriinnovations.com>
 * @version 1.0
 * @license http://URL name
 * @access public
 */
class footer_menu extends Controller {

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        if (!$this->session->gets('adminuser_id')) {
            $this->redirect('login');
        }
    }

    /**
     * Load the menu management page
     */
    public function index() {
       $this->view->menuString = $this->addMenu();
        $this->view->menuDisplayString = $this->displayMenu();
        $this->view->LoadView('manageMenus', 'footer_menu');
    }

    /**
     * Add a new menu
     */
    public function addMenuDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->addMenuDetails($_POST);
           
            if ($result) {
                $this->session->sets('success_msg', 'Menu added successfully');
            } else {
                $this->session->sets('error_msg', 'Failed to add menu');
            }
            $this->redirect('footer_menu');
        }
    }

     public function getAllPages() {
        $result = $this->model->getAllPages();

        echo json_encode($result->pages) ;

     }

      /**

      * By using this funtion get all possible modules

      */

     public function getAllModules() {

          $result = $this->model->getAllModules();

         echo json_encode($result->modules) ;


     }

     public function ajaxSaveMenu() {
    $data = json_decode($_POST['menu'], true); // Decode the JSON data
    foreach ($data as $key => $item) {
        $newPosition = $key + 1;
        $parent_id = 0; // Default parent_id is 0 unless a parent is defined
        if (isset($item['children']) && is_array($item['children'])) {
            $parent_id = $item['id']; // Set parent_id to the current item's id
        }
        $this->updateMenuItem($item, $parent_id, $newPosition);
    }
    $this->set_logs($this->session->gets('adminuser_id'),'menus','ajaxSaveMenu'.implode('~',$_POST),'error_logs','Menu Updted Successfully','ACTS'); 
    echo "Menu Updated Successfully.";
    exit;
}
 public function ajaxDisplayMenu() {

        echo $this->displayMenu();

    }

    /**
     * Edit a menu
     */
    public function editMenus($id) {

        $menuItem = $this->model->getMenuDetails($id);
        
         $this->view->menuDisplayString = $this->displayMenu();
        $this->view->menuDetails = $menuItem;
        $this->view->LoadView('editMenus', 'footer_menu');
    }

    /**
     * Update a menu
     */
    public function updateMenuDetails() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->model->updateMenuDetails($_POST);
            if ($result) {
                $this->session->sets('success_msg', 'Menu updated successfully');
            } else {
                $this->session->sets('error_msg', 'Failed to update menu');
            }
            $this->redirect('footer_menu');
        }
    }

    /**
     * Delete a menu
     */
    public function deleteMenuItems() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->deleteMenuItems($_POST);
            die();
            $this->redirect('footer_menu');
        }
    }

    /**
     * Display the menu structure
     */
   private function displayMenu() {
    // Fetch the menu data from the model
    $data = $this->model->getMenus();
    
    // Check if $data is an object and has the 'menus' property
    if (is_object($data) && isset($data->menus) && is_array($data->menus)) {
        $menuString = '';
        
        // Iterate over the 'menus' array
        foreach ($data->menus as $row) {
            $menuString .= '<li class="dd-item dd3-item" data-id="' . $row->menu_id . '">';
            $menuString .= '<div class="dd-handle dd3-handle">Drag</div>';
            $menuString .= '<div class="dd3-content"><span>' . htmlspecialchars($row->menu_name) . '</span>';
            $menuString .= '<div class="item-edit">';
            $menuString .= '<a href="' . SITEURL . 'footer_menu/editMenus/' . $row->menu_id . '" class="text-muted px-1"><i class="bi bi-pencil-fill"></i></a>';
            $menuString .= '<a href="#" class="text-muted px-1 delete_menu" data-id="' . $row->menu_id . '"><i class="bi bi-trash-fill"></i></a>';
            $menuString .= '</div></div>';
            $menuString .= '</li>';
        }
        
        
        return $menuString ? '<ol class="dd-list">' . $menuString . '</ol>' : '';
    } else {
       
        return '<ol class="dd-list"><li>No menus found.</li></ol>';
    }
}

    
    private function addMenu() {
        $menuString = '';
        foreach ($this->menus as $row) {
            $menuString .= '<option value="' . $row['menu_id'] . '">' . $row['menu_name'] . '</option>';
        }
        return $menuString;
    }
}
?>