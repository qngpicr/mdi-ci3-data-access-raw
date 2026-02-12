<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouteInfoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // 응답을 JSON으로 지정
        $this->output->set_content_type('application/json');

        // CORS 허용 헤더 추가
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
    }

    // GET /routes
    public function index() {
        // routes.php 파일을 include 해서 $route 배열 가져오기
        include(APPPATH.'config/routes.php');

        $routes = [];

        foreach ($route as $uri => $target) {
            // target이 배열이면 method별로 정의된 것
            if (is_array($target)) {
                foreach ($target as $method => $action) {
                    $routes[] = [
                        'uri'    => $uri,
                        'method' => strtoupper($method),
                        'target' => $action
                    ];
                }
            } else {
                // 단일 문자열이면 method 구분 없음 → ALL
                $routes[] = [
                    'uri'    => $uri,
                    'method' => 'ALL',
                    'target' => $target
                ];
            }
        }

        echo json_encode($routes);
    }
}
