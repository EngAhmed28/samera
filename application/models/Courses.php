<?php
class Courses extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function reserve(){
        $data['traine_name']=$this->input->post('traine_name');
        $data['traine_sex']=$this->input->post('traine_sex');
        $data['traine_phone'] = $this->input->post('traine_phone');
        $data['traine_identity'] = $this->input->post('traine_identity');
        $data['traine_email'] = $this->input->post('traine_email');
        $data['traine_age'] = $this->input->post('traine_age');
        $data['traine_jop'] = $this->input->post('traine_jop');
        $data['reserve_date'] = time();
       return $this->db->insert('trainees',$data);

    }

}