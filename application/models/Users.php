<?php
  /** Class nay dung de xu ly db dang ky dang nhap tai khoan
   *
   */
  class Users extends CI_Model
  {
    private $table_name;

    function __construct()
    {
      parent::__construct();
      $this->table_name = 'UserInfo';
      $this->load->database();
    }

/*
  # Ham check_valid_user dung de kiem tra username da co chua
  # Neu chua co la hop le co the dang ky duoc (return true)
  # Con neu co roi thi khong cho phep dang ky (return false)
*/
    public function check_valid_user($username)
    {
      $this->db->select('username');
      $this->db->where('username',$username);
      $this->db->from($this->table_name);

      return $this->db->count_all_results() == 0;
    }

/*
  # Ham sign_up_user dung de dua du lieu nguoi dung dang ky vao database
*/
    public function sign_up_user($userdata)
    {
      return $this->db->insert($this->table_name, $userdata);
    }

    public function sign_in($username, $password)
    {
      $this->db->select('username,pass');
      $this->db->where('username',$username);
      //$this->db->from($this->table_name);

      if($this->db->count_all_results($this->table_name,false) !== 1) // Neu khong co username
      {
        return false; // Thi return false khong cho phep dang nhap
      }else {     // Nguoc lai thi co username kiem tra xem password co trung khop khong
        $query = $this->db->get($this->table_name);
        $row = $query->row(); // Get data cua username do

        return password_verify($password,$row->pass); // Kiem tra password
      }

    }
  }

 ?>
