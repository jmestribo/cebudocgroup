<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){
        $this->settings();
    }

    function settings(){
      
        $data['header'] = 'include/header';        
        $data['body'] = 'errors/html/custom_404';

        $data['footer'] = 'include/footer1';
        $this->load->view('laboratory/template', $data);
    }










































}
