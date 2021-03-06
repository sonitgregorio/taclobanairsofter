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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['authenticate'] = 'main/login_user';
$route['admin_home'] = 'admin/admin_home';
$route['logout'] = 'admin/logout';

/*
 *  Products Routes
 */
$route['products'] = 'admin/products';
$route['save_products'] = 'admin/save_products';
$route['products/edit/(:num)'] = 'admin/products/$1';
$route['products/delete/(:num)'] = 'admin/delete_products/$1';

/*
 *User management Routes
 */
$route['userManagement'] = 'admin/userManagement';
$route['userManagement/edit/(:num)'] = 'admin/userManagement/$1';
$route['save_contact'] = 'admin/save_contact';
$route['userManagement/delete/(:num)'] = 'admin/deleteContact/$1';
$route['account_settings'] = 'admin/account_settings';
$route['save_account'] = 'admin/save_account';

/*
 * Store List
 */

$route['store'] = 'admin/store_list';
$route['save_to_cart'] = 'admin/save_to_cart';
$route['my_cart'] = 'admin/my_cart';
$route['delete_from_cart/(:num)'] = 'admin/delete_from_cart/$1';
$route['update_cart'] = 'admin/update_cart';
$route['viewOrders'] = 'admin/viewOrders';
$route['paid_item/(:num)'] = 'admin/paid_item/$1';
$route['sales'] = 'admin/sales';
