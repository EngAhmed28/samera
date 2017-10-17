<?php

class Gehat_da3ma extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("organization");

    }

    public  function  insert($file){
        $data['title']=$this->input->post('title');
        $data['img'] = $file;
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
     

        
        $this->db->insert('organization',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$start){
        $this->db->select('*');
        $this->db->from('organization');
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
    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('organization');

    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('organization', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){


            $update = array(
            'title'=>$this->input->post('title') ,
            'date' => strtotime(date("Y-m-d")),
            'date_s' => time(),
        );
       
                if($file != ''){
            $update['img']=$file ;
        }    
            
        $this->db->where('id', $id);
        if($this->db->update('organization',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    
    
    //////////////////////////////////shreef
    
    public function get_all_img(){

        $query=$this->db->get('organization');

        return $query->result();

    }
    //////////////////////////////////////////////

    public function all_select(){
        $this->db->select('*');
        $this->db->from('organization');
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









 }