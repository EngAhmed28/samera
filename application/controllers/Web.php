<?php
class Web extends CI_Controller
{  // echo base_url().'asisst/web_asset/img/'somyraa1.png
    public $footer ;
    public $report;
    public $advert;
    public $voot;
    public $sites;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url','text','permission','form','cookie'));
        $this->load->library('pagination');
        $this->load->model('Sites');
        $this->sites = $this->Sites->select(3);
        $this->load->model('Main_data');
        $this->footer = $this->Main_data->select(1,0);
        $this->load->model('Reports');
        $this->report = $this->Reports->select_report();
        $this->load->model('Advertising');
        $this->advert = $this->Advertising->select_adver();
        $this->load->model('Vote');
        $this->voot = $this->Vote->select_vote();
        $this->load->model('Slider');
        $this->imgs=$this->Slider->get_all_img();
    }
    public  function intPart($float)
    {
        if ($float < -0.0000001)
            return ceil($float - 0.0000001);
        else
            return floor($float + 0.0000001);
    }
    public function Greg2Hijri(/*$day, $month, $year*/)
    {
        /*$day   = (int) $day;
        $month = (int) $month;
        $year  = (int) $year;*/
        $day   = (int) date("d");
        $month = (int) date("m");
        $year  = (int) date("Y");
        if (($year > 1582) or (($year == 1582) and ($month > 10)) or (($year == 1582) and ($month == 10) and ($day > 14)))
        {
            $jd = $this->intPart((1461*($year+4800+$this->intPart(($month-14)/12)))/4)+$this->intPart((367*($month-2-12*($this->intPart(($month-14)/12))))/12)-
                $this->intPart( (3* ($this->intPart(  ($year+4900+    $this->intPart( ($month-14)/12)     )/100)    )   ) /4)+$day-32075;
        }
        else
        {
            $jd = 367*$year-$this->intPart((7*($year+5001+$this->intPart(($month-9)/7)))/4)+$this->intPart((275*$month)/9)+$day+1729777;
        }
        $l = $jd-1948440+10632;
        $n = $this->intPart(($l-1)/10631);
        $l = $l-10631*$n+354;
        $j = ($this->intPart((10985-$l)/5316))*($this->intPart((50*$l)/17719))+($this->intPart($l/5670))*($this->intPart((43*$l)/15238));
        $l = $l-($this->intPart((30-$j)/15))*($this->intPart((17719*$j)/50))-($this->intPart($j/16))*($this->intPart((15238*$j)/43))+29;
        $month = $this->intPart((24*$l)/709);
        $day   = $l-$this->intPart((709*$month)/24);
        $year  = 30*$n+$j-30;
        $date = array();
        $date['year']  = $year;
        $date['month'] = $month;
        $date['day']   = $day;
        /*if (!$string)
            return $date;
        else*/
        //  return     "{$year}-{$month}-{$day}";
        return     "{$day}-{$month}-{$year}";
    }
    private function test($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
    private function message($type, $text)
    {
        if ($type == 'success') {
            return $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible shadow" data-sr="wait 0s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-check icn-xs"></i> تم بنجاح ...</h4><p>' . $text . '!</p></div>');
        } elseif ($type == 'wiring') {
            return $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible" data-sr="wait 0.6s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-triangle icn-xs"></i> تحذير هام ...</h4><p>' . $text . '</p></div>');
        } elseif ($type == 'error') {
            return $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" data-sr="wait 0.3s, then enter bottom and hustle 100%"><button type="button" class="close pull-left" data-dismiss="alert">×</button><h4 class="text-lg"><i class="fa fa-exclamation-circle icn-xs"></i> خطآ ...</h4><p>' . $text . '</p></div>');
        }
    }
    private function thumb($data)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] =$data['full_path'];
        $config['new_image'] = 'uploads/thumbs/'.$data['file_name'];
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['thumb_marker']='';
        $config['width'] = 275;
        $config['height'] = 250;
        $this->load->library('image_lib', $config);
        $this->image_lib->resize();
    }
    private  function upload_image($file_name){
        $config['upload_path'] = 'uploads/images';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf';
        $config['max_size']    = '1024*8';
        $config['encrypt_name']=true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else{
            $datafile = $this->upload->data();
            $this->thumb($datafile);
            return  $datafile['file_name'];
        }
        //  unlink($datafile['full_path']);
    }
    //////////////////////////////////
    private  function upload_file($file_name){
        $config['upload_path'] = 'uploads/files';
        $config['allowed_types'] = 'gif|Gif|ico|ICO|jpg|JPG|jpeg|JPEG|BNG|png|PNG|bmp|BMP|WMV|wmv|MP3|mp3|FLV|flv|SWF|swf|pdf|PDF|xls|xlsx|mp4|doc|docx|txt|rar|tar.gz|zip';
        $config['max_size']    = '1024*8';
        //$config['encrypt_name']=true;
        $config['overwrite'] = true;
        $this->load->library('upload',$config);
        if(! $this->upload->do_upload($file_name)){
            return  false;
        }else {
            $datafile = $this->upload->data();
            return $datafile['file_name'];
        }
    }
    private function pagnate($method,$recordcount,$per_page,$segment){
        $config = array();
        $config["base_url"] = base_url() . "Web/".$method;
        $config["total_rows"] = $recordcount;
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $segment;
        $config['use_page_numbers'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination" >';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<li class="disabled"><a href="#">«</a></li>';
        $config['last_link'] = '<li><a href="#">»</a></li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
        return $config;
    }
    ////////////////////end of excel library option
    public function index(){
        $this->load->model('News');
        $this->load->model('Main_dep');
        $this->load->model('Gehat_da3ma');
        $this->load->model('Slider');
        $this->load->model("Difined_model");
        $data['projects'] = $this->Difined_model->select_all("projects","","","",'');
        $data['records']=$this->News->select_web(9,0,'',''); // replace
        $data['records4']=$this->Gehat_da3ma->select('',''); // replace
        $data['opinion'] = $this->Difined_model->select_all("opinions","","","",'');
        $data['records2']=$this->News->select_web(8,0,'','');
        $data['records3']=$this->Main_dep->select(6);
        $data['imgs']=$this->Slider->get_all_img();
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/home';
        $this->load->view('web/home', $data);
    }
    public function details($id,$type){
       $this->load->model('News');
       $this->load->model('Difined_model');
       $this->load->model('Web_model');
       /* $data['records']=$this->News->select_web(1,$type,$id,'');
        $data['records2']=$this->News->select_web('',$type,'','');
        $config=$this->pagnate('details/'.$id.'/'.$type.'',($this->News->record_count($type)-1),7,5);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $page = (($page*7)-7);
        if($page<0)
            $page = 0;
        $data['records3']=$this->News->select_except($config["per_page"],$type,$id,$page);
        $data["links"] = $this->pagination->create_links();
        $this->load->model('Users');
        for($r = 0 ; $r < count($data['records']) ; $r++)
            $data['user'][$r]=$this->Users->display($data['records'][$r]->publisher); */
        $data["defult_image_path"]= base_url().'asisst/web_asset/img/somyraa1.png';
        $data["result"]=$this->Difined_model->getByArray("news",array('type' => $type, 'id' => $id));
        $data['other_news']=$this->News->select_except(10,$type,$id,"");
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/details-news';
        $this->load->view('index1', $data);
    }
    public function news($type){
    $this->load->model('News');
        $config=$this->pagnate('news/'.$type.'',$this->News->record_count($type),"",4);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = (($page*9)-9);
        if($page<0)
            $page = 0;
        $data['records']=$this->News->select_web($config["per_page"],$type,'',$page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/news';
        $this->load->view('index1', $data);
    }
    public function journalist($type){
        $this->load->model('News');
        $config=$this->pagnate('journalist/'.$type.'',$this->News->record_count($type),19,4);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = (($page*19)-19);
        if($page<0)
            $page = 0;
        $data['records']=$this->News->select_web($config["per_page"],$type,'',$page);
        $data["links"] = $this->pagination->create_links();
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/journalist';
        $this->load->view('index1', $data);
    }
    public function about(){
        $this->load->model('About');
        $data['records']=$this->About->select_web();
        $data['title'] ='عن الجمعية';
        $data['subview'] = 'web/about';
        $this->load->view('index1', $data);
    }
    public function resala(){
        $this->load->model('Manager_word');
        $data['records']=$this->Manager_word->select('',4);
        $data['title'] ='رسالة الجمعية';
        $data['subview'] = 'web/results';
        $this->load->view('index1', $data);
    }

    public function Donors(){
        $this->load->model('Gehat_da3ma');
        $data['records']=$this->Gehat_da3ma->all_select();
        $data['title'] = 'الجهات المانحة والداعمة';
        $data['subview'] = 'web/sponsers';
        $this->load->view('index1', $data);
    }
    public function vision(){
        $this->load->model('Manager_word');
        $data['records']=$this->Manager_word->select('',5);
        $data['title'] ='رؤية الجمعية';
        $data['subview'] = 'web/vision';
        $this->load->view('index1', $data);
    }
    public function goals(){
        $this->load->model('Manager_word');
        $data['records']=$this->Manager_word->select('',3);
        $data['title'] ='أهداف الجمعية';
        $data['subview'] = 'web/goals';
        $this->load->view('index1', $data);
    }
    public function manager_word(){
        $this->load->model('Manager_word');
        $data['records']=$this->Manager_word->select('',1);
        $data['title'] ='كلمة رئيس مجلس الإدارة';
        $data['subview'] = 'web/manager_word';
        $this->load->view('index1', $data);
    }
    public function ameen_word(){
        $this->load->model('Manager_word');
        $data['records']=$this->Manager_word->select('',2);
        $data['title'] ='كلمة الأمين العام';
        $data['subview'] = 'web/ameen_word';
        $this->load->view('index1', $data);
    }
    public function members(){
        $this->load->model('Members');
        $data['records']=$this->Members->select_web();
        $data['title'] ='أعضاء مجلس الإدارة';
        $data['subview'] = 'web/members';
        $this->load->view('index1', $data);
    }
    public function sayings(){
        $this->load->model('Sayings');
        $data['records']=$this->Sayings->select_web();
        $data['title'] ='قالوا عن الجمعية';
        $data['subview'] = 'web/sayings';
        $this->load->view('index1', $data);
    }
    public function course()
    {
        $this->load->model('Sessions');
        $data['records'] = $this->Sessions->select();
        $data['title'] ='كورسات';
        $data['subview'] = 'web/course';
        $this->load->view('index1', $data);
    }
    public function contact()
    {
        if($this->input->post('send'))
        {
            $this->load->model('Contact');
            $date = $this->Greg2Hijri();
            $this->Contact->insert($this->input->post('email'),$date);
            $this->message('success',' إرسال الرسالة');
            redirect('web/contact');
        }
        $data['title'] ='إتصل بنا';
        $data['subview'] = 'web/contact';
        $this->load->view('index1', $data);
    }
    public function idea()
    {
        if($this->input->post('send'))
        {
            $this->load->model('Idea');
            $date = $this->Greg2Hijri();
            $this->Idea->insert($this->input->post('email'),$date);
            $this->message('success',' إرسال الفكرة');
            redirect('web/idea');
        }
        $data['title'] ='طرح فكرة';
        $data['subview'] = 'web/idea';
        $this->load->view('index1', $data);
    }
    /**
     * Abd Al-Razeq
     *
     * **/
    public function session_request(){
        $id = $this->uri->segment(3);
        $this->load->model('Sessions');
        $data['sessions']=$this->Sessions->select();
        $data['reeee']=$this->Sessions-> getById($id);
        $this->load->model('Sessions_reserve');
        if ($this->input->post('add_sessions_reserve')){
            $this->Sessions_reserve->inserted();
            $this->message('success','ارسال طلب الحجز');
            redirect('web/session_request','refresh');
        }
        $data['title'] = 'اضافة حجز الكورسات .';
        $data['subview'] = 'web/session_request';
        $this->load->view('index1', $data);
    }
    public function course_details(){
        $id = $this->uri->segment(3);
        if($id==0){
            redirect(base_url('course'));
        }
        $this->load->model('Sessions');
        $data['records']=$this->Sessions->select();
        $data['reeee']=$this->Sessions-> getById($id);
        $data['title'] = 'تفاصيل كورس';
        $data['subview'] = 'web/course_details';
        $this->load->view('index1', $data);
    }
    /**
     *** م. أحمد
     */
    public function img(){
        $this->load->model('Album');
        $data['records']=$this->Album->select();
        $data['title'] ='مكتبة الصور';
        $data['subview'] = 'web/img-gallery';
        $this->load->view('index1', $data);
    }
    ///////////////////////////////////////////////
    public function img_details($id){
        $this->load->model('Album');
        $data['records4']=$this->Album->select_imgs($id);
        $data['title'] ='مكتبة الصور';
        $data['subview'] = 'web/img_details';
        $this->load->view('index1', $data);
    }
    /////////////////////////
    public function voters() {
        $this->load->model('Vote');
        if ($this->input->post('vote')) {
            if(isset($_COOKIE['rateLikeChnage_3'])){}
            else{
            //    var_dump($this->input->post['voting']);die;
                $this->Vote->update_v($_POST['voting']);
                setcookie('rateLikeChnage_3', 'rateLikeChnage_3',time() + 3600 );
            }
        }
        redirect('web');
    }
public function ahmed(){
    $this->test($_COOKIE);
    

}

    /* public function voters() {
        $url = explode('web/',$this->input->post('url'));
        $this->load->model('Vote');
        if ($this->input->post('vote')) {
            if(isset($_COOKIE['rateLikeChnage_3'])){}
            else{
                $this->Vote->update_v($_POST['voting']);
                setcookie('rateLikeChnage_3', 'rateLikeChnage_3',time() + 3600 );
            }
        }
        redirect('web/'.$url[1].'');
    } */
    ///////////////////
    public function download($file)
    {
        $url = explode('web/',$this->input->post('url'));
        $this->load->helper('download');
        $name = $file;
        $data = file_get_contents('./uploads/files/'.$file);
        force_download($name, $data);
        redirect('web/'.$url[1].'');
    }
    //*****************************************************************************************************************//
    public function add_web_app(){
        $this->load->model('App');
        $data['gender'] =$this->App->get_all_define(1);
        $data['learn'] =$this->App->get_all_define(2);
        $data['status'] =$this->App->get_all_define(3);
        $data['blood'] =$this->App->get_all_define(6);
        $data_load['work'] =$this->App->get_all_define(4);
        $data_load2['place_work'] =$this->App->get_all_define(5);
        $data_load3['desiss'] =$this->App->get_all_define(7);
        $data['nationalty'] =$this->App->get_all_define(8);
        $data['city'] =$this->App->get_all_define(9);
        $data["all_dep"]=$this->App->get_all_departments();
        if ($this->input->post('add_registration')){
            //--------------------------------------
            $user_img='user_photo';
            $file_img= $this->upload_image($user_img);
            if($file_img == false){
                $file_img='user.png';
                $this->message('error','نوع الملفات غير مسموح به');
            }
            $last_id=$this->App->get_last();
            $this->App->insert_users($file_img,$last_id);
            //----------------------------------
            $file_name='cv';
            $file= $this->upload_file($file_name);
            $date = $this->Greg2Hijri();
            $this->App->insert($file,$date,$last_id+1);
            $this->message('success','إضافة استمارة تسجيل');
            redirect('Web/add_web_app');
        }elseif($this->input->post('num')){
            $this->load->view('web/x/x',$data_load);
        }elseif($this->input->post('keta3')!=''){
            $data_load2["type_work"]=$this->App->get_work_type($this->input->post('keta3'));
            $this->load->view('web/x/d',$data_load2);
        }elseif($this->input->post('sick') != ""){
            $this->load->view('web/x/s',$data_load3);
        }
//----------------------------------------------------
        elseif($this->input->post('user_username_chik')){
            // var_dump($_POST);
            // die;
            $data_load['name_chik']=$this->App->check_name($this->input->post('user_username_chik'));
            $this->load->view('web/load',$data_load);
        }
//----------------------------------
        else{
            $data['title'] = 'إستمارة تسجيل';
            $data['metakeyword'] = 'إعدادات البريد الاليكترونى ';
            $data['metadiscription'] = '';
            $data['subview'] = 'web/addApp';
            $this->load->view('index1',$data);
        }// end else
    }
    /*
      public function add_web_app(){
          $this->load->model('App');
           $data['gender'] =$this->App->get_all_define(1);
           $data['learn'] =$this->App->get_all_define(2);
           $data['status'] =$this->App->get_all_define(3);
           $data['blood'] =$this->App->get_all_define(6);
           $data_load['work'] =$this->App->get_all_define(4);
           $data_load2['place_work'] =$this->App->get_all_define(5);
           $data_load3['desiss'] =$this->App->get_all_define(7);
           $data["all_dep"]=$this->App->get_all_departments();
      if ($this->input->post('add_registration')){
               $file_name='cv';
                $file= $this->upload_file($file_name);
    $date = $this->Greg2Hijri();
                $this->App->insert($file,$date);
                $this->message('success','إضافة استمارة تسجيل');
                redirect('Web/add_web_app');
                }elseif($this->input->post('num')){
        // redio button
       $this->load->view('web/x/x',$data_load);
    }elseif($this->input->post('keta3')!=''){
        // subload
         $data_load2["type_work"]=$this->App->get_work_type($this->input->post('keta3'));
         $this->load->view('web/x/d',$data_load2);
    }elseif($this->input->post('sick') != ""){
         $this->load->view('web/x/s',$data_load3);
    }else{
           //  $config=$this->pagnate('addreports',$this->App->record_count(),50);
          //  $data['records']=$this->App->select($config["per_page"]);
          //  $data["links"] = $this->pagination->create_links();
        $data['title'] = 'إستمارة تسجيل';
        $data['metakeyword'] = 'إعدادات البريد الاليكترونى ';
        $data['metadiscription'] = '';
        $data['subview'] = 'web/addApp';
        $this->load->view('index1',$data);
    }
      }
    */
    /**
     *---------------------------------- 23-1-2017 -------------------------------
     *
     *
     *
     */
    public function gehat_da3ma(){
        $this->load->model('Gehat_da3ma');
        $data['records']=$this->Gehat_da3ma->all_select();
        $data['title'] = 'إستمارة تسجيل';
        $data['metakeyword'] = 'إعدادات البريد الاليكترونى ';
        $data['metadiscription'] = '';
        $data['subview'] = 'web/gehat_da3ma_web';
        $this->load->view('index1',$data);
    }
//**********************************************************************************************
    public function tataw3_work($type){
        $this->load->model('Work');
        //   var_dump($this->Approve_works->select_without(1));
        //  die;
        $config=$this->pagnate('tataw3_work/'.$type.'',$this->Work->record_count_active($type),9,4);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $page = (($page*9)-9);
        if($page<0)
            $page = 0;
        //   $data['records']=$this->News->select_web($config["per_page"],$type,'',$page);
        $data['records']=$this->Work->select_limit($config["per_page"],$type,'',$page);
        $data['imagesof']=$this->Work->getdetails();
        //      var_dump($data['imagesof']);
        //    die;
        //  $data['records']=$this->Approve_works->select_without(1);
        $data["links"] = $this->pagination->create_links();
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/tataw3_work';
        $this->load->view('index1', $data);
//TbahDgz-4dk
    }
//********************************************************************************************************************
    public function work_details($id,$type){
        //Work
        $this->load->model('Work');
        $data['one_work']=$this->Work->select_limit(1,$type,$id,'');
        //var_dump($data['one_work']);
        //die;
        $data['records2']=$this->Work->select_limit('',$type,'','');
        $config=$this->pagnate('work_details/'.$id.'/'.$type.'',($this->Work->record_count_active($type)-1),7,5);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $page = (($page*7)-7);
        if($page<0)
            $page = 0;
        $data['imagesof']=$this->Work->getdetails();
        // var_dump($data['imagesof']);
        // die;
        $data['other_work']=$this->Work->select_except($config["per_page"],$type,$id,$page);
        $data["links"] = $this->pagination->create_links();
        $this->load->model('Users');
        for($r = 0 ; $r < count($data['one_work']) ; $r++){
            $data['user'][$r]=$this->Users->display($data['one_work'][$r]->publisher);
        }
        $data['title'] ='جمعية سميراء';
        $data['subview'] = 'web/work_details';
        $this->load->view('index1', $data);
    }
//-----------------------------------------------------------------------------------------
    public function dalil_vounter(){
        $this->load->model('App');
        $data['gender']=$this->App->get_all_define(1);
        $this->load->model('Add_team');
        $data["all_vounters"]=$this->Add_team->all_subs();
        $data['team_manes']=$this->Add_team->data_vounter_other();
        $data['user_manes']=$this->Add_team->data_users();
        $data['vounter_one']=$this->Add_team->data_vounter_one();
        $data['gender_name']=$this->Add_team->get_gender_name();
        $data['metadiscription'] = '';
        $data['subview'] = 'web/dalil_vounter';
        $this->load->view('index1', $data);
    }
    public function log_in()
    {
        $this->load->model('Users');
        if($this->input->post('login'))
        {
            $userdata=$this->Users->check_user_data();
            if($userdata !=''){
                $userdata['is_logged_in']=true;
                $this->session->set_userdata($userdata);
                redirect('dashboard');
            }else{
                $data['title']='تسجيل الدخول الى نظام إدارة مركز حائل للعمل التطوعي';
                $data['metakeyword']=' مركز حائل للعمل التطوعي';
                $data['metadiscription']=' مركز حائل للعمل التطوعي';
                $data['response']="خطأفى بيانات الادخال";
                $this->load->view('admin/users/login',$data);
            }
        }
    }
    public function search()
    {
        $this->load->model('App');
        if($this->input->post('search'))
        {
            $data['records'] = $this->App->search($this->input->post('title'));
        }
        $data['subview'] = 'web/search';
        $this->load->view('index1', $data);
    }
    public function courses(){
        $this->load->model('Courses');
        $data['records']=$this->Courses->select();
        $data['title'] ='الدورات التدريبية';
        $data['subview'] = 'web/courses';
        $this->load->view('index1', $data);
    }
    public function reserve(){
        $this->load->model('Courses');
        if ($this->input->post('save')){
            if ($this->Courses->reserve()==1){
                $this->message('success','تم تسجيلك بنجاح فى الدورة') ;
            }else{
                $this->message('error','خطأفى التسجيل تاكد من بياناتك واعد المحاولة') ;
            }
        }
        $data['title'] ='الدورات التدريبية';
        $data['subview'] = 'web/reserve';
        $this->load->view('index1', $data);
    }
//*******************************************************************************************************************//
    /*
     public function add_patient_reserve($id){
            $this->load->model('Person');
             $this->load->model('Main_data');
             $data['debaga']=$this->Main_data->select_data();
            $data['record']=$this->Person->getById($id);
              $data['day_date']=$this->Greg2Hijri();
             //var_dump($data['day_date']);
            $data['title'] = 'طباعة تقرير عادي.';
            $data['metakeyword'] = 'طباعة تقرير عادي ';
            $data['metadiscription'] = '';
            $data['subview'] = 'web/debaga/debaga';
            $this->load->view('index', $data);
        }
         public function add_diagnosis($id){
             $this->load->model('Person');
             $this->load->model('Main_data');
             $data['debaga']=$this->Main_data->select_data();
             $data['day_date']=$this->Greg2Hijri();
            $data['record']=$this->Person->getById($id);
            $data['title'] = 'طباعة تقرير مسجد.';
            $data['metakeyword'] = 'طباعة تقرير مسجد ';
            $data['metadiscription'] = '';
            $data['subview'] = 'web/debaga/debaga2';
            $this->load->view('index', $data);
        }
        */
    //-----------------------------------------------------
    public function add_person()
    {
        $this->load->model('Person');
        if($this->input->post('add_person')){
            $file_name='orphan_prove';
            $date = $this->Greg2Hijri();
            $file= $this->upload_image($file_name);
            $this->Person->insert($file,$date);
            $this->message('success','تم الحفظ');
            redirect('web/add_person','refresh');
        }
        if($this->input->post('social'))
        {
            $data = '';
            if($this->input->post('social') == 16)
                $this->load->view('web/person/social',$data);
        }
        elseif($this->input->post('valu'))
        {
            $data = '';
            if($this->input->post('valu') == 7)
                $this->load->view('web/person/rent',$data);
        }
        elseif($this->input->post('num'))
        {
            $data = '';
            if($this->input->post('num') != 0)
                $this->load->view('web/person/table',$data);
        }
        else
        {
            $data['recordss'] = $this->Person->select();
            $data['records'] = $data['recordss'][0];
            $data['papers'] = $data['recordss'][1];
            $data['health_state'] = $this->Person->get_define(3);
            $data['house_type'] = $this->Person->get_define(1);
            $data['house_state'] = $this->Person->get_define(2);
            $data['social_status'] = $this->Person->get_define(4);
            $data['place'] = $this->Person->get_define2(7);
            $data['benefit'] = $this->Person->get_define2(8);
            $data['title'] = 'إضافة تعريف عن طالب المساعدة';
            $data['metakeyword'] = 'إضافة بيانات';
            $data['metadiscription'] = '';
           // $data['subview'] = 'web/person/person';
            $this->load->view('web/person/person', $data);
        }
    }
    //--------------------------------------------------------
    public function search_id(){
        if ($this->input->post('id')!= ""){
            $this->load->model('Person');
            $data['all_data']=$this->Person->search_web($this->input->post('id'));
            $data['person'] = $data['all_data'][0];
            $data['education'] = $data['all_data'][1];
            $data['income'] = $data['all_data'][2];
            $this->load->view('web/papers',$data);
        }else{
            $data['title'] = 'أوراق';
            $data['subview'] = 'web/search';
            $this->load->view('index1', $data);
        }
    }
    public function add_patient_reserve($id){
        $this->load->model('Person');
        $this->load->model('Main_data');
        $data['debaga']=$this->Main_data->select_data();
        $data['record']=$this->Person->getById($id);
        $data['day_date']=$this->Greg2Hijri();
        //var_dump($data['record']);
        $data['title'] = 'طباعة تقرير عادي.';
        $data['metakeyword'] = 'طباعة تقرير عادي ';
        $data['metadiscription'] = '';
        $data['subview'] = 'web/debaga/debaga';
        $this->load->view('index1', $data);
    }
    public function add_diagnosis($id){
        $this->load->model('Person');
        $this->load->model('Main_data');
        $data['debaga']=$this->Main_data->select_data();
        $data['day_date']=$this->Greg2Hijri();
        $data['record']=$this->Person->getById($id);
        $data['title'] = 'طباعة تقرير مسجد.';
        $data['metakeyword'] = 'طباعة تقرير مسجد ';
        $data['metadiscription'] = '';
        $data['subview'] = 'web/debaga/debaga2';
        $this->load->view('index1', $data);
    }
    public function request_print($id){
        $this->load->model('Person');
        $this->load->model('Main_data');
        $data['social_status'] = $this->Person->get_define(4);
        $data['house_type'] = $this->Person->get_define(1);
        $data['house_state'] = $this->Person->get_define(2);
        $data['health_state'] = $this->Person->get_define(3);
        $data['debaga']=$this->Main_data->select_data();
        $data['day_date']=$this->Greg2Hijri();
        $data['result'] = $this->Person->getById($id);
        $data['result3'] = $data['result'][2];
        $data['record']=$this->Person->getById($id);
        $data['title'] = 'طباعة إستمارة طلب مساعدة.';
        $data['metakeyword'] = 'طباعة إستمارة طلب مساعدة ';
        $data['metadiscription'] = '';
        $data['subview'] = 'web/debaga/request';
        $this->load->view('index1', $data);
    }
 /**
     * ======================================================================================================
     * 
     * 
     */   
    public function project_details($id){
    $this->load->model('Project');
    $this->load->model('Difined_model');
    $this->load->model('Web_model');
    $data["defult_image_path"]= base_url().'asisst/web_asset/img/somyraa1.png';
    $data["result"]=$this->Difined_model->getByArray("projects",array('id' => $id));
    $data['other_projects']=$this->Project->select_except(10,12,$id,"");
    $data['title'] ='جمعية سميراء';
    $data['subview'] = 'web/details_projects';
    $this->load->view('index1', $data);
    }
    //---------------------------------------
     public function tester(){
           $this->load->model('Difined_model');
         //  $this->Difined_model->select_all("projects","","","",'');
           $this->test($this->Difined_model->set());
     }
    
    
    
}// end CLASS 