<?php


class Main_dep extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }

    public  function record_count(){
        return $this->db->count_all("departments");

    }

    public  function  insert(){
        $data['main_dep_name']=$this->input->post('main_dep_name');
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        
        $this->db->insert('departments',$data);
    }

///////////selecting data//////////////////
  public function select($limit){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->order_by('id','DESC');
        $this->db->limit($limit);
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
    
    public function select_dep(){
        $this->db->select('*');
        $this->db->from('departments');
        $this->db->where('suspend',1);
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
   //--------------------------------------------
   
    public function update($id){
        $update = array(
            'main_dep_name'=>$this->input->post('main_dep_name') ,
            'publisher' => $_SESSION['user_id'],
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time() 
        );
        $this->db->where('id', $id);
        if($this->db->update('departments',$update)) {
            return true;
        }else{
            return false;
        }
    }
   
   
   
   
   //--------------------------------------------
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('departments');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('departments', array('id'=>$id));
        return $h->row_array();
    }
   
    
//---------------------------------------- Suspend  ----------------------------------------
    
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
        
        $this->db->where('id', $id);
        if($this->db->update('departments',$update)) {
            return true;
        }else{
            return false;
        }
    }

 }//end class
       
       

?>