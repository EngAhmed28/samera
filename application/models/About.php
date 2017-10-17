<?php
class About extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("about");
    }
    public  function  insert($file,$date){
        $data['title']=$this->input->post('title');
        $data['content']=$this->input->post('content');
        $data['img']= $file;
        $data['publisher'] = $_SESSION['user_id'];
        $data['date'] = $date;//strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        $data['suspend'] = 1;
        $data['type'] = 1;
        
        $this->db->insert('about',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit){
        $this->db->select('*');
        $this->db->from('about');
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
    /////delete/////
    public function delete($id){
        $this->db->where('id',$id);
        $this->db->delete('about');
    }
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('about', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file,$date){
        $update = array(
            'title'=>$this->input->post('title') ,
            'content'=>$this->input->post('content') ,
            'publisher' => $_SESSION['user_id'],
            'date' => $date,//strtotime(date("Y-m-d")),
            'date_s' => time(),
            'type' => 1 
        );
        if($file != ''){
            $update['img']=$file ;
        }
        $this->db->where('id', $id);
        if($this->db->update('about',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    /////////////////////// Suspend
    
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
        if($this->db->update('about',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    ///////////////////
    
    public function select_web(){
        $this->db->select('*');
        $this->db->from('about');
        $this->db->where('suspend', 1);
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