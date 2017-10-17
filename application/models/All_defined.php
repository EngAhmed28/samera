<?php





class All_defined extends CI_Model

 {

    public function __construct()

    {

        parent:: __construct();

    }

 public  function record_count(){

        return $this->db->count_all("all_defined");



    }

    public  function  insert(){

        

        $data['title']=$this->input->post('define'); 

        $data['type']=$this->input->post('type');

        $this->db->insert('all_defined',$data);     

    }



//-----------------------------------





 public  function record_count2(){

        $this->db->select('*');

        $this->db->from('all_defined');

        $this->db->group_by('type');

        $this->db->order_by('id','ASC');

        $query = $this->db->get();

        

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

            /*  $this->db->select('*');

               $this->db->from('all_defined');

               $this->db->where('type',$row->type);

               $this->db->order_by('id','ASC');*/

              $query2 = $this->db->query("SELECT * FROM `all_defined` WHERE `type`=".$row->type);

                $sub_data=array();

                        foreach ($query2->result() as $row2) {

                            $sub_data[$row2->id] = $row2->title;

                           

                        }

                 $data[$row->type] =$sub_data;

        

            //$data[] = $sub_data;

               

         }

            return $data;

        }

        return false;

     }

//-----------------------------------

///////////selecting data//////////////////

  public function select($limit){

        $this->db->select('*');

        $this->db->from('all_defined');

        $this->db->order_by('id','DESC');

        $this->db->limit($limit);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $data[$row->id] = $row;

            }

            return $data;

        }

        return false;

    } 

 

   //--------------------------------------------

   

    public function update($id){

        $update = array(

            'title'=>$this->input->post('define')

            );

        $this->db->where('id', $id);

        if($this->db->update('all_defined',$update)) {

            return true;

        }else{

            return false;

        }

    }

  //--------------------------------------------

    /////delete/////

    public function delete($id){

        $this->db->where('id',$id);

        $this->db->delete('all_defined');



    }

///////update/////////

    public function getById($id){

        $h = $this->db->get_where('all_defined', array('id'=>$id));

        return $h->row_array();

    }

   

    

//---------------------------------------- Suspend  ----------------------------------------

  



 }//end class

       

       



?>