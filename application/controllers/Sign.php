<?php
  /**
   * Controller nay de xu ly viec dang nhap, dang ky
   */
  class Sign extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();

      $this->load->helper('url');
      $this->load->library(array('form_validation','session'));
      $this->load->model('Users');
    }

    public function index()
    {
      if($this->session->userdata('username'))
      {
        //$this->load->view('data_list');
        redirect('Data');
      }else {
        $this->load->view('Signin');
      }
    }

/*
  # Action cua form Signin
*/
    public function sign_in()
    {
      //Set rules kiem tra thong tin nhap vao
      $this->form_validation->set_rules('username','Username','trim|required');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('signin_submit','Sign in','callback_check_signin');

      if($this->form_validation->run() == false) // Neu dang nhap khong thanh cong
      {
        $this->load->view('Signin');
      }else { // Dang nhap thanh cong
        $username = $this->input->post('username'); // Lay username

        $userdata = $this->Users->get_userdata($username); // Lay thong tin user(ID, Usertype)

        //Luu session thong tin user da dang nhap
        $this->session->set_userdata(array('id'=>$userdata->id,
                                            'username'=>$username,
                                            'usertype' => $userdata->usertype));
        redirect('Data');
        //$this->load->view('data_list'); // Goi bla bla bla
      }
    }

/*
  # Action cua form Signup
*/
    public function sign_up()
    {
      //Set rule thong tin dang ky
      $this->form_validation->set_rules('username','Username','callback_valid_username');
      $this->form_validation->set_rules('password','Password','trim|required');
      $this->form_validation->set_rules('passconf','Password Confirm','trim|required|matches[password]');
      $this->form_validation->set_rules('email','Email','required|valid_email');
      $this->form_validation->set_rules('phonenumber','Phone number','required');

      if($this->form_validation->run() == false) // Neu dang ky that bai
      {
        $this->load->view('Signup');
      }else { // Dang kky thanh cong
        $data = array(
          'username' => $this->input->post('username'),
          'pass' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
          'email' => $this->input->post('email'),
          'phonenumber' => $this->input->post('phonenumber'),
          'usertype' => $this->input->post('usertype')
        ); // Lay thong tin da dang ky

        if($this->Users->sign_up_user($data)) // Kiem tra neu insert db thanh cong
        {
          $userdata = $this->Users->get_userdata($data['username']);// Lay thong tin user(ID, Usertype)

          //Luu session thong tin user da dang ky
          $this->session->set_userdata(array('id'=>$userdata->id,
                                              'username'=>$data['username'],
                                              'usertype' => $userdata->usertype));

          $this->load->view('register_success',array('username'=>$data['username']));
        }

      }
    }

/*
  # Function check_signin dung de kiem tra username va password co dung khong
*/
    public function check_signin()
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      if($this->Users->sign_in($username, $password))
      {
        return true;
      }else {
        $this->form_validation->set_message('check_signin','Username hoac Password khong dung');
        return false;
      }
    }

    /*
      * Ham valid_username dung de kiem tra nguoi dung hop le khong
      * Nguoi dung hop le la username chua co nguoi dang ky
    */
    public function valid_username()
    {
      $username = $this->input->post('username');

      if($this->Users->check_valid_user($username))
      {
        return true;
      }else {
        $this->form_validation->set_message('valid_username','User da co nguoi su dung');
        return false;
      }
    }
  }

 ?>
