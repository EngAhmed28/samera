<?php
class Committee extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert($id,$mem,$date){
    
      
        $data['person_id'] = $id;
    
        $data['opinion'] = $this->input->post('opinion_lagna');
        $data['committee_id']=$mem;

        $data['date'] = $date;//strtotime(date("Y/m/d"));
        $data['date_s'] = time();
      
        $this->db->insert('committee',$data);

    }
    
    
        public function getById($id){
        $h1 = $this->db->get_where('person', array('id'=>$id));
        $h2 = $this->db->get_where('education', array('person_id'=>$id));
        $h3 = $this->db->get_where('income', array('person_id'=>$id));
        return array($h1->row_array(),$h2->row_array(),$h3->row_array());
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

   public  function  update($mem,$date){
   
        $update['date'] = $date;//strtotime(date("Y/m/d"));
        $update['date_s'] = time(); 
        $update['opinion'] = $this->input->post('opinion_lagna');
        $update['committee_id']=$mem;
        
        $this->db->where('id', $this->input->post('id'));
       
        $this->db->update('committee',$update);
        
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
    
    
        
     public function select4(){

        $query = $this->db->query('SELECT person.* FROM person
                    inner join researcher researcher
    on person.id = researcher.person_id');

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


        $this->db->from('committee');


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


 }