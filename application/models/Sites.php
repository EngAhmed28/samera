<?php



class Sites extends CI_Model

 {

    public function __construct()

    {

        parent:: __construct();

    }

    public  function record_count(){

        return $this->db->count_all("sites");



    }



    public  function  insert(){

        $data['name']=$this->input->post('name');

        $data['url']=$this->input->post('url');

        $data['date'] = strtotime(date("Y/m/d"));

        $data['date_s'] = time();

        $this->db->insert('sites',$data);

    }

    //////////////////////////

///////////selecting data//////////////////

    public function select($limit){

        $this->db->select('*');

        $this->db->from('sites');

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

        $this->db->delete('sites');



    }

///////update/////////

    public function getById($id){

        $h = $this->db->get_where('sites', array('id'=>$id));

        return $h->row_array();

    }

    public function update($id){

        $update = array(

            'name'=>$this->input->post('name') ,

            'url'=>$this->input->post('url') ,

            'date' => strtotime(date("Y-m-d")),

            'date_s' => time()

        );

        $this->db->where('id', $id);

        if($this->db->update('sites',$update)) {

            return true;

        }else{

            return false;

        }

    }

    

  

    

   

 }