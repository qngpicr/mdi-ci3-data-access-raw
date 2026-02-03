<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MemberModel'); // DB 모델 로드
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로

        // 공통적으로 모든 요청에 CORS 헤더 추가
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        // header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    // GET /api/members
    public function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $members = $this->MemberModel->selectAllMembers();
        echo json_encode($members);
    }

    // GET /api/members/{id}
    public function show($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $member = $this->MemberModel->selectMemberById($id);
        if ($member) {
            echo json_encode($member);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Member not found']);
        }
    }

    // POST /api/members
    public function create() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->MemberModel->insertMember($data);
        $member = $this->MemberModel->selectMemberById($id);

        $this->output->set_status_header(201);
        echo json_encode($member);
    }

    // PUT /api/members/{id}
    public function update($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $affected = $this->MemberModel->updateMember($id, $data);

        if ($affected > 0) {
            $member = $this->MemberModel->selectMemberById($id);
            echo json_encode($member);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Member not found or not updated']);
        }
    }

    // DELETE /api/members/{id}
    public function delete($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $affected = $this->MemberModel->deleteMember($id);
        if ($affected > 0) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Member not found']);
        }
    }
}
