<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeviceRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DeviceModel');
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로

        // 공통적으로 모든 요청에 CORS 헤더 추가
        // header("Access-Control-Allow-Origin: *");
        // header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        // header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    // GET /api/devices
    public function index() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $devices = $this->DeviceModel->selectAllDevices();
        $this->output->set_output(json_encode($devices));
    }

    // GET /api/devices/{id}
    public function show($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $device = $this->DeviceModel->selectDeviceById($id);
        if ($device) {
            $this->output->set_output(json_encode($device));
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'Device not found']));
        }
    }

    // POST /api/devices
    public function create() {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->DeviceModel->insertDevice($data);
        $device = $this->DeviceModel->selectDeviceById($id);

        $this->output->set_status_header(201);
        $this->output->set_output(json_encode($device));
    }

    // PUT /api/devices/{id}
    public function update($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $data = json_decode($this->input->raw_input_stream, true);
        $success = $this->DeviceModel->updateDevice($id, $data);

        if ($success) {
            $device = $this->DeviceModel->selectDeviceById($id);
            $this->output->set_output(json_encode($device));
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'Device not found or not updated']));
        }
    }

    // DELETE /api/devices/{id}
    public function delete($id) {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $success = $this->DeviceModel->deleteDevice($id);
        if ($success) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            $this->output->set_output(json_encode(['error' => 'Device not found']));
        }
    }
}
