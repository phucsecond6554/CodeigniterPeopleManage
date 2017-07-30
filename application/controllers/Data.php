<?php
defined('BASEPATH') OR exit('No direct script access allowed');


  /**
   * Controller nay dung de xu ly them sua xoa danh sach bla bla
   */
  class Data extends CI_Controller
  {
    protected $_data;
    function __construct()
    {
      parent::__construct();
      $this->load->library(array('session','form_validation'));
      $this->load->helper('url');
      $this->load->model('People');

      if(!$this->session->userdata('username'))
      {
        redirect('Sign/sign_in');
      }
    }

    public function index()
    {
      $this->_data['title'] = 'Data List';
      $this->_data['subview'] = 'Member/data_list';
      if(!$this->session->userdata('username')) // Kiem tra da dang nhap chua
      {
        redirect('Sign/index'); // Neu chua tro ve trang dang nhap
      }else { // Neu roi thi goi danh sach bla
        $this->_data['member']= $this->People->get_all_data(); // Lay danh sach thanh vien
        $this->_data['mess'] = $this->session->flashdata('message');
        $this->_data['usertype'] = $this->session->userdata('usertype');
        $this->load->view('main_layout', $this->_data); // Goi trang danh sach
      }
    }

    /*
      * add_member la action cua add_member form
    */
    public function add_member()
    {
      $this->_data['title'] = 'Them thanh vien';
      $this->_data['subview'] = 'Member/add_member';

      // Set rules form validation
      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('job','Job','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('add_member_submit','Add Member','callback_checkdate');

      if($this->form_validation->run() === false)
      {
        $this->load->view('main_layout', $this->_data);
      }else {
        $birth = $this->input->post('year');
        $birth .= '/'.$this->input->post('month');
        $birth .= '/'.$this->input->post('date'); // Ngay sinh

        $insertdata = array(
          'name' => $this->input->post('name'),
          'job' => $this->input->post('job'),
          'email' => $this->input->post('email'),
          'birthday' => $birth
        );

        if($this->People->insert_data($insertdata))
        {
          $this->session->set_flashdata('message','Them du lieu thanh cong');
          redirect('Data');
        }

      }
    }

    public function Delete($id)
    {
      if($this->session->userdata('usertype') != 1)
      {
        die('Ban khong duoc quyen xoa data');
      } // Khong duoc quyen xoa du lieu

      if($this->People->delete_data($id))
      {
        $this->session->set_flashdata('message','Xoa du lieu thanh cong');
        redirect('Data/index');
      }else {
        $this->session->set_flashdata('message','Co loi khi xoa du lieu');
        redirect('Data/index');
      }
    }

    public function Edit($id)
    {
      $this->_data['title'] = 'Sua thong tin thanh vien';
      $this->_data['subview'] = 'Member/edit_member';

      $this->_data['member'] = $this->People->get_member_data($id);

      $this->form_validation->set_rules('name','Name','required');
      $this->form_validation->set_rules('job','Job','required');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('add_member_submit','Add Member','callback_checkdate');

      if($this->form_validation->run() == false)
      {
        $this->load->view('main_layout',$this->_data);
      }else {
        $birth = $this->input->post('year');
        $birth .= '/'.$this->input->post('month');
        $birth .= '/'.$this->input->post('date'); // Ngay sinh

        $updatedata = array(
          'name' => $this->input->post('name'),
          'job' => $this->input->post('job'),
          'email' => $this->input->post('email'),
          'birthday' => $birth
        );

        if($this->People->update_data($updatedata, $id))
        {
          $this->session->set_flashdata('message','Update du lieu thanh cong');
          redirect('Data/index');
        }else {
          $this->session->set_flashdata('message','Co loi khi update du lieu');
          redirect('Data/index');
        }
      }


    }

    /*
      * checkdate de kiem tra tinh hop le cua ngay thang
    */
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
