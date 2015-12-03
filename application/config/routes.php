<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

#APIs
#User
$route['api/v1/user.list'] = 'api/v1/user/user_list';
$route['api/v1/user.check'] = 'api/v1/user/user_check';
$route['api/v1/user.list'] = 'api/v1/user/user_list';
$route['api/v1/user.add'] = 'api/v1/user/user_add';
$route['api/v1/user.detail'] = 'api/v1/user/user_detail';
$route['api/v1/user.edit'] = 'api/v1/user/user_edit';
$route['api/v1/user.delete'] = 'api/v1/user/user_delete';

#Role
$route['api/v1/role.list'] = 'api/v1/user/role_list';
$route['api/v1/role.add'] = 'api/v1/user/role_add';
$route['api/v1/role.detail'] = 'api/v1/user/role_detail';
$route['api/v1/role.edit'] = 'api/v1/user/role_edit';
$route['api/v1/role.delete'] = 'api/v1/user/role_delete';

#RESTs
#Role
$route['rest/v1/role.list'] = 'rest/v1/user/role_list';
$route['rest/v1/role.add'] = 'rest/v1/user/role_add';
$route['rest/v1/role.detail'] = 'rest/v1/user/role_detail';
$route['rest/v1/role.edit'] = 'rest/v1/user/role_edit';
$route['rest/v1/role.delete'] = 'rest/v1/user/role_delete';
