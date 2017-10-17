<?php
	
    class Add_team  extends CI_Model

{

    public function __construct() {

        parent::__construct();

    }
        public  function record_count(){
        return $this->db->count_all("vounter_other");

    }
      public function select($admin_id){
        $this->db->select('*');
        $this->db->from('vounter_other');
         $this->db->where('vounter_id',$admin_id);
        $this->db->order_by('id','DESC');
        
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    public function insert(){
                 //team_name
             if($_SESSION["type"]==1){
         $data['vounter_id']=$this->input->post('leader');    
             } elseif($_SESSION["type"]!=1){
          $data['vounter_id']=$_SESSION["vounter_id"];          
             }   
         $data['team_name']=$this->input->post('team_name');
         $data['name']=$this->input->post('mumber_name');
         $data['gender']=$this->input->post('gender');
         $data['card_num']=$this->input->post('segl_madny');
         $data['tele']=$this->input->post('telephone');
         $data['mob']=$this->input->post('mobile');
         $data['date']=strtotime(date("d-m-Y",time()));
         $data['date_s']=time();
         $data['publisher']=$_SESSION['user_name'];
          $this->db->insert('vounter_other',$data);
         
    }
    public  function get_gender_name(){
        $this->db->select('*');
        $this->db->from('all_defined');
        $this->db->order_by('id','DESC');
       
        $query= $this->db->get();
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
            }
            return $data;
        }
        
        return ;
    }
    
    //-------------------------------
      public function getById($id){
        $h = $this->db->get_where('vounter_other', array('id'=>$id));
        return $h->row_array();
    }
    
        public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('vounter_other');

    }
    //=======================================
     public function update($id){
         //$data['vounter_id']=$_SESSION['user_id'];
                if($_SESSION["type"]==1){
         $data['vounter_id']=$this->input->post('leader');    
             } elseif($_SESSION["type"]!=1){
          $data['vounter_id']=$_SESSION["vounter_id"];          
             }   
         $data['team_name']=$this->input->post('team_name');
         $data['name']=$this->input->post('mumber_name');
         $data['gender']=$this->input->post('gender');
         $data['card_num']=$this->input->post('segl_madny');
         $data['tele']=$this->input->post('telephone');
         $data['mob']=$this->input->post('mobile');
         $data['date']=strtotime(date("d-m-Y",time()));
         $data['date_s']=time();
         //$data['publisher']=$_SESSION['user_name'];  
     $this->db->where('id', $id); 
     $this->db->update('vounter_other',$data);
    }
    
    
    public function all_subs(){
        $query = $this->db->query("SELECT * FROM `volunteer` WHERE `suspend`=1 AND `volunteer_type`=2");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
              $query2 = $this->db->query("SELECT * FROM `vounter_other` WHERE `vounter_id`=".$row->id);
                $sub_data=array();
                        foreach ($query2->result() as $row2) {
                            $sub_data[$row2->id] = $row2->name;          
                        }
                 $data[$row->id] =$sub_data;
         }
            return $data;
        }
        return false;
        
    }
    
          public function data_vounter_other(){
        $this->db->select('*');
        $this->db->from('vounter_other');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->vounter_id] = $row->team_name;
            }
            return $data;
        }
        return false;
    }
     public function data_users(){
        $this->db->select('*');
        $this->db->from('volunteer');
        $this->db->order_by('id','ASC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        return false;
    }
    
             public function data_vounter_one(){
       
        $query =  $this->db->query("SELECT * FROM `volunteer` WHERE   `suspend`=1 AND `volunteer_type`=1");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->id;
            }
            return $data;
        }
        return false;
    }
    
    
    }//end class
?>