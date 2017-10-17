<?php







class App  extends CI_Model







{







    public function __construct() {







        parent::__construct();







    }



        public  function record_count(){



        return $this->db->count_all("volunteer");







    }

    

    

     public  function records_select_user($volunteer_type){

        

        if($volunteer_type == 2)

            $table = 'members';

        else

            $table = 'client';

        // volunteer.volunteer_type='.$volunteer_type.' AND

        /*$query =  $this->db->query( 'SELECT '.$table.'.*

                    FROM '.$table.'

                    LEFT JOIN users ON users.vounter_id = '.$table.'.id

                    WHERE users.vounter_id IS NULL');*/

          $query = $this->db->query('SELECT '.$table.'.* FROM '.$table.'
                    WHERE '.$table.'.id NOT IN (SELECT users.vounter_id FROM users WHERE role_id_fk='.$volunteer_type.')');          

        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;

        

        

    }

    

     public  function records_select_user2($volunteer_id , $type){

        if($type == 2)
            $table = 'members';
        else
            $table = 'client';

        $this->db->select('*');



        $this->db->from(''.$table.'');



        $this->db->where('id',$volunteer_id); 

        

        $query = $this->db->get();

                    

        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }

//var_dump($data);die;

            return $data;



        }



        return false;

        

        

    }











          public function select_imgs(){



        $this->db->select('*');



        $this->db->from('all_defined');



        $this->db->where('id= "1"'); 



        



        $query = $this->db->get();



        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;



    }



  //-------------------------------------------------------------------------  





public function insert($file,$date,$publisher){



        $data['name']=$this->input->post('name');

        $data['gender']=$this->input->post('type');

        $data['birth_date']=$this->input->post('birthday');//strtotime($this->input->post('birthday'));

        //------------------------------------------------- 

        if($this->input->post('segl_madny')==""){

            $data['card_num']='';  

        }else{

             $data['card_num']=$this->input->post('segl_madny'); 

        }

        //------------------------------------------------- 

          if($this->input->post('mo2ahl')==""){

            $data['qualification']='';  

        }else{

             $data['qualification']=$this->input->post('mo2ahl'); 

        }

        //------------------------------------------------- 

          if($this->input->post('ta5asos')==""){

             $data['specialized']='';  

        }else{

             $data['specialized']=$this->input->post('ta5asos'); 

        }

         //------------------------------------------------- 

          if($file==""){

            $data['about_file']='';  

        }else{

             $data['about_file']=$file; 

        }

         //------------------------------------------------- 

         if($this->input->post('ta5asos')==""){

             $data['social_status']='';  

        }else{

             $data['social_status']=$this->input->post('status'); 

        }

          //------------------------------------------------- 

          if($this->input->post('nationalty')==""){

            $data['nationality']='';  

        }else{

             $data['nationality']=$this->input->post('nationalty'); 

        }

        //------------------------------------------------- 

          if($this->input->post('mobile')==""){

            $data['mobile']='';  

        }else{

             $data['mobile']=$this->input->post('mobile'); 

        }

         //-------------------------------------------------   

        if($this->input->post('phone')==""){

            $data['tele']='';  

        }else{

             $data['tele']=$this->input->post('phone'); 

        }

         //------------------------------------------------- 

        if($this->input->post('email')==""){

            $data['email']='';  

        }else{

             $data['email']=$this->input->post('email'); 

        }

         //------------------------------------------------- 

      if($this->input->post('fax')==""){

            $data['fax']='';  

        }else{

             $data['fax']=$this->input->post('fax'); 

        }

         //------------------------------------------------- 

          if($this->input->post('city')==""){

            $data['city']='';  

        }else{

             $data['city']=$this->input->post('city'); 

        }

         //------------------------------------------------- 

          if($this->input->post('town')==""){

            $data['alhai']='';  

        }else{

             $data['alhai']=$this->input->post('town'); 

        }

         //------------------------------------------------- 

           if($this->input->post('job')==""){

            $data['job']='';  

          }else{

             $data['job']=$this->input->post('job'); 

           }





           if($this->input->post('job') == 2){



             $data['keta3']=$this->input->post('keta3');



             $data['destination_job']=$this->input->post('work');



             $data['administration']=$this->input->post('edara');



             $data['title_job']=$this->input->post('work_name');



          



             }else{



              $data['keta3']='';



              $data['destination_job']="";



              $data['administration']='';



              $data['title_job']='';



             }



        //---------------------------------------     

       if($this->input->post('blood')==""){

            $data['blood_type']='';  

          }else{

             $data['blood_type']=$this->input->post('blood'); 

           }

        //---------------------------------------     

       if($this->input->post('diseases')==""){

            $data['diseases']='';  

          }else{

            $data['diseases']=$this->input->post('diseases'); 

           }

        //---------------------------------------  

            if($this->input->post('diseases')==1){



                 $data['diseases_type']=$this->input->post('type_sick');



                 $data['medical_insurance']=$this->input->post('insurance');



                 $data['company']=$this->input->post('company_name');



             }  else{



                 $data['diseases_type']=""; 



                 $data['medical_insurance']='';



                 $data['company']='';



             } 

       //---------------------------------------           

           $dd= $this->input->post('vehicle');

           if($dd==""){

            $data['fields_id']="";

           }else{

             $data['fields_id']=serialize($dd);

           }

       

        $data['volunteer_type']=$this->input->post('type_reg');

        $data['publisher'] = $publisher;

        $data['date'] = $date;//strtotime(date("Y/m/d"));
        
        $data['date_s'] = time();

        $data['suspend'] = 0;

        $this->db->insert('volunteer',$data);

        }





/*

public function insert($file){



        $data['name']=$this->input->post('name');



        $data['gender']=$this->input->post('type');



        



        $data['card_num']=$this->input->post('segl_madny');



        $data['birth_date']=strtotime($this->input->post('birthday'));



        



        $data['qualification']=$this->input->post('mo2ahl');



        $data['specialized']=$this->input->post('ta5asos');



        



        $data['social_status']=$this->input->post('status');



        $data['nationality']=$this->input->post('nationalty');



        $data['gender']=$this->input->post('type');



        



        $data['about_file']=$file;



  



        $data['mobile']=$this->input->post('mobile');



        $data['tele']=$this->input->post('phone');



        $data['email']=$this->input->post('email');



        $data['fax']=$this->input->post('fax');



        $data['city']=$this->input->post('city');



        $data['alhai']=$this->input->post('town');



        $data['job']=$this->input->post('job');



        



        //---------------------------------------   



           if($this->input->post('job') == 2){



             $data['keta3']=$this->input->post('keta3');



             $data['destination_job']=$this->input->post('work');



             $data['administration']=$this->input->post('edara');



             $data['title_job']=$this->input->post('work_name');



          



             }else{



              $data['keta3']='';



              $data['destination_job']="";



              $data['administration']='';



              $data['title_job']='';



             }



        //---------------------------------------     



        $data['blood_type']=$this->input->post('blood');



        $data['diseases']=$this->input->post('diseases');



        //---------------------------------------  



            if($this->input->post('diseases')==1){



                 $data['diseases_type']=$this->input->post('type_sick');



                 $data['medical_insurance']=$this->input->post('insurance');



                 $data['company']=$this->input->post('company_name');



             }  else{



                 $data['diseases_type']=""; 



                 $data['medical_insurance']='';



                 $data['company']='';



             } 



       //---------------------------------------           



         



           $dd= $this->input->post('vehicle');



           $data['fields_id']=serialize($dd);



         



        $data['volunteer_type']=$this->input->post('type_reg');



        $data['publisher'] = $_SESSION['user_id'];



        $data['date'] = strtotime(date("Y/m/d"));



        $data['suspend'] = 0;



        



        $this->db->insert('volunteer',$data);



        }



*/







 public  function get_all_define($tupe_id){



        $this->db->select('*');



        $this->db->from('all_defined');



        $this->db->where('type= "'.$tupe_id.'"'); 



        return $this->db->get()->result();



    }







   public  function get_all_departments(){



        $this->db->select('*');



        $this->db->from('departments');



        $this->db->order_by('id','ASC');



        return $this->db->get()->result();



    }



   public function get_work_type($id_chick){



     $h = $this->db->get_where('all_defined', array('id'=>$id_chick));



   return $h->row_array();



   }



   



     public function get_all_app(){







        $query=$this->db->get('volunteer');







        return $query->result();







    }



    



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



        if($this->db->update('volunteer',$update)) {



            return true;



        }else{



            return false;



        }



    }



   











    public function getById($id){



        $h = $this->db->get_where('volunteer', array('id'=>$id));



        return $h->row_array();



    }



    



        public function delete($id){



        $this->db->where('id',$id);



        $this->db->delete('volunteer');







    }



    



      public function select_report(){



        $this->db->select('*');



        $this->db->from('volunteer');



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



    



    



        public function select($limit){



        $this->db->select('*');



        $this->db->from('volunteer');



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



   //***************************************************************************************************************** //



 /*  public function update($id,$file){



        $data['name']=$this->input->post('name');



        $data['gender']=$this->input->post('type');



        



        $data['card_num']=$this->input->post('segl_madny');



        $data['birth_date']=strtotime($this->input->post('birthday'));



        



        $data['qualification']=$this->input->post('mo2ahl');



        $data['specialized']=$this->input->post('ta5asos');



        



        $data['social_status']=$this->input->post('status');



        $data['nationality']=$this->input->post('nationalty');



        $data['gender']=$this->input->post('type');



        //---------------------------------------



        if($file !=''){



         $data['about_file']=$file;   



        }



        



        //---------------------------------------



        $data['mobile']=$this->input->post('mobile');



        $data['tele']=$this->input->post('phone');



        $data['email']=$this->input->post('email');



        $data['fax']=$this->input->post('fax');



        $data['city']=$this->input->post('city');



        $data['alhai']=$this->input->post('town');



        $data['job']=$this->input->post('job');



        



        //---------------------------------------   



           if($this->input->post('job') == 2){



             $data['keta3']=$this->input->post('keta3');



             $data['destination_job']=$this->input->post('work');



             $data['administration']=$this->input->post('edara');



             $data['title_job']=$this->input->post('work_name');



          



             }else{



              $data['keta3']='';



              $data['destination_job']="";



              $data['administration']='';



              $data['title_job']='';



             }



        //---------------------------------------     



        $data['blood_type']=$this->input->post('blood');



        $data['diseases']=$this->input->post('diseases');



        //---------------------------------------  



            if($this->input->post('diseases')==1){



                 $data['diseases_type']=$this->input->post('type_sick');



                 $data['medical_insurance']=$this->input->post('insurance');



                 $data['company']=$this->input->post('company_name');



             }  else{



                 $data['diseases_type']=""; 



                 $data['medical_insurance']='';



                 $data['company']='';



             } 



       //---------------------------------------           



         



           $dd= $this->input->post('vehicle');



           $data['fields_id']=serialize($dd);



         



        $data['volunteer_type']=$this->input->post('type_reg');



        $data['publisher'] = $_SESSION['user_id'];



        $data['date'] = strtotime(date("Y/m/d"));



        $data['suspend'] = 0;







     $this->db->where('id', $id); 



    $this->db->update('volunteer',$data);



   }//end function  



*/



   

   public function update($id,$file,$date){

    

        $data['name']=$this->input->post('name');

        $data['gender']=$this->input->post('type');

        $data['birth_date']=$this->input->post('birthday');//strtotime($this->input->post('birthday'));

        //------------------------------------------------- 

        if($this->input->post('segl_madny')==""){

            $data['card_num']='';  

        }else{

             $data['card_num']=$this->input->post('segl_madny'); 

        }

        //------------------------------------------------- 

          if($this->input->post('mo2ahl')==""){

            $data['qualification']='';  

        }else{

             $data['qualification']=$this->input->post('mo2ahl'); 

        }

        //------------------------------------------------- 

          if($this->input->post('ta5asos')==""){

             $data['specialized']='';  

        }else{

             $data['specialized']=$this->input->post('ta5asos'); 

        }

         //------------------------------------------------- 

          if($file==""){

            $data['about_file']='';  

        }else{

             $data['about_file']=$file; 

        }

         //------------------------------------------------- 

         if($this->input->post('ta5asos')==""){

             $data['social_status']='';  

        }else{

             $data['social_status']=$this->input->post('status'); 

        }

          //------------------------------------------------- 

          if($this->input->post('nationalty')==""){

            $data['nationality']='';  

        }else{

             $data['nationality']=$this->input->post('nationalty'); 

        }

        //------------------------------------------------- 

          if($this->input->post('mobile')==""){

            $data['mobile']='';  

        }else{

             $data['mobile']=$this->input->post('mobile'); 

        }

         //-------------------------------------------------   

        if($this->input->post('phone')==""){

            $data['tele']='';  

        }else{

             $data['tele']=$this->input->post('phone'); 

        }

         //------------------------------------------------- 

        if($this->input->post('email')==""){

            $data['email']='';  

        }else{

             $data['email']=$this->input->post('email'); 

        }

         //------------------------------------------------- 

      if($this->input->post('fax')==""){

            $data['fax']='';  

        }else{

             $data['fax']=$this->input->post('fax'); 

        }

         //------------------------------------------------- 

          if($this->input->post('city')==""){

            $data['city']='';  

        }else{

             $data['city']=$this->input->post('city'); 

        }

         //------------------------------------------------- 

          if($this->input->post('town')==""){

            $data['alhai']='';  

        }else{

             $data['alhai']=$this->input->post('town'); 

        }

         //------------------------------------------------- 

           if($this->input->post('job')==""){

            $data['job']='';  

          }else{

             $data['job']=$this->input->post('job'); 

           }





           if($this->input->post('job') == 2){



             $data['keta3']=$this->input->post('keta3');



             $data['destination_job']=$this->input->post('work');



             $data['administration']=$this->input->post('edara');



             $data['title_job']=$this->input->post('work_name');



          



             }else{



              $data['keta3']='';



              $data['destination_job']="";



              $data['administration']='';



              $data['title_job']='';



             }



        //---------------------------------------     

       if($this->input->post('blood')==""){

            $data['blood_type']='';  

          }else{

             $data['blood_type']=$this->input->post('blood'); 

           }

        //---------------------------------------     

       if($this->input->post('diseases')==""){

            $data['diseases']='';  

          }else{

            $data['diseases']=$this->input->post('diseases'); 

           }

        //---------------------------------------  

            if($this->input->post('diseases')==1){



                 $data['diseases_type']=$this->input->post('type_sick');



                 $data['medical_insurance']=$this->input->post('insurance');



                 $data['company']=$this->input->post('company_name');



             }  else{



                 $data['diseases_type']=""; 



                 $data['medical_insurance']='';



                 $data['company']='';



             } 

       //---------------------------------------           

            $dd= $this->input->post('vehicle');

           if($dd==""){

            $data['fields_id']="";

           }else{

             $data['fields_id']=serialize($dd);

           }

        $data['volunteer_type']=$this->input->post('type_reg');

        $data['publisher'] = $_SESSION['user_id'];

        $data['date'] = $date;//strtotime(date("Y/m/d"));
        
        $data['date_s'] = time();

        

    $this->db->where('id', $id); 

    $this->db->update('volunteer',$data);



   }//end function  



 

 public  function search($word){

        

        $query =  $this->db->query("SELECT * FROM `volunteer` WHERE volunteer_type = 1 and suspend=1  and name LIKE '%".$word."%'");

                    

        if ($query->num_rows() > 0) {



            foreach ($query->result() as $row) {



                $data[] = $row;



            }



            return $data;



        }



        return false;

        

    }



/*********************/
public function insert_users($file,$last){
        $password=$this->input->post('user_pass',true);
           $type=($this->input->post('type_reg'));
           $type=$type+1;
           $lastt=$last+1;
        $password=sha1(md5($password));
        $data=array(
            "user_name"=>$this->input->post('user_username'),
            "user_username"=>$this->input->post('user_username'),
            "user_pass"=>$password,
            "user_email"=>$this->input->post('user_email'),
            "role_id_fk"=>$type,
            "type"=>$type,
            "vounter_id"=>$lastt,
            "user_phone"=>$this->input->post('user_phone'),
            "user_photo"=>$file
        );
        $done=$this->db->insert('users',$data);
        if($done==1){
            return true;
        }else{
            return false;
        }
    }
//----------------------------------------------------------------------------
public function get_last(){
        
        $this->db->select('*');
        $this->db->from('volunteer');
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get();
         if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data= $row->id;
            }
            return $data;
        }
        return false;
    
}
//---------------------------------------------------------------------------
  public function check_name($name){
        $this->db->from('users');
        $this->db->where("user_name",$name);  
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
         return true;   
        }else{
         return false;
        }
      } 



}//end clss