<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // DB 연결 보장
    }

    // 전체 조회
    public function selectAllMembers() {
        $sql = "SELECT id_member, id, pass, name, email, regist_day, role, status, email_verified, 
                       fail_count, last_login, updated_at, deleted_at 
                  FROM member";
        $query = $this->db->query($sql);
        return $query->result_array(); // 배열 반환
    }

    // 단일 조회
    public function selectMemberById($id) {
        $sql = "SELECT id_member, id, pass, name, email, regist_day, role, status, email_verified, 
                       fail_count, last_login, updated_at, deleted_at 
                  FROM member WHERE id_member = ?";
        $query = $this->db->query($sql, array($id));
        return $query->row_array(); // 단일 레코드
    }

    // 삽입
    public function insertMember($data) {
        $sql = "INSERT INTO member (id, pass, name, email, role, status, email_verified) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array(
            $data['id'],
            $data['pass'],
            $data['name'],
            $data['email'],
            $data['role'],
            $data['status'],
            $data['email_verified']
        ));
        return $this->db->insert_id(); // 새로 생성된 PK 반환
    }

    // 수정
    public function updateMember($id, $data) {
        $sql = "UPDATE member 
                   SET pass=?, name=?, email=?, role=?, status=?, email_verified=?, 
                       fail_count=?, last_login=?, updated_at=?, deleted_at=? 
                 WHERE id_member=?";
        $this->db->query($sql, array(
            $data['pass'],
            $data['name'],
            $data['email'],
            $data['role'],
            $data['status'],
            $data['email_verified'],
            isset($data['fail_count']) ? $data['fail_count'] : 0,
            isset($data['last_login']) ? $data['last_login'] : null,
            isset($data['updated_at']) ? $data['updated_at'] : null,
            isset($data['deleted_at']) ? $data['deleted_at'] : null,
            $id
        ));
        return $this->db->affected_rows(); // 수정된 행 수
    }

    // 삭제
    public function deleteMember($id) {
        $sql = "DELETE FROM member WHERE id_member=?";
        $this->db->query($sql, array($id));
        return $this->db->affected_rows(); // 삭제된 행 수
    }
}
