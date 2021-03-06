<?php
  /** Class nay dung de xu li danh sach nguoi
   *
   */
  class People extends CI_Model
  {
    private $table_name;

    function __construct()
    {
      parent::__construct();
      $this->table_name = 'People_Data';
      $this->load->database();
    }

    public function get_all_data()
    {
      $query = $this->db->get($this->table_name);
      return $query->result();
    }

    public function get_member_data($id)
    {
      $this->db->select('id,name,birthday,email,job');
      $this->db->where('id',$id);
      $query = $this->db->get($this->table_name);

      return $query->row();
    }

    public function insert_data($peopledata)
    {
      return $this->db->insert($this->table_name, $peopledata);
    }

    public function update_data($data,$id)
    {
      $this->db->where('id',$id);
      return $this->db->update($this->table_name,$data);
    }

    public function delete_data($id)
    {
      return $this->db->delete($this->table_name, array('id'=>$id));
    }
  }

 ?>
