<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App; 

 
return function (App $app) { 

  define('SOURCEPATH', ''); 

  /* USERS */

  $app->post(SOURCEPATH.'/users/checklogin',\App\Action\Users\CheckLogin::class);
  $app->post(SOURCEPATH.'/users/checklogin2', \App\Action\Users\CheckLogin2::class);
  $app->get(SOURCEPATH.'/users/getusers',\App\Action\Users\GetUsers::class);
  $app->get(SOURCEPATH.'/users/getuserdetails/{user_id}',\App\Action\Users\GetUserDetails::class);
  $app->get(SOURCEPATH.'/users/getusername',\App\Action\Users\GetUserName::class);  
  $app->get(SOURCEPATH.'/users/getcustomers',\App\Action\Users\GetCustomers::class);
  $app->post(SOURCEPATH.'/users/adduser', \App\Action\Users\AddUser::class);
  $app->post(SOURCEPATH.'/users/edituser', \App\Action\Users\EditUser::class);
  $app->post(SOURCEPATH.'/users/deleteuser',\App\Action\Users\DeleteUser::class);
  $app->get(SOURCEPATH.'/users/checkusername/{user_name}',\App\Action\Users\CheckUserName::class);
  $app->get(SOURCEPATH.'/users/checkuseremail/{user_email}',\App\Action\Users\CheckUserEmail::class);
  
  $app->get(SOURCEPATH.'/users/getuseremaildetails/{email}',\App\Action\Users\GetUserEmailDetails::class);
  $app->post(SOURCEPATH.'/users/checkpassword',\App\Action\Users\CheckPassword::class);
  $app->post(SOURCEPATH.'/users/updatepassword', \App\Action\Users\UpdatePassword::class);
  $app->get(SOURCEPATH.'/users/getuserdetails',\App\Action\Users\GetUserDetails::class); 

  $app->post(SOURCEPATH.'/users/checkemail',\App\Action\Users\CheckEmail::class);
  $app->post(SOURCEPATH.'/users/checkeditemail',\App\Action\Users\CheckEditEmail::class);
  $app->post(SOURCEPATH.'/users/updateprofiledetails',\App\Action\Users\UpdateProfileDetails::class);
  
  $app->get(SOURCEPATH.'/users/getsitesettings',\App\Action\Users\GetSiteSettings::class);
  $app->post(SOURCEPATH.'/users/updatesettingsdetails',\App\Action\Users\UpdateSettingsDetails::class);



  /* Roles*/
  $app->get(SOURCEPATH.'/roles/getroles',\App\Action\Roles\GetRoles::class);
  $app->post(SOURCEPATH.'/roles/addrole',\App\Action\Roles\AddRole::class);
  $app->post(SOURCEPATH.'/roles/editrole',\App\Action\Roles\EditRole::class);
  $app->delete(SOURCEPATH.'/roles/deleterole/{role_id}/{user_id}/{apiKey}',\App\Action\Roles\DeleteRole::class);
  $app->get(SOURCEPATH.'/roles/getmodules',\App\Action\Roles\GetModules::class);
  $app->get(SOURCEPATH.'/roles/getprivileges/{role_id}',\App\Action\Roles\GetPrivileges::class);
  $app->post(SOURCEPATH.'/roles/accesspages',\App\Action\Roles\AccessPages::class);


  /* Services */
  $app->post(SOURCEPATH.'/services/addservice',\App\Action\Services\AddService::class);
  $app->get(SOURCEPATH.'/services/getallservices',\App\Action\Services\GetAllServices::class);

  $app->get(SOURCEPATH.'/services/getservicedetails/{page_id}',\App\Action\Services\GetServiceDetails::class);
  $app->post(SOURCEPATH.'/services/updateservice',\App\Action\Services\UpdateService::class);
  $app->post(SOURCEPATH.'/services/deleteservice',\App\Action\Services\DeleteService::class);

 /* Home Services */
 $app->post(SOURCEPATH.'/services/addHomeservice',\App\Action\Services\AddHomeService::class);
    $app->get(SOURCEPATH.'/services/getallhomeservices',\App\Action\Services\GetAllHomeServices::class);
     $app->post(SOURCEPATH.'/services/updateHomeservice',\App\Action\Services\UpdateHomeService::class);



   /* Pages */
  $app->post(SOURCEPATH.'/pages/addpage',\App\Action\Pages\AddPage::class);
  $app->get(SOURCEPATH.'/pages/getallpages',\App\Action\Pages\GetAllPages::class);
  $app->get(SOURCEPATH.'/pages/getpagedetails/{page_id}',\App\Action\Pages\GetPageDetails::class);
  $app->post(SOURCEPATH.'/pages/updatepage',\App\Action\Pages\UpdatePage::class);
  $app->post(SOURCEPATH.'/pages/deletepage',\App\Action\Pages\DeletePage::class);
  
  /* Jobs */

$app->post(SOURCEPATH.'/jobs/addjob',\App\Action\Jobs\AddJob::class);
  $app->get(SOURCEPATH.'/jobs/getalljobs',\App\Action\Jobs\GetAllJobs::class);
  $app->get(SOURCEPATH.'/jobs/getjobdetails/{page_id}',\App\Action\Jobs\GetJobDetails::class);
  $app->post(SOURCEPATH.'/jobs/updatejob',\App\Action\Jobs\UpdateJob::class);
  $app->post(SOURCEPATH.'/jobs/deletejob',\App\Action\Jobs\DeleteJob::class);

  /* Sliders */
  $app->post(SOURCEPATH.'/sliders/addslider',\App\Action\Sliders\AddSlider::class);
  $app->get(SOURCEPATH.'/sliders/getallsliders',\App\Action\Sliders\GetAllSliders::class);
  $app->get(SOURCEPATH.'/sliders/getsliderdetails/{slider_id}',\App\Action\Sliders\GetSliderDetails::class);
  $app->post(SOURCEPATH.'/sliders/updateslider',\App\Action\Sliders\UpdateSlider::class);
  $app->post(SOURCEPATH.'/sliders/deleteslider',\App\Action\Sliders\DeleteSlider::class);

  /* menus */
  
  $app->get(SOURCEPATH.'/menus/getallmenus',\App\Action\Menus\GetAllMenus::class);
  $app->get(SOURCEPATH.'/menus/getallpages',\App\Action\Menus\GetAllPages::class);
  $app->get(SOURCEPATH.'/menus/getallmodules',\App\Action\Menus\GetAllModules::class);
  $app->post(SOURCEPATH.'/menus/addmenudetails',\App\Action\Menus\AddMenuDetails::class);
  $app->post(SOURCEPATH.'/menus/updatemenudetails',\App\Action\Menus\UpdateMenuDetails::class);
  $app->get(SOURCEPATH.'/menus/getmenudetails/{menu_id}',\App\Action\Menus\GetMenuDetails::class);
    $app->get(SOURCEPATH.'/menus/deletemenuitems/{menu_id}',\App\Action\Menus\DeleteMenuItems::class);
  $app->post(SOURCEPATH.'/menus/updatemenubyid',\App\Action\Menus\UpdateMenuById::class);

/* footer menus */
   $app->get(SOURCEPATH.'/footer_menu/getallmenus',\App\Action\Footer_menu\GetAllMenus::class);
  $app->get(SOURCEPATH.'/footer_menu/getallpages',\App\Action\Footer_menu\GetAllPages::class);
  $app->get(SOURCEPATH.'/footer_menu/getallmodules',\App\Action\Footer_menu\GetAllModules::class);
  $app->post(SOURCEPATH.'/footer_menu/addmenudetails',\App\Action\Footer_menu\AddMenuDetails::class);
  $app->post(SOURCEPATH.'/footer_menu/updatemenudetails',\App\Action\Footer_menu\UpdateMenuDetails::class);
  $app->get(SOURCEPATH.'/footer_menu/getmenudetails/{menu_id}',\App\Action\Footer_menu\GetMenuDetails::class);
    $app->get(SOURCEPATH.'/footer_menu/deletemenuitems/{menu_id}',\App\Action\Footer_menu\DeleteMenuItems::class);
  $app->post(SOURCEPATH.'/footer_menu/updatemenubyid',\App\Action\Footer_menu\UpdateMenuById::class);



  /* Testimonials */

  $app->get(SOURCEPATH.'/testimonials/getalltestimonials',\App\Action\Testimonials\GetAllTestimonials::class);
  $app->post(SOURCEPATH.'/testimonials/addtestimonialdetails',\App\Action\Testimonials\AddTestimonialDetails::class);
  $app->get(SOURCEPATH.'/testimonials/gettestimonialdetails/{testimonial_id}',\App\Action\Testimonials\GetTestimonialDetails::class);
  $app->post(SOURCEPATH.'/testimonials/updatetestimonialdetails',\App\Action\Testimonials\UpdateTestimonialDetails::class);
  $app->post(SOURCEPATH.'/testimonials/deletetestimonial',\App\Action\Testimonials\DeleteTestimonial::class);



  /*Tales*/

  $app->get(SOURCEPATH.'/tales/getalltales',\App\Action\Tales\GetAllTales::class);
  $app->post(SOURCEPATH.'/tales/addtale',\App\Action\Tales\AddTale::class);
  $app->get(SOURCEPATH.'/tales/gettaledetails/{tale_id}',\App\Action\Tales\GetTaleDetails::class);
  $app->post(SOURCEPATH.'/tales/updatetale',\App\Action\Tales\UpdateTale::class);
  $app->get(SOURCEPATH.'/tales/deletetale/{tale_id}',\App\Action\Tales\DeleteTale::class);


  /* Dashboard */

  $app->get(SOURCEPATH.'/dashboard/getdashboardenquiries',\App\Action\Dashboard\GetDashboardEnquiries::class);
  $app->get(SOURCEPATH.'/dashboard/getdashboardpages',\App\Action\Dashboard\GetDashboardPages::class);
  $app->get(SOURCEPATH.'/dashboard/getdashboardsliders',\App\Action\Dashboard\GetDashboardSliders::class);
  $app->get(SOURCEPATH.'/dashboard/getdashboardcount',\App\Action\Dashboard\GetDashboardCount::class);


  /* Front End */

  $app->get(SOURCEPATH.'/travelbunny/getallmenus',\App\Action\TravelBunny\GetAllMenus::class);
  $app->get(SOURCEPATH.'/travelbunny/getallfooter_menus',\App\Action\TravelBunny\GetAllFooterMenus::class);
  $app->get(SOURCEPATH.'/travelbunny/getalljobs',\App\Action\TravelBunny\GetAllJobs::class);
    $app->post(SOURCEPATH.'/travelbunny/getJobDetails',\App\Action\TravelBunny\GetAllJobDetails::class);
  $app->get(SOURCEPATH.'/travelbunny/getallsliders',\App\Action\TravelBunny\GetAllSliders::class);

$app->get(SOURCEPATH.'/travelbunny/getsliderdetails/{slider_id}',\App\Action\TravelBunny\GetSlidersDetails::class);
    $app->get(SOURCEPATH.'/travelbunny/getallHomeservices',\App\Action\TravelBunny\GetAllHomeServices::class); 
  

  $app->get(SOURCEPATH.'/travelbunny/getalltestimonials/{testimonial_name}',\App\Action\TravelBunny\GetAllTestimonials::class); 
  $app->get(SOURCEPATH.'/travelbunny/gethomepagedetails',\App\Action\TravelBunny\GetHomePageDetails::class); 

  $app->get(SOURCEPATH.'/travelbunny/getpagedetails/{meta_title}',\App\Action\TravelBunny\GetPageDetails::class); 

  $app->post(SOURCEPATH.'/travelbunny/addcontactdetails',\App\Action\TravelBunny\AddContactDetails::class);
  $app->get(SOURCEPATH.'/travelbunny/getmoduledetails/{module_id}',\App\Action\TravelBunny\GetModuleDetails::class);  
  $app->get(SOURCEPATH.'/travelbunny/getsettingsdata',\App\Action\TravelBunny\GetSettingsData::class); 


  


 



};