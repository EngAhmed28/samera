<style>
    .r-head .container {
        border: 2px solid #333;
        width: 100%;
    }
    
    
   
    
    .col-xs-1,
    .col-xs-2 {
        padding: 0;
    }
    
    .line,
    .line-two {
        margin-top: 2px;
        border-bottom: 2px dashed black;
        width: 74%;
        margin-left: 120px;
    }
    
    img {
        margin-top: 10px;
    }
</style>
<div class="hidden-print">
<h2 class="text-flat ">إدارةطلبات المساعدة <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
 <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
 <li class="active"><?php echo $title; ?></li>
</ul>

       <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
</div>
<div class="well bs-component" >

<fieldset>

<body>
    <div class="r-head col-xs-12">
        <div class="container">
            <div class="col-xs-12">
                <div class="col-xs-6"><h6>
                     المملكة العربية السعودية <br />
                منطقة حائل - محافظة سميراء <br />
                الجمعية الخيرية بمحافظة سميراء <br />
                تحت اشراف وزارة العمل والتنمية الإجتماعية<br/>
                سجلت برقم 287
                </h6>
                </div>
              
                <div class="col-xs-4"></div>
                <div class="col-xs-2">
                    <img src="<?php echo base_url('uploads/images/'.$debaga[0]->logo.''); ?>" alt="" width="200px" height="70px">
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-4"></div>
                <div class="col-xs-5">
                    <h5 class="text-center" style="margin-top:-30px ;"><b> <u>نتيجة البحث وقرار مجلس الادارة</u></b></h5></div>
                <div class="col-xs-3"></div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3"></div>
                <div class="col-xs-3">
                    <h6 class="text-center"> اجتماع رقم ( <?php
                    if($all_data){
                        echo $all_data[0]->number;
                    }else{
                        
                    }
                     ?> )</h6>
                </div>
                <div class="col-xs-3">
                    <h6 class="text-center">  في  <?php
                  
                   
                    if($all_data){
                        echo $all_data[0]->dt ;
                    }else{
                        
                    }
                     ?> هــ </h6>
                </div>
                <div class="col-xs-3">
                    <h6 class="text-center">  رقم الملف ( <?php
                    if($all_data){
                        echo $all_data[0]->id.'/'.$all_data[0]->place;
                    }else{
                        
                    }
                     ?> )</h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-1">
                    <h6 class="text-right"> الحالة : </h6>
                </div>
               
              
             
             
                <div class="col-xs-2">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> <?php echo $all_defines[$all_data[0]->social_status]; ?>
                  </h6>
                </div>
              
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <h6> اسم المستفيد : <span><?php echo $all_data[0]->name; ?> </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  رقم السجل المدني : <span> <?php echo $all_data[0]->card_num; ?>  </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  تاريخ الميلاد  : <span> <?php echo $all_data[0]->birth_date; ?> هـ </span></h6>
                </div>
                <?php
                
                    function intPart($float)
                    {
                        if ($float < -0.0000001)
                            return ceil($float - 0.0000001);
                        else
                            return floor($float + 0.0000001);
                    }
                
               function HijriToJD($d, $m, $y)
        {
            $day   = (int) $d;
            $month = (int) $m;
            $year  = (int) $y;
        
            $jd = intPart((11*$year+3) / 30) + 354 * $year + 30 * $month - intPart(($month-1)/2) + $day + 1948440 - 385;
        
            if ($jd > 2299160)
            {
                $l = $jd+68569;
                $n = intPart((4*$l)/146097);
                $l = $l-intPart((146097*$n+3)/4);
                $i = intPart((4000*($l+1))/1461001);
                $l = $l-intPart((1461*$i)/4)+31;
                $j = intPart((80*$l)/2447);
                $day = $l-intPart((2447*$j)/80);
                $l = intPart($j/11);
                $month = $j+2-12*$l;
                $year  = 100*($n-49)+$i+$l;
            }
            else
            {
                $j = $jd+1402;
                $k = intPart(($j-1)/1461);
                $l = $j-1461*$k;
                $n = intPart(($l-1)/365)-intPart($l/1461);
                $i = $l-365*$n+30;
                $j = intPart((80*$i)/2447);
                $day = $i-intPart((2447*$j)/80);
                $i = intPart($j/11);
                $month = $j+2-12*$i;
                $year = 4*$k+$n+$i-4716;
            }
            
            $data = array();
            $date['year']  = $year;
            $date['month'] = $month;
            $date['day']   = $day;
            
                return     "{$year}-{$month}-{$day}";
        }
                
                $birth_date = explode('/',$all_data[0]->birth_date);
            $birth = HijriToJD($birth_date[2],$birth_date[1],$birth_date[0]);
            
      
    
    
    $bday = new DateTime($birth);
    
$today = new DateTime(''.date("Y-m-d").' 00:00:00'); 

$diff = $today->diff($bday);
                
                ?>
                <div class="col-xs-3">
                    <h6> العمر : <span><?php printf('%d سنة', $diff->y); ?></span></h6>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <h6> عدد افراد الاسرة : <span> (<?php echo $all_data[0]->femal_num + $all_data[0]->male_num +1 ?>) </span></h6>
                </div>
                
                
                 <?php
            
      $famil= ($all_data[0]->femal_num+$all_data[0]->male_num+1);
       if(isset($all_data[0]->salary) && $all_data[0]->salary!= null){
       $salary=$all_data[0]->salary;
      
       }else{
        $salary =0;
        
       }
       
        if(isset($all_data[0]->id) && $all_data[0]->id!= null){
        $this->db->select('*');
        $this->db->from('income');
        $this->db->where('person_id',$all_data[0]->id);
        $query = $this->db->get();
        $dataa= $query->row_array(); 
       
           $society = $dataa['society'];
           $retirement = $dataa['retirement'];
           $awqaf = $dataa['awqaf'];
           $waned = $dataa['3waned'];
         
           $other = $dataa['other'];
           $total = $dataa['total'];
           $retard= $dataa['retard'];
           $begger = $dataa['begger'];
           $akar = $dataa['aqar'];
           $ta2meen = $dataa['ta2meen'];
             
             
            }
    
            
            ?>
                <div class="col-xs-3">
                    <h6> متوسط دخل الفرد : <span> (<?php  
echo sprintf('%0.0f',($salary+$society+$retirement+$awqaf+$waned+$other+$retard+$begger+$akar+$ta2meen)/($all_data[0]->femal_num + $all_data[0]->male_num +1))?>) ريال</span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  تقرير طبي : 
                  <?php 
                  
                  if($all_data[0]->medical == 2)
                    echo 'يوجد';
                  else
                    echo 'لا يوجد';
                  
                   ?>
                   </h6>
                </div>
                <div class="col-xs-3">
                    <h6>  السكن : <span> <?php echo $all_defines[$all_data[0]->place]; ?> </span></h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h6>  رأي الباحث الاجتماعي :  <?php echo strip_tags($all_data[0]->opinion); ?>. </h6>
                </div>
                <div class="col-xs-3">
                
                <?php
$researcher='';
if(isset($result66[$this->uri->segment(3)])&&$result66[$this->uri->segment(3)]!=null)
    {
if(isset($result66[$this->uri->segment(3)]->researcher_id)){
            if($result66[$this->uri->segment(3)]->researcher_id != 0)
                $researcher = $client[$result66[$this->uri->segment(3)]->researcher_id]->name;
            else
                $researcher = 'Admin';
        }
        else
            $researcher = '';
}
?>
                    <h6>  الاسم :<?php  echo $researcher?></h6>
                </div>
                <div class="col-xs-3">
                    <h6> التوقيع : <span> ...........................</span> </h6>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="line"></div>
                <div class="line-two"></div>
            </div>
            <div class="col-xs-12">
                <h5> <b>بعد الاطلاع والمناقشة والدراسة لكامل ملف المذكور أعلاه فان مجلس الادارة قرر ما يلي </b></h5>
              
     
<div class="row">

<div class="col-md-2 ">

</div>

<div class="col-md-5 ">
<?php

 if(isset($all_data) && $all_data!=null ){
if($all_data[0]->checked == 1){
 $status1="checked='checked'";

        }else{
            $status1 = ''; 
        }  
        
        if($all_data[0]->checked == 2){
 $status2="checked='checked'";

        }else{
            $status2 = ''; 
        }  
        
  if($all_data[0]->checked == 3){
 $status3="checked='checked'";

        }else{
            $status3 = ''; 
        }
        
 }else{
    $status1='';
     $status2='';
      $status3='';
 }
?>
     <input type="radio" name="checked" value="1" <?php echo $status1 ;?> disabled /> يستحق الدعم النقدي والعيني من الفئة <br />
   <input type="radio" name="checked" value="2" <?php echo $status2 ;?>  disabled  /> يستحق الدعم العيني فقط من الفئة <br />
     <input type="radio" name="checked" value="3"  <?php echo $status3 ;?>   disabled   /> يستبعد من اي دعم وذلك للاسباب التالية <br />
</div>

<div class="col-md-5 ">
<?php

 if(isset($all_data) && $all_data!=null ){
if($all_data[0]->fileds == 1){
 $stta1="checked='checked'";

        }else{
            $stta1 = ''; 
        }  
        
        if($all_data[0]->fileds == 2){
 $stta2="checked='checked'";

        }else{
            $stta2 = ''; 
        }  
        
  if($all_data[0]->fileds == 3){
 $stta3="checked='checked'";

        }else{
            $stta3 = ''; 
        }
        
 }else{
    $stta1='';
     $stta2='';
      $stta3='';
 }
?>
     <input type="radio" name="fileds" value="1" <?php echo $stta1 ;?>  disabled  /> (أ) &nbsp;&nbsp;&nbsp;
     <input type="radio" name="fileds" value="2"  <?php echo $stta2 ;?> disabled  /> (ب) &nbsp;&nbsp;&nbsp;
     <input type="radio" name="fileds" value="3"  <?php echo $stta3 ;?> disabled   /> (ج) &nbsp;&nbsp;&nbsp;

</div>
</div>
       <div class="col-md-12" >
      
<?php

  if(isset($all_data) && $all_data!=null ){
 echo'  <h6>  التفاصيل  : <span>'.$all_data[0]->details .'</span></h6>';

 }else{
 echo'<h6> التفاصيل : <span>................</span> </h6> ';
 }
?>

 </div>
  
          
            </div>
            <div class="col-xs-12" >
                    <?php
      
if($all_data[0]->committee_id){
 $memr= $all_data[0]->committee_id;
 $committee_id = unserialize($memr);
        }else{
            $committee_id = ''; 
        }  
for($x=0;$x<count($committee_id);$x++){
    $this->db->select('*');
    $this->db->from('members');
    //
    $this->db->where('id',$committee_id[$x]);
    $this->db->order_by('id','DESC');
     $query = $this->db->get();
     if ($query->num_rows() > 0) {
            foreach ($query->result() as $row){
                  if($row->job_title_fk == 1){
                        $member_name='رئيس مجلس الإدارة';
                    }elseif($row->job_title_fk == 2){
                        $member_name='نائب رئيس مجلس الإدارة';
                    }elseif($row->job_title_fk == 3){
                        $member_name='الأمين العام';
                    }elseif($row->job_title_fk == 4){
                        $member_name='أمين الصندوق';
                    }elseif($row->job_title_fk == 5){
                        $member_name='عضو مجلس الإدارة';
                    }
                     echo'  <div class="col-xs-3 text-center">
                            <h6> '. $member_name.'</h6>
                            <h6> ................................................ </h6>
                            <h6> '.$row->name.' </h6>
                            </div>';
    
            }
                
     }
}

            

         ?> 
          
            </div>
            <div class="col-xs-12">
                <div class="col-xs-7"></div>
                <div class="col-xs-5">
                    <h6> سجل في الحاسب الالي بتاريخ : <span> <?php  echo  $date ;?> هــ </span></h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-7"></div>
                <div class="col-xs-3">
                    <h6 class="r-h6"> الاسم : <span>  </span></h6>
                </div>
                <div class="col-xs-2">
                    <h6 class="r-h6"> التوقيع : <span> ........................... </span></h6>
                </div>
            </div>
        </div>
    </div>
</body>






 </fieldset>
</div>