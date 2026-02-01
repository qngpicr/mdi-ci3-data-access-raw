<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeviceSsrController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DeviceModel');
    }

    // GET /ssr/devices
    public function ssrDevices() {
        $devices = $this->DeviceModel->selectAllDevices();
        $data['deviceList'] = $devices;
        $this->load->view('ssr/ssr_device_total', $data);
    }
}
