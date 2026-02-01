<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MemberModel'); // DB 모델 로드
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로
    }

    // GET /api/members
    public function index() {
        $members = $this->MemberModel->selectAllMembers();
        echo json_encode($members);
    }

    // GET /api/members/{id}
    public function show($id) {
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
        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->MemberModel->insertMember($data);
        $member = $this->MemberModel->selectMemberById($id);

        $this->output->set_status_header(201);
        echo json_encode($member);
    }

    // PUT /api/members/{id}
    public function update($id) {
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
        $affected = $this->MemberModel->deleteMember($id);
        if ($affected > 0) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Member not found']);
        }
    }
}
