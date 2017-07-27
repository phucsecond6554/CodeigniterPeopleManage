<?php
  /**
   * Controller nay dung de xu ly them sua xoa danh sach bla bla
   */
  class Data extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();
      $this->load->library(array('session','form_validation'));
      $this->load->helper('url');
      $this->load->model('People');
    }

    public function index()
    {
      if(!$this->session->userdata('username')) // Kiem tra da dang nhap chua
      {
        redirect('Sign/index'); // Neu chua tro ve trang dang nhap
      }else { // Neu roi thi goi danh sach bla
        $member_data = array();
        $member_data['member'] = $this->People->get_all_data(); // Lay danh sach thanh vien
        $this->load->view('data_list', $member_data); // Goi trang danh sach
      }
    }

    /*
      * add_member la action cua add_member form
    */
    public function add_member()
    {
      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('job','Job','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('add_member_submit','Add Member','callback_checkdate');

      if($this->form_validation->run() === false)
      {
        $this->load->view('Member/add_member');
      }else {

      }
    }

    public function checkdate()
    {
      $date = $this->input->post('date');
      $month = $this->input->post('month');
      $year = $this->input->post('year');

      if(checkdate($month, $date, $year))
      {
        return true;
      }else {
        $this->form_validation->set_message('checkdate','Ngay sinh khong hop le');
        return false;
      }
    }


  }

 ?>
