<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpuSsrController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CpuModel');
    }

    public function ssrCpus() {
        $data['cpuList'] = $this->CpuModel->selectAllCpus();
        $this->load->view('ssr/ssr_cpu_total', $data);
    }
}
