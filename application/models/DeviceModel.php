<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeviceModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // DB 연결 보장
    }

    // 전체 조회
    public function selectAllDevices() {
        $sql = "SELECT id_device, name_device, id_cpu, lineup_device, release_device, weight_device, type_code_device, manf_code_device 
                FROM device";
        $query = $this->db->query($sql);
        return $query->result_array(); // 배열 반환
    }

    // 단일 조회
    public function selectDeviceById($id) {
        $sql = "SELECT id_device, name_device, id_cpu, lineup_device, release_device, weight_device, type_code_device, manf_code_device 
                FROM device WHERE id_device = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array(); // 단일 레코드
    }

    // 삽입
    public function insertDevice($data) {
        $sql = "INSERT INTO device (name_device, id_cpu, lineup_device, release_device, weight_device, type_code_device, manf_code_device) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array(
            $data['name_device'],
            $data['id_cpu'],
            $data['lineup_device'],
            $data['release_device'],
            $data['weight_device'],
            $data['type_code_device'],
            $data['manf_code_device']
        ));
        return $this->db->insert_id(); // 새로 생성된 PK 반환
    }

    // 수정
    public function updateDevice($id, $data) {
        $sql = "UPDATE device 
                   SET name_device=?, id_cpu=?, lineup_device=?, release_device=?, weight_device=?, type_code_device=?, manf_code_device=? 
                 WHERE id_device=?";
        $this->db->query($sql, array(
            $data['name_device'],
            $data['id_cpu'],
            $data['lineup_device'],
            $data['release_device'],
            $data['weight_device'],
            $data['type_code_device'],
            $data['manf_code_device'],
            $id
        ));
        return $this->db->affected_rows(); // 수정된 행 수
    }

    // 삭제
    public function deleteDevice($id) {
        $sql = "DELETE FROM device WHERE id_device=?";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows(); // 삭제된 행 수
    }
}
