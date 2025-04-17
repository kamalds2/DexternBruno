<?php
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App; 

 define('SOURCEPATH', '/express_cements/restfulnew');

return function (App $app) {
  /* CUSTOMER FRONT END*/
  $app->post('/customer/login', \App\Action\Customer\Login::class);
  $app->post('/customer/register', \App\Action\Customer\Register::class);
  $app->post('/customer/checkmobile', \App\Action\Customer\CheckMobile::class);
  $app->post('/customer/checkemail', \App\Action\Customer\CheckEmail::class);

  $app->get('/customer/getcustomerdetails/{user_id}', \App\Action\Customer\GetCustomerDetails::class);
  $app->get('/customer/getdashboarddetails/{customer_id}', \App\Action\Customer\GetDashboardDetails::class);
  $app->get('/customer/getcustomerorders/{customer_id}', \App\Action\Customer\GetCustomerOrders::class);
  $app->get('/customer/getorderdetails/{customer_id}', \App\Action\Customer\GetOrderDetails::class);
  $app->get('/customer/getchildorderdetails/{order_id}', \App\Action\Customer\GetChildOrderDetails::class);
  $app->get('/customer/gettransactiondetails/{business_id}', \App\Action\Customer\GetTransactionDetails::class);
  $app->get('/customer/getinvoicedetails/{transaction_id}', \App\Action\Customer\GetInvoiceDetails::class);
  $app->get('/customer/getcustomeraddress/{business_id}', \App\Action\Customer\GetCustomerAddress::class);
  $app->post('/customer/addnewaddress', \App\Action\Customer\AddNewAddress::class);
  $app->post('/customer/editaddress', \App\Action\Customer\EditAddress::class);
  $app->get('/customer/getaddressdetails/{address_id}', \App\Action\Customer\GetAddressDetails::class);
  // $app->delete('/deleteddress/{address_id}/{user_id}/{apiKey}',\App\Action\Roles\DeleteAddress::class);
  $app->post('/customer/deleteaddress',\App\Action\Customer\DeleteAddress::class);
  $app->get('/customer/getcustomerprofile/{customer_id}', \App\Action\Customer\GetCustomerProfile::class);
  $app->post('/customer/updatecustomerpassword', \App\Action\Customer\UpdateCustomerPassword::class);
  $app->post('/customer/updatecustprofiledetails', \App\Action\Customer\UpdateCustProfileDetails::class);
  $app->get('/customer/getgenerallist/{category}', \App\Action\Customer\GetGeneralList::class);
  
  $app->post('/customer/addticketdetails', \App\Action\Customer\AddTicketDetails::class);
  $app->get('/customer/gettickets/{userId}', \App\Action\Customer\GetTickets::class);
  $app->get('/customer/getticketdetails/{ticket_id}', \App\Action\Customer\GetTicketDetails::class);
  $app->get('/customer/getticketreplies/{ticket_id}', \App\Action\Customer\GetTicketReplies::class);
  $app->post('/customer/addcomment', \App\Action\Customer\AddComment::class);
  
  $app->get('/customer/getordervehicledrivers/{order_id}', \App\Action\Customer\GetOrderVehicleDrivers::class);
  $app->post('/customer/addcontactformdetails', \App\Action\Customer\AddContactFormDetails::class);

  $app->get('/customer/getplantdetails/{plant_id}', \App\Action\Customer\GetPlantDetails::class);
 
  /* Online Payment */
  $app->post('/customer/addtemponlinetransactions', \App\Action\Customer\AddTempOnlineTransactions::class);
  $app->post('/customer/addtransactions', \App\Action\Customer\AddTransactions::class);
  $app->post('/customer/getpaymentpendingorders', \App\Action\Customer\GetPaymentPendingOrders::class);
  $app->get('/customer/gettemptransactionsdetails/{order_id}', \App\Action\Customer\GetTempTransactionsDetails::class);
  $app->get('/customer/updatetransactionstatus', \App\Action\Customer\UpdateTransactionStatus::class);
  $app->post('/customer/updateOnlineTransactionStatus', \App\Action\Customer\UpdateOnlineTransactionStatus::class);

  //ADMIN
  $app->get('/admin/getdashboard', \App\Action\Admin\GetDashboard::class);
  $app->get('/admin/getdashorderdetails', \App\Action\Admin\GetDashOrderDetails::class);
  $app->get('/admin/getdashtransactiondetails', \App\Action\Admin\GetDashTransactionDetails::class);
  $app->get('/admin/getbusiness',\App\Action\Admin\GetBusiness::class);
  $app->post('/admin/addcustomerdetails',\App\Action\Admin\AddCustomerDetails::class);
  $app->get('/admin/getbusinessdetails/{business_id}',\App\Action\Admin\GetBusinessDetails::class);
  $app->post('/admin/updatebusinessstatus',\App\Action\Admin\UpdateBusinessStatus::class);
  $app->get('/admin/getallbusiness',\App\Action\Admin\GetAllBusiness::class);
  $app->get('/admin/getplants',\App\Action\Admin\GetPlants::class);
  $app->post('/admin/addplantdetails',\App\Action\Admin\AddPlantDetails::class);
  $app->get('/admin/getplantdetails/{plant_id}',\App\Action\Admin\GetPlantDetails::class);
  $app->post('/admin/updateplantdetails',\App\Action\Admin\UpdatePlantDetails::class);
  $app->post('/admin/deleteplants',\App\Action\Admin\DeletePlants::class);
  $app->get('/admin/getvehicles',\App\Action\Admin\GetVehicles::class);
  $app->post('/admin/addvehicledetails',\App\Action\Admin\AddVehicleDetails::class);
  $app->get('/admin/getvehicledetails/{vehicle_id}',\App\Action\Admin\GetVehicleDetails::class);
  $app->post('/admin/updatevehicledetails',\App\Action\Admin\UpdateVehicleDetails::class);
  $app->get('/admin/getdrivers',\App\Action\Admin\GetDrivers::class);
  $app->post('/admin/adddriverdetails',\App\Action\Admin\AddDriverDetails::class);
  $app->get('/admin/getdriverdetails/{driver_id}',\App\Action\Admin\GetDriverDetails::class);
  $app->post('/admin/updatedriverdetails',\App\Action\Admin\UpdateDriverDetails::class);
  $app->get('/admin/getvehicledrivers/{vehicle_id}',\App\Action\Admin\GetVehicleDrivers::class);
  $app->post('/admin/deletevehicledrivers',\App\Action\Admin\DeleteVehicleDrivers::class);
  $app->post('/admin/deletevehicle',\App\Action\Admin\DeleteVehicle::class);
  $app->post('/admin/deletedriver',\App\Action\Admin\DeleteDriver::class);
  $app->get('/admin/getactivedrivers/{vehicle_id}',\App\Action\Admin\GetActiveDrivers::class);
  $app->post('/admin/assignvehicledriver',\App\Action\Admin\AssignVehicleDriver::class);
  $app->get('/admin/getvehicleslist',\App\Action\Admin\GetVehiclesList::class);
  $app->get('/admin/getdriverslist',\App\Action\Admin\GetDriversList::class);
  $app->post('/admin/getorders',\App\Action\Admin\GetOrders::class);
  $app->get('/admin/getvehicleassigneddrivers/{vehicle_id}',\App\Action\Admin\GetVehicleassignedDrivers::class);
  $app->get('/admin/getfullinfoorder/{order_id}',\App\Action\Admin\GetFullInfoOrder::class);
  $app->post('/admin/assignvehicle',\App\Action\Admin\AssignVehicle::class);
  $app->post('/admin/assignordervehicles',\App\Action\Admin\AssignOrderVehicles::class);  
  $app->get('/admin/getpendingorders',\App\Action\Admin\GetPendingOrders::class);
  $app->post('/admin/cancelorder',\App\Action\Admin\CancelOrder::class);
  $app->get('/admin/getplantstockproducts/{plant_id}',\App\Action\Admin\GetPlantStockProducts::class);
  $app->get('/admin/getsubproducts/{product_id}',\App\Action\Admin\GetSubProducts::class);
  $app->get('/admin/getplantstockdetails/{plant_id}',\App\Action\Admin\GetPlantStockDetails::class); 
  $app->post('/admin/addplantstockdetails',\App\Action\Admin\AddPlantStockDetails::class);
  $app->post('/admin/updateplantstockdetails',\App\Action\Admin\UpdatePlantStockDetails::class);
  $app->get('/admin/getallproducts',\App\Action\Admin\GetAllProducts::class);
  $app->post('/admin/getstockhistory',\App\Action\Admin\GetStockHistory::class);
  $app->get('/admin/getplantstockhistory/{product_id}/{plant_id}',\App\Action\Admin\GetPlantStockHistory::class);
  $app->get('/admin/getpendingorderscount',\App\Action\Admin\GetPendingOrdersCount::class);
  $app->get('/admin/getchildorders/{order_id}',\App\Action\Admin\GetChildOrders::class);

  $app->post('/admin/searchorders',\App\Action\Admin\SearchOrders::class);

  /*Trasactions*/
  $app->post('/admin/gettransactions',\App\Action\Admin\GetTransactions::class);
  $app->get('/admin/getinvoicedetails/{transaction_id}',\App\Action\Admin\GetInvoiceDetails::class);
  $app->post('/admin/searchtransactions',\App\Action\Admin\SearchTransactions::class);

  /* Business */

  $app->post('/business/createaccount', \App\Action\Business\CreateAccount::class);
  $app->post('/business/resendotp',\App\Action\Business\ResendOtp::class);
  $app->post('/business/verifyotp',\App\Action\Business\VerifyOtp::class);
  $app->post('/business/addbusinessdetails', \App\Action\Business\AddBusinessDetails::class);
  $app->get('/business/getbaddress/{business_id}',\App\Action\Business\GetBaddress::class);
  $app->post('/business/addbaddress',\App\Action\Business\AddBaddress::class);
  $app->get('/business/getbeditaddress/{address_id}',\App\Action\Business\GetBeditaddress::class);
  $app->post('/business/updatebaddress',\App\Action\Business\UpdateBaddress::class);
  $app->post('/business/deletebaddress',\App\Action\Business\DeleteBAddress::class);
  $app->get('/business/getprofiledetails/{business_id}',\App\Action\Business\GetProfileDetails::class);
  $app->post('/business/bforgotpassword',\App\Action\Business\GetBforgotPassword::class);
  $app->post('/business/updatebusinesspassword',\App\Action\Business\UpdateBusinessPassword::class);
  $app->post('/business/createorder',\App\Action\Business\CreateOrder::class);
  $app->post('/business/updatebusinessdetails',\App\Action\Business\UpdateBusinessDetails::class);
  $app->get(SOURCEPATH.'/business/aboutus',\App\Action\Business\AboutUs::class);
  $app->get('/business/terms',\App\Action\Business\TermsPage::class);
  $app->get('/business/getrmcproducts',\App\Action\Business\GetRmcProducts::class);
  $app->get('/business/getallorders/{customer_id}',\App\Action\Business\GetAllOrders::class);
  $app->post('/business/checkorder',\App\Action\Business\CheckOrder::class);
  $app->post('/business/addorder',\App\Action\Business\AddOrder::class);
  $app->get('/business/getorderdetails/{customer_id}',\App\Action\Business\GetOrderDetails::class);
  $app->get('/business/getordervehicledrivers/{order_id}',\App\Action\Business\GetOrderVehicleDrivers::class);
  $app->get('/business/generateorderotp/{order_id}',\App\Action\Business\GenerateOrderotp::class);
  $app->get('/business/generateinvoice/{order_id}',\App\Action\Business\GenerateInvoice::class);
  $app->post('/business/changepassword',\App\Action\Business\ChangePassword::class);
  $app->post('/business/checkcurrentpassword',\App\Action\Business\CheckCurrentPassword::class);
  $app->get('/business/getotpdetails/{otp_id}',\App\Action\Business\GetOtpDetails::class);
  $app->get('/business/getproductbrands/{product_id}',\App\Action\Business\GetProductBrands::class);
  $app->get('/business/getvehicletracking/{ord_allocate_id}',\App\Action\Business\GetTrackingDetails::class);

  /* DRIVERS */

  $app->post('/driver/checkdriverlogin', \App\Action\Driver\CheckDriverLogin::class);
  $app->post('/driver/resenddriverotp',\App\Action\Driver\ResendDriverOtp::class);
  $app->post('/driver/verifydriverotp',\App\Action\Driver\VerifyDriverOtp::class);
  $app->post('/driver/pendingdriverorders',\App\Action\Driver\PendingDriverOrders::class);
  $app->get('/driver/driverorderinfo/{order_id}',\App\Action\Driver\DriverOrderInfo::class);
  $app->post('/driver/uploadorderimage',\App\Action\Driver\UploadOrderImage::class);
  $app->post('/driver/updateorderlocation',\App\Action\Driver\UpdateOrderLocation::class);
  $app->post('/driver/updateorderstatus',\App\Action\Driver\UpdateOrderStatus::class);
  $app->post('/driver/addvehicletracking',\App\Action\Driver\AddVehicleTracking::class);
  
  /*ROLES*/

  $app->post('/roles/getroles',\App\Action\Roles\GetRoles::class);
  $app->post('/roles/getadminroles',\App\Action\Roles\GetAdminRoles::class);
  $app->post('/roles/getbusinessroles',\App\Action\Roles\GetBusinessRoles::class);
  $app->post('/roles/addrole', \App\Action\Roles\AddRole::class);
  $app->post('/editrole/{role_id}', \App\Action\Roles\EditRole::class);
  $app->get('/getroleusers/{role_id}', \App\Action\Roles\GetRoleUsers::class);
  $app->post('/deleterole',\App\Action\Roles\DeleteRole::class);
  $app->get('/roles/getmodules',\App\Action\Roles\GetModules::class);
  $app->post('/roles/getprivileges',\App\Action\Roles\GetPrivileges::class);
  $app->post('/roles/accesspages',\App\Action\Roles\AccessPages::class);
  $app->post('/roles/checkrolename', \App\Action\Roles\CheckRoleName::class);


  /* USERS */

  $app->post('/users/checklogin',\App\Action\Users\CheckLogin::class);
  $app->post('/users/checklogin2', \App\Action\Users\CheckLogin2::class);
  $app->get('/users/getusers',\App\Action\Users\GetUsers::class); 
  $app->get('/users/getbusinessusers',\App\Action\Users\GetBusinessUsers::class);
  $app->get('/users/getcustomers',\App\Action\Users\GetCustomers::class);
  $app->post('/users/adduser', \App\Action\Users\AddUser::class);
  $app->post('/users/edituser', \App\Action\Users\EditUser::class);
  $app->post('/users/deleteuser',\App\Action\Users\DeleteUser::class);
  $app->get('/users/checkusername/{user_name}',\App\Action\Users\CheckUserName::class);
  $app->get('/users/checkuseremail/{user_email}',\App\Action\Users\CheckUserEmail::class);
  $app->get('/users/getuserdetails/{user_id}',\App\Action\Users\GetUserDetails::class);
  $app->get('/users/getuseremaildetails/{email}',\App\Action\Users\GetUserEmailDetails::class);
  $app->post('/users/checkpassword',\App\Action\Users\CheckPassword::class);
  $app->post('/users/updatepassword', \App\Action\Users\UpdatePassword::class);
  $app->get('/users/getsiteuserdetails',\App\Action\Users\GetSiteUserDetails::class);

  /* Locations */

  $app->get('/locations/countries',\App\Action\Locations\GetCountries::class);
  $app->post('/locations/addcountry',\App\Action\Locations\AddCountry::class);
  $app->get('/locations/getstates/{country_id}',\App\Action\Locations\GetStates::class);
  $app->post('/locations/addstate', \App\Action\Locations\AddState::class);
  $app->post('/locations/editstate', \App\Action\Locations\EditState::class);

  /* CONTACTS */

  $app->get('/contacts/getcontacts', \App\Action\Contacts\GetContacts::class); 
  $app->post('/contacts/addcontact', \App\Action\Contacts\AddContact::class);
  $app->get('/contacts/getownerusers', \App\Action\Contacts\GetOwnerUsers::class);
  $app->post('/contacts/updatecontact', \App\Action\Contacts\UpdateContact::class);
  $app->post('/contacts/deletecontact', \App\Action\Contacts\DeleteContact::class);
  $app->post('/contacts/addcampaigngroup', \App\Action\Contacts\AddCampaignGroup::class);
  $app->get('/contacts/getcampaigngroups', \App\Action\Contacts\GetCampaignGroups::class);
  $app->post('/contacts/changegroupstatus', \App\Action\Contacts\ChangeGroupStatus::class);
  $app->post('/contacts/updatecampaigngroup', \App\Action\Contacts\UpdateCampaignGroup::class);
  $app->post('/contacts/deletecampaigngroup', \App\Action\Contacts\DeleteCampaignGroup::class);

  $app->get('/contacts/getregcampaigncontacts/{group_id}', \App\Action\Contacts\GetRegCampaignContacts::class);
  // $app->post('/contacts/insertregcampaigncontacts', \App\Action\Contacts\InsertRegCampaignContacts::class);
  // $app->post('/contacts/adduploadcamcontact', \App\Action\Contacts\AddUploadCamContact::class);
  // $app->get('/contacts/eidtregcampaigncontacts/:group_id', \App\Action\Contacts\EidtRegCampaignContacts::class);
  // $app->post('/contacts/deleteregcamcontact', \App\Action\Contacts\DeleteRegCamContact::class);
  $app->get('/contacts/editcampaigncontacts/{group_id}', \App\Action\Contacts\EditCampaignContacts::class);
  // $app->post('/contacts/deletecamcontact', \App\Action\Contacts\DeleteCamContact::class);
  
  $app->post('/contacts/inserttemplate', \App\Action\Contacts\InsertTemplate::class);
  $app->get('/contacts/gettemplates',\App\Action\Contacts\GetTemplates::class);
  $app->get('/contacts/getsingletemplate/{template_id}', \App\Action\Contacts\GetSingleTemplate::class);
  $app->post('/contacts/updatetemplate', \App\Action\Contacts\UpdateTemplate::class);
  $app->post('/contacts/deletetemplate', \App\Action\Contacts\DeleteTemplate::class);
  $app->get('/contacts/getemailconfiguration',\App\Action\Contacts\GetEmailConfiguration::class);
  $app->get('/contacts/gettemplatetype/{group_type}', \App\Action\Contacts\GetTemplateType::class);
  $app->get('/contacts/getcampaigngroupstype/{group_type}', \App\Action\Contacts\GetCampaignGroupsType::class);
  $app->post('/contacts/insertmailcampaign', \App\Action\Contacts\InsertMailCampaign::class);

  /*  REPORTS */

  $app->post('/reports/getorderreports', \App\Action\Reports\GetOrderReports::class);
  $app->post('/reports/gettransactionreports', \App\Action\Reports\GetTransactionReports::class);
  $app->post('/reports/getrefundtransactionreports', \App\Action\Reports\GetRefundTransactionReports::class);



  /* General Items */
  $app->post('/generalitems/getgenerallist', \App\Action\Generallist\GetGeneralList::class);

  /* Enquiries */

  $app->post('/enquiries/getenquiries', \App\Action\Enquiries\GetEnquiries::class);
  $app->get('/enquiries/getenquirycategories', \App\Action\Enquiries\GetEnquiryCategories::class);
  $app->get('/enquiries/gethwdukus', \App\Action\Enquiries\Gethwdukus::class);
  $app->post('/enquiries/addenquiry', \App\Action\Enquiries\AddEnquiry::class);
  $app->get('/enquiries/getenquirydetails/{lead_id}', \App\Action\Enquiries\GetEnquiryDetails::class);
  $app->get('/enquiries/getenquiryfollowups/{lead_id}', \App\Action\Enquiries\GetEnquiryFollowups::class);
  $app->post('/enquiries/addfollowup', \App\Action\Enquiries\AddFollowup::class);
 $app->post('/enquiries/updateenquirydetails',\App\Action\Enquiries\updateEnquiryDetails::class);
 $app->delete('/enquiries/deleteenquiry/{lead_id}/{user_id}/{apiKey}',\App\Action\Enquiries\DeleteEnquiry::class);
  /* Tickets */

  $app->get('/tickets/gettickets', \App\Action\Tickets\GetTickets::class);
  $app->get('/tickets/getticketdetails/{ticket_id}', \App\Action\Tickets\GetTicketDetails::class);
  $app->post('/tickets/addticketdetails', \App\Action\Tickets\AddTicketDetails::class);
  $app->post('/tickets/addcomment', \App\Action\Tickets\AddComment::class);
  $app->get('/tickets/getticketreplies/{ticket_id}', \App\Action\Tickets\GetTicketReplies::class);
  $app->get('/tickets/getgenerallist/{category}', \App\Action\Tickets\GetGeneralList::class);

  /* Campaigns */

  $app->get('/campaigns/getcampaigns',\App\Action\Campaigns\GetCampaigns::class);
  $app->get('/campaigns/getcampaigndetails/{campaign_id}', \App\Action\Campaigns\GetCampaignDetails::class);
  $app->get('/campaigns/getallcampaigns', \App\Action\Campaigns\GetAllCampaigns::class);
  $app->get('/campaigns/getallcountries',\App\Action\Campaigns\GetAllCountries::class);
  $app->post('/campaigns/addcampaignsdetails',\App\Action\Campaigns\AddCampaignsDetails::class);
  $app->get('/campaigns/editcampaignsdetails/{campaign_id}',\App\Action\Campaigns\EditCampaignsDetails::class);
  $app->post('/campaigns/updatecampaignsdetails',\App\Action\Campaigns\UpdateCampaignsDetails::class);
  $app->delete('/campaigns/deletecampaigns/{campaign_id}/{user_id}/{apiKey}',\App\Action\Campaigns\DeleteCampaigns::class);
  $app->post('/campaigns/getcampaigndetaildata',\App\Action\Campaigns\GetCampaignDetailData::class);
  $app->get('/campaigns/getcampaignname/:campaign_id',\App\Action\Campaigns\GetCampainName::class);
  $app->post('/campaigns/adduploadcampaigndata',\App\Action\Campaigns\AddUploadCampaignData::class);
  $app->post('/campaigns/addsinglecampaigndata',\App\Action\Campaigns\AddSingleCampaignData::class);
  $app->get('/campaigns/getsinglecampaigndata/:campain_data_id',\App\Action\Campaigns\GetSingleCampaignData::class);
  $app->post('/campaigns/updatecampaigndata',\App\Action\Campaigns\UpdateCampaignData::class);
  $app->post('/campaigns/deletecampaigndata',\App\Action\Campaigns\DeleteCampaignData::class);
  $app->get('/campaigns/getopencampaigns/:branch_id',\App\Action\Campaigns\GetOpenCampaigns::class);
  $app->post('/campaigns/addfollowup',\App\Action\Campaigns\AddcampignFollowup::class);

  $app->get('/campaigns/getcampaignfollowups/:campaign_data_id',\App\Action\Campaigns\GetCampaignfollowups::class);



};