<?php
  /**
   *
   */
  class Sign extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();

      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->model('Users');
    }

    public function index()
    {
      if($this->session->userdata('username'))
      {
        
      }
    }
  }

 ?>
