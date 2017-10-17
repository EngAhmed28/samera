<?php

class Sessions_reserve extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public  function record_count(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->where('session_reserve_confirm',1);
        return $this->db->count_all_results();

    }

    public  function  insert()
    {

        $data['sessions_id_fk']=$this->input->post('sessions_id_fk');
        $data['sessions_reserve_name']=$this->input->post('sessions_reserve_name');
        $data['sessions_reserve_email']=$this->input->post('sessions_reserve_email');
        $data['sessions_reserve_phone']=$this->input->post('sessions_reserve_phone');
        $data['sessions_reserve_address']=$this->input->post('sessions_reserve_address');
        $data['sessions_reserve_work']=$this->input->post('sessions_reserve_work');
        $data['sessions_reserve_work_at']=$this->input->post('sessions_reserve_work_at');
        $data['sessions_reserve_notes']=$this->input->post('sessions_reserve_notes');
        $data['nationality']=$this->input->post('nationality');
        $data['number']=$this->input->post('number');

        $data['session_reserve_confirm']=1;

        $this->db->insert('sessions_reserve',$data);

    }


/////////////web//////////////////
    public  function  inserted()
    {

      
        $data['sessions_id_fk']=$this->input->post('sessions_id_fk');
        $data['sessions_reserve_name']=$this->input->post('sessions_reserve_name');
        $data['sessions_reserve_email']=$this->input->post('sessions_reserve_email');
        $data['sessions_reserve_phone']=$this->input->post('sessions_reserve_phone');
        $data['sessions_reserve_work']=$this->input->post('sessions_reserve_work');
        
        $data['type']=$this->input->post('traine_sex');
        $data['sgl_madny']=$this->input->post('sgl_madny');
        $data['age']=$this->input->post('age');

        $data['session_reserve_confirm']=0;

        $this->db->insert('sessions_reserve',$data);

    }
///////////selecting data//////////////////

public function report(){

    $this->db->select('*');
    $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

    $q = $this->db->get('sessions_reserve');

    return $q->result();

}


public function selected(){

    $this->db->select('*');
    $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

    $this->db->where('session_reserve_confirm','1');

    $q = $this->db->get('sessions_reserve');

    return $q->result();

}



    public function select(){
        $this->db->select('*');
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');

        $this->db->where('session_reserve_confirm','1');

        $q = $this->db->get('sessions_reserve');

        return $q->result();
    }

    /////////////////
    /////delete/////
    public function delete($id){
        $this->db->where('sessions_reserve_id_pk',$id);
        $this->db->delete('sessions_reserve');

    }
    ////////////////////
///////update/////////
    public function getById($id){
        $h = $this->db->get_where('sessions_reserve', array('sessions_reserve_id_pk'=>$id));
        return $h->row_array();
    }


    public function update($id){
        $data = array(

            'sessions_id_fk'=>$this->input->post('sessions_id_fk'),
            'sessions_reserve_name'=>$this->input->post('sessions_reserve_name'),
            'sessions_reserve_email'=>$this->input->post('sessions_reserve_email'),
            'sessions_reserve_phone'=>$this->input->post('sessions_reserve_phone'),
            'sessions_reserve_address'=>$this->input->post('sessions_reserve_address'),
            'sessions_reserve_work'=>$this->input->post('sessions_reserve_work'),
            'sessions_reserve_work_at'=>$this->input->post('sessions_reserve_work_at'),
            'sessions_reserve_notes'=>$this->input->post('sessions_reserve_notes'),
            'nationality'=>$this->input->post('nationality'),
            'number'=>$this->input->post('number')

        );



        $this->db->where('sessions_reserve_id_pk', $id);

        if($this->db->update('sessions_reserve',$data)) {
            return true;
        }else{
            return false;
        }
           }

    public  function getallrequest(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','left');
        $this->db->where('session_reserve_confirm','0');
        $this->db->order_by('sessions_id_pk','DESC');
        $query = $this->db->get();
        return $query->result();

    }
    public  function confirm($id){
        $sessions_reserve['session_reserve_confirm']=1;
        $this->db->where('sessions_reserve_id_pk', $id);
        $this->db->update('sessions_reserve',$sessions_reserve);
        $sessions['reserve_confirm']=1;
        $this->db->where('sessions_id_pk', $id);
        $this->db->update('sessions',$sessions);

    }

    public function sessions_report(){
        $this->db->select('*');
        $this->db->from('sessions_reserve');
        $this->db->join('sessions','sessions.sessions_id_pk=sessions_reserve.sessions_id_fk','right');
        $query = $this->db->get();
        return $query->result();




    }


}
