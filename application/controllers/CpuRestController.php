<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpuRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CpuModel');
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로

        // 공통적으로 모든 요청에 CORS 헤더 추가
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        // header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    // GET /api/cpus
    public function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $cpus = $this->CpuModel->selectAllCpus();
        $this->output->set_output(json_encode($cpus));
    }

    // GET /api/cpus/{id}
    public function show($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $cpu = $this->CpuModel->selectCpuById($id);
        if ($cpu) {
            $this->output->set_output(json_encode($cpu));
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'CPU not found']));
        }
    }

    // POST /api/cpus
    public function create() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->CpuModel->insertCpu($data);
        $cpu = $this->CpuModel->selectCpuById($id);

        $this->output->set_status_header(201);
        $this->output->set_output(json_encode($cpu));
    }

    // PUT /api/cpus/{id}
    public function update($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $affected = $this->CpuModel->updateCpu($id, $data);

        if ($affected > 0) {
            $cpu = $this->CpuModel->selectCpuById($id);
            $this->output->set_output(json_encode($cpu));
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'CPU not found or not updated']));
        }
    }

    // DELETE /api/cpus/{id}
    public function delete($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $affected = $this->CpuModel->deleteCpu($id);
        if ($affected > 0) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'CPU not found']));
        }
    }
}
