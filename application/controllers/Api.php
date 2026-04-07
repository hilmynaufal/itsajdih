<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    protected $response = [
        'status' => 200,
        'message' => '',
        'data' => []
    ];

    public function __construct() {
        parent::__construct();
        
        // Enable CORS
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        
        // Handle OPTIONS request
        if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
            exit();
        }
        
        // Load model jika diperlukan
        // $this->load->model('product_model');
    }
    
    protected function json_response() {
        $this->output
            ->set_content_type('application/json')
            ->set_status_header($this->response['status'])
            ->set_output(json_encode($this->response));
    }
}