<?php







class Idea extends CI_Model



 {



    public function __construct()



    {



        parent:: __construct();



    }



    



    public  function record_count($type){



        if($type != 3)



        {



            $this->db->select('*');



            $this->db->from('ideas');



            $this->db->where('suspend',$type);



            return $this->db->count_all_results();



        }



        else



            $v= $this->db->count_all("ideas");



    }







    public  function  insert($email,$date){



        $data['tele']=$this->input->post('tele');



        $data['publisher']=$this->input->post('publisher');



        $data['content']=$this->input->post('content');



        $data['email'] = $email;



        $data['date'] = $date;//strtotime(date("Y/m/d"));



        $data['date_s'] = time();



        $data['name'] = $this->input->post('name');



        $data['suspend'] = 0;



        



        $this->db->insert('ideas',$data);



    }



    //////////////////////////



///////////selecting data//////////////////



    public function select($limit,$start,$type){



        $this->db->select('*');



        $this->db->from('ideas');



        if(($type||$type=='0') && ($type != 3))



            $this->db->where('suspend',$type); 



        $this->db->order_by('id','DESC');



        $this->db->limit($limit,$start);



        $query = $this->db->get();



        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;



    }



    



     public function select_without($type){



        $this->db->select('*');



        $this->db->from('ideas');



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



    /////////////////



    /////delete/////



    public function delete($id){



        $this->db->where('id',$id);



        $this->db->delete('ideas');







    }



    



    ////////////// suspend



    



    



    public function suspend($type,$id,$text)



    {



        $update['suspend'] = $type;



        



        if($text)



            $update['resons'] = $text;



        



        $this->db->where('id', $id);



        if($this->db->update('ideas',$update)) {



            return true;



        }else{



            return false;



        }



    }



    

//*****************************************************************************************************

 //////////////////////////////////////

             public function select_idea(){

        $this->db->select('*');

        $this->db->from('ideas');

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

    ////////////////////////////////////////////

        public function  get_comment(){

        $this->db->select('*');

        $this->db->from('comments');

        $this->db->group_by('idea_id');

        $this->db->where('suspend',1); 

       $this->db->order_by('id','DESC');

      

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            foreach ($query->result() as $row) {

                $query2 =$this->db->query('SELECT * FROM `comments` WHERE `idea_id` = '.$row->idea_id);

                $arr=array();

                foreach ($query2->result() as  $row2) {

                    $arr[$row2->id] =$row2->comment;

                }

                $data[$row->idea_id]=$arr;

                

            }

            return $data;

        }

        return false;

    }

   

      ///////////////////////////

        public function delete_comments($id){

        

        $this->db->where('id',$id);

        $this->db->delete('comments');        



    }

    

    ////////////////////////////////////



        public function suspend_app($type,$id)

    {

        $update['suspend'] = $type;

        $this->db->where('idea_id', $id);

        $this->db->update('comments',$update);

         

        

        $this->db->where('id', $id);

        $this->db->update('ideas',$update);

        

        if($this->db->update('comments',$update)) {

            return true;

        }else{

            return false;

        }

    }

    /////////////////////

            public function delete_idea($id){

                

        $this->db->where('id',$id);

        $this->db->delete('ideas');       



        $this->db->where('idea_id',$id);

        $this->db->delete('comments');



    }

   







 }