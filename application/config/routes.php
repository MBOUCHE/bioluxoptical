<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Bioluxoptical';

$route['(:any)'] = 'Bioluxoptical/$1';

$route['panel_administrateur'] = 'admin/ControlPanel';

$route['(panel_administrateur/:any)'] = 'admin/ControlPanel/$1';

$route['CustomerPanel/'] = 'customer/CustomerPanel/$1';

//$route['generation/'] = 'Bioluxoptical/GeneratePdfController/$1';

$route['404_override'] = 'Bioluxoptical/error404';
$route['translate_uri_dashes'] = FALSE;


