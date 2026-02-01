<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CpuModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // DB 연결
    }

    public function selectAllCpus() {
        $sql = "SELECT id_cpu, name_cpu, release_cpu, core_cpu, thread_cpu, maxghz_cpu, minghz_cpu, type_code_cpu, manf_code_cpu FROM cpu";
        $query = $this->db->query($sql);
        return $query->result_array(); // 배열 반환
    }

    public function selectCpuById($id) {
        $sql = "SELECT id_cpu, name_cpu, release_cpu, core_cpu, thread_cpu, maxghz_cpu, minghz_cpu, type_code_cpu, manf_code_cpu 
                FROM cpu WHERE id_cpu = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array(); // 단일 레코드
    }

    public function insertCpu($data) {
        $sql = "INSERT INTO cpu (name_cpu, release_cpu, core_cpu, thread_cpu, maxghz_cpu, minghz_cpu, type_code_cpu, manf_code_cpu) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array(
            $data['name_cpu'],
            $data['release_cpu'],
            $data['core_cpu'],
            $data['thread_cpu'],
            $data['maxghz_cpu'],
            $data['minghz_cpu'],
            $data['type_code_cpu'],
            $data['manf_code_cpu']
        ));
        return $this->db->insert_id(); // 새로 생성된 PK 반환
    }

    public function updateCpu($id, $data) {
        $sql = "UPDATE cpu SET name_cpu=?, release_cpu=?, core_cpu=?, thread_cpu=?, maxghz_cpu=?, minghz_cpu=?, type_code_cpu=?, manf_code_cpu=? 
                WHERE id_cpu=?";
        $this->db->query($sql, array(
            $data['name_cpu'],
            $data['release_cpu'],
            $data['core_cpu'],
            $data['thread_cpu'],
            $data['maxghz_cpu'],
            $data['minghz_cpu'],
            $data['type_code_cpu'],
            $data['manf_code_cpu'],
            $id
        ));
        return $this->db->affected_rows(); // 수정된 행 수
    }

    public function deleteCpu($id) {
        $sql = "DELETE FROM cpu WHERE id_cpu=?";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows(); // 삭제된 행 수
    }
}
