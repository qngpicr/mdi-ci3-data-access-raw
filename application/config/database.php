<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
    'dsn'      => '',
    'hostname' => 'localhost',     // DB 서버 호스트
    'username' => 'cougar',        // DB 사용자명
    'password' => 'wild',          // DB 비밀번호
    'database' => 'mdi_db',        // DB 이름
    'dbdriver' => 'mysqli',        // 드라이버 (MySQLi)
    'dbprefix' => '',              // 테이블 prefix
    'pconnect' => FALSE,           // 영구 연결 여부
    'db_debug' => (ENVIRONMENT !== 'production'), // 디버그 모드
    'cache_on' => FALSE,           // 쿼리 캐시 여부
    'cachedir' => '',              // 캐시 디렉토리
    'char_set' => 'utf8mb4',       // 문자셋
    'dbcollat' => 'utf8mb4_general_ci', // Collation
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);
