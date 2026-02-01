<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberSsrController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MemberModel'); // DB 모델 로드
    }

    // GET /ssr/members
    public function ssrMembers() {
        $data['memberList'] = $this->MemberModel->selectAllMembers();
        $this->load->view('ssr/ssr_member_total', $data);
    }
}
