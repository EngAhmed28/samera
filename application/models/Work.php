<?php

class Work extends CI_Model
{
    public function __construct()
    {
        parent:: __construct();
    }
    
    public  function record_count(){
        return $this->db->count_all("all_works");

    }
    
    
    
    ////////////////////////////
        public function select_last(){
        $this->db->select('*');
        $this->db->from('all_works');
        $this->db->order_by('id','DESC');
       $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    
    /////////////////

    public  function  insert($date){   
      $data['name']=$this->input->post('work_name');
      $data['content']=$this->input->post('work_details');
      $data['date'] = $this->input->post('work_date');
      $data['field_id']=$this->input->post('field_id');
      $data['type']=$this->input->post('work_type');
      $v_link =$this->input->post('video_link');;
   
    if( strpos($v_link,'v=') != false) {
         $b = explode('v=',$v_link);
          $data['vid'] =$b[1];
    }else{  $data['vid']='';  }
     
      $data['publisher'] = $_SESSION['vounter_id'];
      $data['suspend'] = 0;
      $data['date_s']=time();
  $this->db->insert('all_works',$data);
    }
    public function insert_album($file,$f_id) {

$a = 0; 
 foreach($file as $record):
      $val['process'] = 1;
      $val['img']=$record; 
      $val['f_id']=$f_id;
      $val['date_s']=time();
      $val['date'] = strtotime(date("m/d/Y"));
      $val['publisher'] = $_SESSION['vounter_id'];
      $val['suspend'] = 1;
	
     $a++;
$this->db->insert('albums_photo',$val);
 endforeach;

    }
    /////////////////////////////////////////////////////////////
    

            public function  getname(){
        $this->db->select('*');
        $this->db->from('departments');
       $this->db->order_by('id','DESC');
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->main_dep_name;
            }
            return $data;
        }
        return false;
    }
    
    
    
            public function  getdetails(){
        $this->db->select('*');
        $this->db->from('albums_photo');
        $this->db->group_by('f_id');
       $this->db->order_by('id','DESC');
      
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $query2 =$this->db->query('SELECT * FROM `albums_photo` WHERE `f_id` = '.$row->f_id);
                $arr=array();
                foreach ($query2->result() as  $row2) {
                    $arr[] =$row2->img;
                }
                $data[$row->f_id]=$arr;
                
            }
            return $data;
        }
        return false;
    }
    
    
    
        public function getimg($id){
    $this->db->select("*");
    $this->db->from("albums_photo");
    $this->db->where('f_id', $id);
   $query = $this->db->get();        
   return $query->result();  
            
    }

///////////selecting data//////////////////
    public function select(){
        $this->db->select('*');
        $this->db->from('all_works');
        $this->db->order_by('id','DESC');
        //$this->db->limit($limit);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    /////////////////
    /////delete/////
    public function delete($id){
   
        $this->db->where('id',$id);
        $this->db->delete('all_works');
        
        $this->db->where('f_id',$id);
        $this->db->delete('albums_photo');

    }
///////update/////////
    
    public function getById($id){
        $h = $this->db->get_where('all_works', array('id'=>$id));
        return $h->row_array();
    }
    
    public function update($id,$file,$date){
        $h = $this->db->get_where('all_works', array('id'=>$id));
        $row = $h->row_array();
      
       $a = 0; 
       if($file){
       foreach($file as $record):
      $a++;
      $val['process'] = 1;
      $val['img']=$record; 
      $val['f_id']=$row['id'];
      $val['date_s']=$row['date_s'];
      $val['date'] = $row['date'];
      $val['publisher'] = $_SESSION['user_id'];
      $val['suspend'] = 1;
	
    
$this->db->insert('albums_photo',$val);
 endforeach; }
       

        $data['name']=$this->input->post('work_name');
        $data['content']=$this->input->post('work_details');
        $data['date'] = $this->input->post('work_date');
        $data['field_id']=$this->input->post('field_id');
        $data['type']=$this->input->post('work_type');
     
     $v_link =$this->input->post('video_link');;
     if( strpos($v_link,'v=') != false) {
         $b = explode('v=',$v_link);
          $data['vid'] =$b[1];
    }else{  $data['vid']='';  }

      $data['publisher'] = $_SESSION['user_id'];
     
      $data['date_s']=time();

   $this->db->where('id', $id);
          if($this->db->update('all_works',$data)) {
            return true;
        }else{
            return false;
        }     
   
    }
    
   
    public function delete_photo($id){
        
        $this->db->where('id',$id);
        $this->db->delete('albums_photo');        

    }
    
   ///////////////////////////////////selectaya
        public function select_field(){
        $this->db->select('*');
        $this->db->from('departments');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
  
    
    //////////////////////////////////
        public function suspend($id,$clas)
    {
        if($clas == 'danger')
        {
            $update = array(
                'suspend' => 1
            );
        }
        else
        {
            $update = array(
                'suspend' => 0
            );
        }
        
         $this->db->where('f_id', $id);
         $this->db->update('albums_photo',$update);
         
        $this->db->where('id', $id);
        if($this->db->update('all_works',$update)) {
            return true;
        }else{
            return false;
        }
    }
////////////////////////////////////////////

    public function select_limit($limit,$type,$id,$start){
        $this->db->select('*');
        $this->db->from('all_works');
        if($id=='')
            $array = array('type' => $type, 'suspend' => 1);
        else
            $array = array('type' => $type, 'suspend' => 1, 'id' => $id);
        $this->db->where($array); 
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }

       /////////////////////////////////////////////////
         public  function record_count_active($type){

        $this->db->select('*');

        $this->db->from('all_works');
        
        $array = array('type' => $type, 'suspend' => 1);

        $this->db->where($array);

        return $this->db->count_all_results();



    }
/////////////////////////////////////////////////////////////


 public function select_except($limit,$type,$id,$start){

        $this->db->select('*');
        $this->db->from('all_works');
        $array = array('type' => $type, 'suspend' => 1, 'id !=' => $id);
        $this->db->where($array); 
        $this->db->order_by('id','DESC');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;

    }






}