<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'MainController/index';
$route['routes'] = 'RouteInfoController/index';

// CSR (Client-Side-Rendering)
$route['csr/cpus']    = 'CpuCsrController/csrCpus';
$route['csr/devices'] = 'DeviceCsrController/csrDevices';
$route['csr/members'] = 'MemberCsrController/csrMembers';

// SSR (Server-Side-Rendering)
$route['ssr/cpus']    = 'CpuSsrController/ssrCpus';
$route['ssr/devices'] = 'DeviceSsrController/ssrDevices';
$route['ssr/members'] = 'MemberSsrController/ssrMembers';

// REST-API : CPU
$route['api/cpus']['GET']           = 'CpuRestController/index';
$route['api/cpus/(:num)']['GET']    = 'CpuRestController/show/$1';
$route['api/cpus']['POST']          = 'CpuRestController/create';
$route['api/cpus/(:num)']['PUT']    = 'CpuRestController/update/$1';
$route['api/cpus/(:num)']['DELETE'] = 'CpuRestController/delete/$1';

// REST-API : Device
$route['api/devices']['GET']           = 'DeviceRestController/index';
$route['api/devices/(:num)']['GET']    = 'DeviceRestController/show/$1';
$route['api/devices']['POST']          = 'DeviceRestController/create';
$route['api/devices/(:num)']['PUT']    = 'DeviceRestController/update/$1';
$route['api/devices/(:num)']['DELETE'] = 'DeviceRestController/delete/$1';

// REST-API : Member
$route['api/members']['GET']           = 'MemberRestController/index';
$route['api/members/(:num)']['GET']    = 'MemberRestController/show/$1';
$route['api/members']['POST']          = 'MemberRestController/create';
$route['api/members/(:num)']['PUT']    = 'MemberRestController/update/$1';
$route['api/members/(:num)']['DELETE'] = 'MemberRestController/delete/$1';
