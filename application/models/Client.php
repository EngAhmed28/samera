<?php





class Client extends CI_Model


 {


    public function __construct()


    {


        parent:: __construct();


    }


    public  function record_count(){
  return $this->db->count_all("client");
      }
      
     public  function  insert(){
         
     $data['name']=$this->input->post('name');
     $data['job_title_fk']=$this->input->post('job_title_fk');
     $data['telephone']=$this->input->post('phone_number');
     $data['address']=$this->input->post('address');
      $data['card_number']=$this->input->post('card_number');
     
     $data['publisher'] = $_SESSION['user_id'];
     $data['date'] = strtotime(date("Y/m/d"));
     $data['date_s'] = time();
     $data['suspend'] = 1;
    $this->db->insert('client',$data);


    }


    //////////////////////////


///////////selecting data//////////////////


    public function select($limit){


        $this->db->select('*');


        $this->db->from('client');


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


    


    ////////////////////////////////////////////


public function select_ss(){
        $this->db->select('*');
        $this->db->from('client');
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
        $this->db->from('client');
        $this->db->order_by('id','DESC');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row;
                  }
            return $data;
        }
        return false;
    }
    ///////////////////////////////////////


    public function select_web(){


        $this->db->select('*');


        $this->db->from('client');


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


    


    /////////////////


    /////delete/////


    public function delete($id){


        $this->db->where('id',$id);


        $this->db->delete('client');





    }


///////update/////////


    public function getById($id){


        $h = $this->db->get_where('client', array('id'=>$id));


        return $h->row_array();


    }


    public function update($id){


        $update = array(


              'name'=>$this->input->post('name') ,
              'job_title_fk'=>$this->input->post('job_title_fk') ,
             'telephone'=>$this->input->post('phone_number') ,
             'card_number'=>$this->input->post('card_number') ,
             'publisher' => $_SESSION['user_id'],
              'address'=>$this->input->post('address'),
             'date' => strtotime(date("Y-m-d")),
              'date_s' => time()
              );
   
  
        $this->db->where('id', $id);


        if($this->db->update('client',$update)) {


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


        if($this->db->update('client',$update)) {


            return true;


        }else{


            return false;


        }


    }





 }