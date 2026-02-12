<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'MainController/index';
$route['routes'] = 'RouteInfoController/index';

// CSR (Client-Side-Rendering)
$route['csr/cpus']    = ['GET' => 'CpuCsrController/csrCpus'];
$route['csr/devices'] = ['GET' => 'DeviceCsrController/csrDevices'];
$route['csr/members'] = ['GET' => 'MemberCsrController/csrMembers'];

// SSR (Server-Side-Rendering)
$route['ssr/cpus']    = ['GET' => 'CpuSsrController/ssrCpus'];
$route['ssr/devices'] = ['GET' => 'DeviceSsrController/ssrDevices'];
$route['ssr/members'] = ['GET' => 'MemberSsrController/ssrMembers'];


// REST-API : CPU
$route['api/cpus'] = [
    'GET'    => 'CpuRestController/index',
    'POST'   => 'CpuRestController/create'
];
$route['api/cpus/(:num)'] = [
    'GET'    => 'CpuRestController/show/$1',
    'PUT'    => 'CpuRestController/update/$1',
    'DELETE' => 'CpuRestController/delete/$1'
];

// REST-API : Device
$route['api/devices'] = [
    'GET'    => 'DeviceRestController/index',
    'POST'   => 'DeviceRestController/create'
];
$route['api/devices/(:num)'] = [
    'GET'    => 'DeviceRestController/show/$1',
    'PUT'    => 'DeviceRestController/update/$1',
    'DELETE' => 'DeviceRestController/delete/$1'
];

// REST-API : Member
$route['api/members'] = [
    'GET'    => 'MemberRestController/index',
    'POST'   => 'MemberRestController/create'
];
$route['api/members/(:num)'] = [
    'GET'    => 'MemberRestController/show/$1',
    'PUT'    => 'MemberRestController/update/$1',
    'DELETE' => 'MemberRestController/delete/$1'
];
