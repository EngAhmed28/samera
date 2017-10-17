<?php



class Approve_works extends CI_Model

 {

    public function __construct()

    {

        parent:: __construct();

    }

    

    public  function record_count($type){

        if($type != 3)

        {

            $this->db->select('*');

            $this->db->from('all_works');

            $this->db->where('suspend',$type);

            return $this->db->count_all_results();

        }

        else

            $v= $this->db->count_all("all_works");

    }



    //////////////////////////

///////////selecting data//////////////////



     public function select_without($type){

        $this->db->select('*');

        $this->db->from('all_works');

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

        if($this->db->update('all_works',$update)) {

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

        $this->db->from('all_works');

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



    public function select_type($type,$publisher){
        $this->db->select('*');
        $this->db->from('all_works');
        if($publisher ==0){
             $array = array('type' => $type, 'suspend' => 1);
        }else{
            $array = array('type' => $type, 'suspend' => 1, 'publisher' => $publisher);
        }
          
        $this->db->where($array); 
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