<?phpclass Groups extends  CI_Model{    public function __construct() {        parent::__construct();    }    public function addGroup(){        $this->db->select_max('group_order');        $res1 = $this->db->get('groups');        $res2 = $res1->result_array();        $group_ordermax = $res2[0]['group_order']+1;        $data = array('group_title'=>  $this->input->post('group_title'),            'group_link'=>$this->input->post('group_link'),            'group_order'=>$group_ordermax,            'group_icon_code'=>$this->input->post('group_icon_code'));           $insert= $this->db->insert('groups', $data);        if($insert==1){            return true;        }else{            return false;        }    }    public function record_count() {        return $this->db->count_all("groups");    }    public function fetch_groups($limit, $start) {        $this->db->limit($limit, $start);        $query = $this->db->get("groups");        if ($query->num_rows() > 0) {            foreach ($query->result() as $row) {                $data[] = $row;            }            return $data;        }        return false;    }public  function getgroupbyid($id){    $query= $this->db->get_where('groups',array('group_id'=>$id));    return $query->row_array();}    function updateGroup($id,$data)    {        $this->db->where('group_id', $id);        if ($this->db->update('groups', $data)) {            return true;        } else {            return false;        }    }public  function get_group($id){    $this->db->select('*');    $this->db->from('pages');$this->db->where("group_id_fk",$id);    $this->db->order_by('page_order','ASC');    $query = $this->db->get();    if ($query->num_rows() > 0) {        foreach ($query->result() as $row) {            $data[] = $row;        }        return $data;    }    return false;}//------------------------------------------------    public function get_categories(){        $this->db->select('*');        $this->db->from('groups');      //  $this->db->where("group_id_fk",0);      $this->db->order_by("group_order","ASC");        $parent = $this->db->get();        $categories = $parent->result();        $i=0;        foreach($categories as $p_cat){            $categories[$i]->sub = $this->sub_categories($p_cat->group_id);            $i++;        }        return $categories;    }    public function sub_categories($id){        $this->db->select('*');        $this->db->from('pages');        $this->db->where('group_id_fk', $id);        $this->db->order_by("page_order","ASC");        $child = $this->db->get();        $categories = $child->result();        $i=0;        foreach($categories as $p_cat){            //    $categories[$i]->total = $this->get_tatal($p_cat->id);       //  $categories[$i]->sub = $this->sub_categories($p_cat->page_id);            $i++;        }        return $categories;    }   //------------------------------------------------}