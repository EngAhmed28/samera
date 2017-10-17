<?php

class Get_statics extends CI_Model

{

    public function __construct() {

        parent::__construct();

    }

    public function record_count($table,$type_name,$type_value) {
   
            $query=$this->db->query('SELECT * FROM `'.$table.'` WHERE '.$type_name.'='.$type_value );
        
        return $query->num_rows();

    }

  public function record_count1($table,$type_name,$type_value) {
   
            $query=$this->db->query('SELECT * FROM `'.$table.'` WHERE suspend=1 AND   '.$type_name.'='.$type_value );
        
        return $query->num_rows();

    }





}