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
$route['default_controller'] = 'Login';
$route['404_override'] = 'C_menu';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Login/login';
$route['recuperar'] = 'Login/recuperar_view';
$route['recuperar_action'] = 'Login/recover';
$route['cambiar_clave/(:any)'] = 'Login/confirmar_view/$1';
$route['confirmar'] = 'Login/confirmar_action';
$route['logout'] = 'Login/logout';
$route['perfil'] = 'C_perfil';
$route['agenda'] = 'C_agenda';
$route['simulacion'] = 'C_simulacion';

$route['reg_proveedor'] = 'C_proveedor';
$route['proveedor'] = 'C_proveedor';
$route['proveedor/registrar'] = 'C_proveedor/registrar';
$route['servicio'] = 'C_servicio';
$route['certificado'] = 'C_certificado';
$route['menu'] = 'C_menu';

$route['reg_cliente'] = 'C_cliente';
$route['cliente/registrar'] = 'C_cliente/registrar';
$route['usuariosxcliente'] = 'C_usuarios_cliente';

$route['ofertas_cliente'] = 'C_ofertas_cliente';
$route['requerimiento'] = 'C_requerimiento';

$route['ofertas_proveedor'] = 'C_ofertas_proveedor';

$route['evaluacion'] = 'C_evaluacion';
