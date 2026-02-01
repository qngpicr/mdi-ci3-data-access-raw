<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpuCsrController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // GET /csr/cpus
    public function csrCpus() {
        // 단순히 뷰만 반환 (데이터는 JS에서 REST API 호출)
        $this->load->view('csr/csr_cpu_total');
    }
}
