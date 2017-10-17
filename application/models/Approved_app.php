<?php

class Approved_app extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    
    public  function record_count($type){
        if($type != 3)
        {
            $this->db->select('*');
            $this->db->from('volunteer');
            $this->db->where('suspend',$type);
            return $this->db->count_all_results();
        }
        else
            $v= $this->db->count_all("volunteer");
    }

    //////////////////////////
///////////selecting data//////////////////

     public function select_without($type){
        $this->db->select('*');
        $this->db->from('volunteer');
        if(($type||$type=='0') && ($type != 3))
            $this->db->where('suspend',$type); 
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
    //-------------------------
    public function suspend($type,$id,$text)
    {
        $update['suspend'] = $type;
        
        if($text)
            $update['refuse_reason'] = $text;
        
        $this->db->where('id', $id);
        if($this->db->update('volunteer',$update)) {
            return true;
        }else{
            return false;
        }
    }
   //****************************** 23-1-2017 --------------------------------
   
       public function  getname(){
        $this->db->select('*');
        $this->db->from('volunteer');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->name;
            }
            return $data;
        }
        return false;
    }
   
   public function select_refuse(){
        $this->db->select('*');
        $this->db->from('volunteer');
            $this->db->where('suspend',2); 
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


    
   
 }//end class