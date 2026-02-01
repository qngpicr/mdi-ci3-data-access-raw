<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RouteInfoController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->output->set_content_type('application/json');
    }

    // GET /routes
    public function index() {
        // routes.php 파일을 include 해서 $route 배열 가져오기
        include(APPPATH.'config/routes.php');

        $routes = [];
        foreach ($route as $uri => $target) {
            // CI3 기본 라우팅은 HTTP Method 구분이 없으므로 ALL로 표시
            $routes[] = [
                'uri'    => $uri,
                'method' => 'ALL',
                'target' => $target
            ];
        }

        echo json_encode($routes);
    }
}
