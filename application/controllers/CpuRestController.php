<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpuRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('CpuModel');
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로
    }

    // GET /api/cpus
    public function index() {
        $cpus = $this->CpuModel->selectAllCpus();
        echo json_encode($cpus);
    }

    // GET /api/cpus/{id}
    public function show($id) {
        $cpu = $this->CpuModel->selectCpuById($id);
        if ($cpu) {
            echo json_encode($cpu);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'CPU not found']);
        }
    }

    // POST /api/cpus
    public function create() {
        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->CpuModel->insertCpu($data);
        $cpu = $this->CpuModel->selectCpuById($id);

        $this->output->set_status_header(201);
        echo json_encode($cpu);
    }

    // PUT /api/cpus/{id}
    public function update($id) {
        $data = json_decode($this->input->raw_input_stream, true);
        $affected = $this->CpuModel->updateCpu($id, $data);

        if ($affected > 0) {
            $cpu = $this->CpuModel->selectCpuById($id);
            echo json_encode($cpu);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'CPU not found or not updated']);
        }
    }

    // DELETE /api/cpus/{id}
    public function delete($id) {
        $affected = $this->CpuModel->deleteCpu($id);
        if ($affected > 0) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'CPU not found']);
        }
    }
}
