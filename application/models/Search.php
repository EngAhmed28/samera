<?php
class Search extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert($id,$mem,$date){
    
      
        $data['person_id'] = $id;
        $data['committee_id']=$mem;
        $data['checked'] = $this->input->post('checked');
        $data['fileds'] = $this->input->post('fileds');
        $data['number'] = $this->input->post('number');
        $data['medical'] = $this->input->post('medical');
        $data['details'] = $this->input->post('details');
        $data['date'] = $this->input->post('date');
        $data['date_s'] = time();
       
         $this->db->insert('lagna',$data);

    }
    
    
        public function getById($id){
        $h1 = $this->db->get_where('person', array('id'=>$id));
        $h2 = $this->db->get_where('education', array('person_id'=>$id));
        $h3 = $this->db->get_where('income', array('person_id'=>$id));
        return array($h1->row_array(),$h2->row_array(),$h3->row_array());
   } 


       public function getById2($id){
        $h1 = $this->db->get_where('person', array('id'=>$id));
        return $h1->row_array();
     
   } 
    public function select3($id){


        $this->db->select('*');


        $this->db->from('researcher');

         $this->db->where('person_id',$id);
      

        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;


            }


            return $data;


        }


        return false;


    }
     public function member($id){

//var_dump($id);die();
        $this->db->select('*');
        $this->db->from('members');
         $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;

    }
    
         public function get_client($id){
        $this->db->select('*');
        $this->db->from('client');
         $this->db->where('id',$id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }

        return false;

    }
     public function data_print($id){


        $this->db->select('*');


        $this->db->from('lagna');

         $this->db->where('id',$id);
      

        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;


            }


            return $data;


        }


        return false;


    }

   public  function  update($mem,$date){
       
        $update['committee_id']=$mem;
        $update['checked'] = $this->input->post('checked');
        $update['fileds'] = $this->input->post('fileds');
        $update['number'] = $this->input->post('number');
        $update['details'] = $this->input->post('details');
        $update['medical'] = $this->input->post('medical');
        $update['date'] = $this->input->post('date');
        $update['date_s'] = time();
      
        
        $this->db->where('id', $this->input->post('id'));
       
        $this->db->update('lagna',$update);
        
    }


///////////selecting data//////////////////


    public function get_define($type){


        $this->db->select('*');


        $this->db->from('all_defined');


        $this->db->order_by('id','DESC');


        $this->db->where('type',$type);


        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;


            }


            return $data;


        }


        return false;


    }
    
    
    
     public function select(){


        $this->db->select('*');


        $this->db->from('person');


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
    
    
    public function select2(){


        $this->db->select('*');


        $this->db->from('lagna');


        $this->db->order_by('id','DESC');


        $query = $this->db->get();


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;
                $data2[$row->person_id] = $row;

            }


            return array($data,$data2);


        }


        return false;


    }


    

     public function select_lagna(){


        $this->db->select('*');


        $this->db->from('lagna');


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

    
     public function get_person($id){
        
        $h = $this->db->get_where('person', array('id'=>$id));
        return $h->row_array();
        
        
    }
 //--------------------------------------
    public function select_defines(){
        $this->db->select('*');
        $this->db->from('all_defined');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->title;
                  }
            return $data;
        }
        return false;
    }
    
    public function all_data($id){
        $this->db->select('lagna.*,lagna.date AS dt,researcher.*,person.*');
        $this->db->join('researcher','researcher.person_id=lagna.person_id');
        $this->db->join('person','person.id=lagna.person_id ');
        $this->db->where('lagna.person_id',$id);
        $query = $this->db->get('lagna');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                  }
            return $data;
        }
        return false;
    }
    
    
    
        public function all_data_id($id){
        $this->db->select('lagna.*,lagna.date AS dt,researcher.*,person.*');
        $this->db->join('researcher','researcher.person_id=lagna.person_id');
        $this->db->join('person','person.id=lagna.person_id ');
        $this->db->where('lagna.id',$id);
        $query = $this->db->get('lagna');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
                  }
            return $data;
        }
        return false;
    }
    
    
     public function select4(){

        $query = $this->db->query('SELECT person.* FROM person
                    inner join committee committee
    on person.id = committee.person_id');

        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;

            }
            

            return $data;


        }


        return false;


    }

 }