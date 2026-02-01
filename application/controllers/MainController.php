<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // GET /
    public function index() {
        // index 뷰 반환
        $this->load->view('index');
    }
}
