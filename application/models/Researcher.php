<?php
class Researcher extends CI_Model
 {
    public function __construct()
    {
        parent:: __construct();
    }


    public  function  insert($id){

        $data['researcher_id'] = $_SESSION['vounter_id'];
        $data['person_id'] = $id;
        $data['request_type'] = $this->input->post('request_type');
        $data['business'] = $this->input->post('business');
        $data['business_type'] = $this->input->post('business_type');
        $data['propety'] = $this->input->post('propety');
        $data['family_health'] = $this->input->post('family_health');
        $data['living_type'] = $this->input->post('living_type');
        $data['info'] = $this->input->post('info');
        $data['opinion'] = $this->input->post('opinion');
        $data['date'] = strtotime(date("Y/m/d"));
        $data['date_s'] = time();
        
        $this->db->insert('researcher',$data);
        
           // $rr['person_id'] = $query[0]['id'];
            $rr['society'] = $this->input->post('society');
            $rr['retard'] = $this->input->post('retard');
            $rr['begger'] = $this->input->post('begger');
            $rr['awqaf'] = $this->input->post('awqaf');
            $rr['3waned'] = $this->input->post('3waned');
            $rr['retirement'] = $this->input->post('retirement');
            $rr['other'] = $this->input->post('other');
            $rr['total'] = $this->input->post('total2');
            
            $rr['aqar'] = $this->input->post('3akar');
            $rr['ta2meen'] = $this->input->post('ta2meen');
            $rr['medium_rate'] = $this->input->post('total');
            $rr['camels'] = $this->input->post('camels');
            $rr['sheep'] = $this->input->post('sheep');
            $rr['cows'] = $this->input->post('cows');
            $rr['others'] = $this->input->post('others');

         $this->db->where('person_id', $id);
         $this->db->update('income',$rr);


    }
    
    
   public function getById($id){
        $h1 = $this->db->get_where('person', array('id'=>$id));
        $h2 = $this->db->get_where('education', array('person_id'=>$id));
        $h3 = $this->db->get_where('income', array('person_id'=>$id));
        return array($h1->row_array(),$h2->row_array(),$h3->row_array());
   } 


   public  function  update($id,$person_id){
        
        $update['researcher_id'] = $_SESSION['vounter_id'];
        $update['request_type'] = $this->input->post('request_type');
        $update['business'] = $this->input->post('business');
        $update['business_type'] = $this->input->post('business_type');
        $update['propety'] = $this->input->post('propety');
        $update['family_health'] = $this->input->post('family_health');
        $update['living_type'] = $this->input->post('living_type');
        $update['info'] = $this->input->post('info');
        $update['opinion'] = $this->input->post('opinion');

        $update['date'] = strtotime(date("Y/m/d"));
        $update['date_s'] = time();
        
        $this->db->where('id', $id);
        $this->db->update('researcher',$update);
        
            $rr['society'] = $this->input->post('society');
            $rr['retard'] = $this->input->post('retard');
            $rr['begger'] = $this->input->post('begger');
            $rr['awqaf'] = $this->input->post('awqaf');
            $rr['3waned'] = $this->input->post('3waned');
            $rr['retirement'] = $this->input->post('retirement');
            $rr['other'] = $this->input->post('other');
            $rr['total'] = $this->input->post('total2');
            
            $rr['aqar'] = $this->input->post('3akar');
            $rr['ta2meen'] = $this->input->post('ta2meen');
            $rr['medium_rate'] = $this->input->post('total');
            $rr['camels'] = $this->input->post('camels');
            $rr['sheep'] = $this->input->post('sheep');
            $rr['cows'] = $this->input->post('cows');
            $rr['others'] = $this->input->post('others');

         $this->db->where('person_id', $person_id);
         $this->db->update('income',$rr);
        
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
        
        $this->db->where('approved',1);

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


        $this->db->from('researcher');


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

/*public function select2(){


        $this->db->select('researcher.*,client.name');
        
        $this->db->join('client','client.id=researcher.researcher_id');

        $query = $this->db->get('researcher');


        if ($query->num_rows() > 0) {


            foreach ($query->result() as $row) {


                $data[] = $row;
                $data2[$row->person_id] = $row;

            }

            return array($data,$data2);


        }


        return false;


    }*/
    
    
    public function count_num(){


        $this->db->select('researcher.*,client.name,COUNT(*) AS cc');
        
        $this->db->group_by('researcher_id');
        
        $this->db->join('client','client.id=researcher.researcher_id');

        $query = $this->db->get('researcher');


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


 }