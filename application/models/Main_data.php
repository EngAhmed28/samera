<?php
class Main_data extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }
    public  function record_count(){
        return $this->db->count_all("main_data");
    }
    public  function  insert($file){
        $data['name'] = $this->input->post('name');
        $data['logo'] = $file;
        $data['date_construct'] = $this->input->post('date_construct');
        $data['record_number'] = $this->input->post('record_number');
        $data['address'] = $this->input->post('address');
        $data['date'] = strtotime(date("Y-m-d"));
        $data['date_s'] = time();
        $data['publisher'] = $_SESSION['user_id'];
        $data['type'] = 0;
        for ($p = 1 ; $p <= $_POST['tele_info'] ; $p++)
        {
            $phone[]=$_POST['phone'.$p];
        }
        for ($x = 1 ; $x <= $_POST['fax_info'] ; $x++)
        {
            $fax[]=$_POST['fax'.$x];
        }
        for ($e = 1 ; $e <= $_POST['email_info'] ; $e++)
        {
            $email[]=$_POST['email'.$e];
        }
        $data['tele_info']  = serialize($phone);
        $data['donations_number']   = serialize($fax);
        $data['email_info'] = serialize($email);
        $this->db->insert('main_data',$data);
    }
    //////////////////////////
///////////selecting data//////////////////
    public function select($limit,$type){
        $this->db->select('*');
        $this->db->from('main_data');
        $this->db->where('type',$type);
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
    
    
    
    public function select_data(){
        $this->db->select('*');
        $this->db->from('main_data');
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
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('main_data', array('id'=>$id));
        return $h->row_array();
    }
    public function update($id,$file){
    
        for ($p = 0 ; $p < $_POST['count_phone'] ; $p++)
            if(!empty( $_POST['phone_old'.$p.''])):
                $phone[] = $_POST['phone_old'.$p.''];
            endif;

        for ($x = 0 ; $x < $_POST['count_fax'] ; $x++)
            if(!empty($_POST['fax_old'.$x])):
                $fax[] = $_POST['fax_old'.$x];
                endif;

        for ($e = 0 ; $e < $_POST['count_mail'] ; $e++)
            if(!empty($_POST['email_old'.$e.''])):
                $email[] = $_POST['email_old'.$e.''];
            endif;

         
        if($_POST['tele_info'] != ''){
            for($p = 1 ; $p <= $_POST['tele_info'] ; $p++)
                $phone[] = $_POST['phone'.$p];
        }
        if($_POST['fax_info'] != ''){
            for($p = 1 ; $p <= $_POST['fax_info'] ; $p++)
                $fax[] = $_POST['fax'.$p];  
        }
        if($_POST['email_info'] != ''){
            for( $x = 0 ; $x < $_POST['email_info'] ; $x++)
                $email[] = $_POST['email'.$x];             
        }
        
        $I['tele_info'] = serialize($phone);
        $I['donations_number'] = serialize($fax);
        $I['email_info'] = serialize($email);
   
        $update = array(
            'name'             => $this->input->post('name') ,
            'date_construct'   => $this->input->post('date_construct') ,
            'address'          => $this->input->post('address') ,
            'record_number'         => $this->input->post('record_number') ,
            'tele_info'        => $I['tele_info'], 
            'donations_number'   => $I['donations_number'],
            'email_info'       => $I['email_info'],
            'date'             => strtotime(date("Y-m-d")),
            'date_s'           => time() 
        );
        if($file != ''){
            $update['logo']=$file ;
        }
     
        $this->db->where('id', $id);
        if($this->db->update('main_data',$update)) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete($from,$id,$index){
        echo '</pre>';
        var_dump();
        echo'</pre>';
        $h = $this->db->get_where('main_data', array('id'=>$id));
        $row = $h->row_array();
        $unserial = unserialize($row[$from]);
        unset($unserial[$index]); 
        $unserial=array_values($unserial);
        $unserial=serialize($unserial);
        $update[''.$from.'']=$unserial;
        if($this->db->update('main_data',$update)) {
            return true;
        }
    }
   
 }
 