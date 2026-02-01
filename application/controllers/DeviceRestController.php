<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeviceRestController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DeviceModel');
        $this->output->set_content_type('application/json'); // 모든 응답을 JSON으로
    }

    // GET /api/devices
    public function index() {
        $devices = $this->DeviceModel->selectAllDevices();
        echo json_encode($devices);
    }

    // GET /api/devices/{id}
    public function show($id) {
        $device = $this->DeviceModel->selectDeviceById($id);
        if ($device) {
            echo json_encode($device);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Device not found']);
        }
    }

    // POST /api/devices
    public function create() {
        $data = json_decode($this->input->raw_input_stream, true);
        $id = $this->DeviceModel->insertDevice($data);
        $device = $this->DeviceModel->selectDeviceById($id);

        $this->output->set_status_header(201);
        echo json_encode($device);
    }

    // PUT /api/devices/{id}
    public function update($id) {
        $data = json_decode($this->input->raw_input_stream, true);
        $success = $this->DeviceModel->updateDevice($id, $data);

        if ($success) {
            $device = $this->DeviceModel->selectDeviceById($id);
            echo json_encode($device);
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Device not found or not updated']);
        }
    }

    // DELETE /api/devices/{id}
    public function delete($id) {
        $success = $this->DeviceModel->deleteDevice($id);
        if ($success) {
            $this->output->set_status_header(204); // No Content
        } else {
            $this->output->set_status_header(404);
            echo json_encode(['error' => 'Device not found']);
        }
    }
}
