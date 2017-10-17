<h2 class="text-flat">إدارة البيانات الأساسية <span class="text-sm"><?php echo $title; ?></span></h2>
<ul class="breadcrumb pb30">
 <li><a href="<?php echo base_url().'dashboard' ?>"><i class="fa fa-home"></i> الرئيسية</a></li>
 <li class="active"><?php echo $title; ?></li>
</ul>
<div class="well bs-component" >
<?php if(isset($result)):?>
<?php echo form_open_multipart('dashboard/search_form3/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ));
?>
<fieldset>

<br />

<div class="row ">
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">إجتماع رقم :</label>
</div>
<div class="col-md-2 ">
<?php

/*echo '<pre>';
var_dump($result4[$this->uri->segment(3)]);die;*/
if(isset($result4[$this->uri->segment(3)]->number) && $result4[$this->uri->segment(3)]->number!=null ){
    echo' <input type="text" name="number"  value="'.$result4[$this->uri->segment(3)]->number.'" class="form-control"  /> ';
}else{
   echo ' <input type="text" name="number" class="form-control"  /> '; 
}
?>

</div>
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">في  :</label>
</div>
<div class="col-md-2 ">
 <input type="text" name="date" id="popupDatepicker" class="form-control" value="<?php if(isset($result4[$this->uri->segment(3)]->date)) echo $result4[$this->uri->segment(3)]->date; ?>" /> 
</div>

<div class="col-md-2 ">
 <label for="inputUser"  class="control-label">رقم الملف:</label>
</div>

<div class="col-md-2">
<input type="text" name="file_num" value="<?php if(isset($result2)&&$result2!=null){ 
    if(isset($result4[$this->uri->segment(3)]) && $result4[$this->uri->segment(3)] != null) 
        {echo $this->uri->segment(3).'/'.$result['place']; }
    else 
        {echo ($result2[0]->id + 1) . '/'.$result['place'];}
    } else echo '1/'.$result['place'];?>" class="form-control" readonly />
</div>
</div>

<!------------------><br />
<!--div class="row">

<div class="col-md-2 ">
 <label for="inputUser" class="control-label">الحالة الإجتماعية:</label>

</div>

<div class="col-md-10">
 <input type="text" name="social_status" class="form-control" value="<?php //echo $all_defines[$result['social_status']];?>" readonly="readonly" /> 

</div>
</div-->
<!------------------><br />
<div class="row">


<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">إسم طالب المساعدة:</label>
</div>

<div class="col-md-2 ">
 <input type="text" name="name" class="form-control" value="<?php echo $result['name'];?>" readonly="readonly" /> 
</div>
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">رقم السجل المدني:</label>
</div>

<div class="col-md-2 ">
 <input type="text"   value="<?php echo $result['card_num']; ?>" name="card_num" class="form-control  " readonly>
</div>
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">تاريخ الميلاد:</label>
</div>

<div class="col-md-2 ">
 <input type="text"   value="<?php echo $result['birth_date']; ?>" name="birth_date" class="form-control  " readonly>
</div>



</div>
<br />
<!--div class="row"> 
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">السن:</label>
</div>

<div class="col-md-2 ">
 <input type="text"   value="" name="age" class="form-control  " readonly>
</div>



</div-->
<div class="row"> 
<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">نوع المستفيد:</label>
</div>

<div class="col-md-2 ">
 <input type="text"  value="<?php echo $all_defines[$result['benefit']] ?>" name="age" class="form-control  " readonly>
</div>


<div class="col-md-2">
 <label for="inputUser" class="control-label">عدد افراد الاسرة:</label>
</div>
<div class="col-md-2">

 <input type="text" name="social_status" class="form-control" value="<?php echo ($result['femal_num'] + $result['male_num'] + 1);?>" readonly="readonly" /> 

</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">متوسط دخل الفرد الشهري:</label>
</div>
<div class="col-md-2">

<?php

        $this->db->select('*');
        $this->db->from('income');
        $this->db->where('person_id',$result['id']);
        $query = $this->db->get();
        $dataa= $query->row_array(); 

?>

 <input type="text" name="social_status" class="form-control" value="<?php echo sprintf('%.0f',(($dataa['total'])/($result['femal_num'] + $result['male_num'] + 1)));?>" readonly="readonly" /> 

</div>


</div>
<!------------------><br />

<?php // if ($result['male_num'] !=0 || $result['femal_num'] !=0 ):?>

<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">نوع السكن:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_state" class="form-control" value="<?php echo $all_defines[$result['house_state']];?>" readonly="readonly" /> 
</div>


<div class="col-md-2">
 <label for="inputUser" class="control-label">حالة السكن:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_state" class="form-control" value="<?php echo $all_defines[$result['house_type']];?>" readonly="readonly" /> 
</div>

</div>
<br />
<div class="row">
<div class="col-md-2">
 <label for="inputUser" class="control-label">تقرير طبي:</label>
</div>
<?php
$nashwa = '';$nashwa2 = '';
if(isset($result4[$this->uri->segment(3)]->medical))
{
    if($result4[$this->uri->segment(3)]->medical == 1)
        $nashwa = "checked='checked'";
    elseif($result4[$this->uri->segment(3)]->medical == 2)
        $nashwa2 = "checked='checked'";
}
?>

<div class="col-md-2">
    <input type="radio" name="medical" value="1" <?php echo $nashwa ?>  required /> يوجد &nbsp;&nbsp;&nbsp;
   <input type="radio" name="medical" value="2" <?php echo $nashwa2 ?>  required  /> لا يوجد &nbsp;&nbsp;&nbsp;
 
</div> 


</div>

<!---------------------------><br />

<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">قرار الباحث:</label>
</div>


<div class="col-md-10" >

<textarea id="opinion"  name="opinion" class="form-control  " required="required" disabled><?php
echo $result3[0]->opinion; 
?></textarea>

 </div>

</div>
<br />



<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">الأسم :</label>
</div>
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

<div class="col-md-3" >
 <input type="text" name="researcher_id"  class="form-control" value="<?php echo $researcher;?>" readonly="readonly" />
 </div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">التوقيع :</label>
</div>


<div class="col-md-3" >

 <input type="text"  class="form-control"  readonly="readonly" />
 </div>
</div>
<br />
<div class="row">
<h3> بعد الإطلاع والمناقشة والدراسة لكامل ملف المذكور أعلاه فأن مجلس الإدارة قرر ما يلي</h3>

</div>

<div class="row">

<div class="col-md-2 ">

</div>

<div class="col-md-5 ">
<?php

 if(isset($result4[$this->uri->segment(3)]->checked) && $result4[$this->uri->segment(3)]->checked!=null ){
if($result4[$this->uri->segment(3)]->checked == 1){
 $status1="checked='checked'";

        }else{
            $status1 = ''; 
        }  
        
        if($result4[$this->uri->segment(3)]->checked == 2){
 $status2="checked='checked'";

        }else{
            $status2 = ''; 
        }  
        
  if($result4[$this->uri->segment(3)]->checked == 3){
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
     <input type="radio" name="checked" value="1" <?php echo $status1 ;?> required /> يستحق الدعم النقدي والعيني من الفئة<br />
   <input type="radio" name="checked" value="2" <?php echo $status2 ;?>  required  />  يستحق الدعم العيني فقط من الفئة<br />
     <input type="radio" name="checked" value="3"  <?php echo $status3 ;?>   required   /> يستبعد من اي دعم وذلك للاسباب التالية <br />
</div>

<div class="col-md-5 ">
<?php

 if(isset($result4[$this->uri->segment(3)]->fileds) && $result4[$this->uri->segment(3)]->fileds!=null ){
if($result4[$this->uri->segment(3)]->fileds == 1){
 $stta1="checked='checked'";

        }else{
            $stta1 = ''; 
        }  
        
        if($result4[$this->uri->segment(3)]->fileds == 2){
 $stta2="checked='checked'";

        }else{
            $stta2 = ''; 
        }  
        
  if($result4[$this->uri->segment(3)]->fileds == 3){
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
     <input type="radio" name="fileds" value="1" <?php echo $stta1 ;?>  required  /> (أ) &nbsp;&nbsp;&nbsp;
     <input type="radio" name="fileds" value="2"  <?php echo $stta2 ;?> required  /> (ب) &nbsp;&nbsp;&nbsp;
     <input type="radio" name="fileds" value="3"  <?php echo $stta3 ;?> required   /> (ج) &nbsp;&nbsp;&nbsp;

</div>
</div>
<br />
<div class="row">

<div class="col-md-2 ">
 <label for="inputUser" class="control-label">التفاصيل - والاسباب:</label>
</div>

<div class="col-md-10" >
<?php

  if(isset($result4[$this->uri->segment(3)]->details) && $result4[$this->uri->segment(3)]->details!=null ){
 echo' <input type="text" name="details" value="'.$result4[$this->uri->segment(3)]->details .'"  class="form-control"  required/>';

 }else{
 echo' <input type="text" name="details"  class="form-control"  required/>';
 }
?>

 </div>



</div>
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">اعضاء المجلس:</label>
</div>

<br/>
<div class="col-md-10" >
<?php


if(isset($result4[$this->uri->segment(3)]->committee_id) && $result4[$this->uri->segment(3)]->committee_id!=null ){
if($result4[$this->uri->segment(3)]->committee_id){
 $memr= $result4[$this->uri->segment(3)]->committee_id;
 $committee_id = unserialize($memr);
        }else{
            $committee_id = ''; 
        }  
 }else{
    
 }
  

if(isset($result4[$this->uri->segment(3)]->committee_id) && $result4[$this->uri->segment(3)]->committee_id!=null ){
 if($member){
    $ss =0;
    $y=0;
for($x=0;$x<count($member);$x++){
    if($member[$x]->job_title_fk == 1){
        $member_name='رئيس مجلس الإدارة';
    }elseif($member[$x]->job_title_fk == 2){
        $member_name='نائب';
    }elseif($member[$x]->job_title_fk == 3){
        $member_name='أمين عام';
    }elseif($member[$x]->job_title_fk == 4){
        $member_name='أمين الصندوق';
    }elseif($member[$x]->job_title_fk == 5){
        $member_name='عضو';
    }
   
 $ss = '';
   for( ;$y<count($committee_id);){
    if($committee_id[$y] == $member[$x]->id ){
       $ss ="checked='checked'";
      // var_dump($y); 
       $y++;
     
     break;
    }else{
        $ss = '';
      break;
    }

  }

 echo'  <input type="checkbox" name="member[]" '.$ss.' value="'.$member[$x]->id.'"  />
 ('.$member_name.')( '.$member[$x]->name.')  <br/>
';



}
// $y++;
}else{
    
}   
}else{
  if($member){
    //$ss =0;
    $y=0;
for($x=0;$x<count($member);$x++){
    if($member[$x]->job_title_fk == 1){
        $member_name='رئيس مجلس الإدارة';
    }elseif($member[$x]->job_title_fk == 2){
        $member_name='نائب';
    }elseif($member[$x]->job_title_fk == 3){
        $member_name='أمين عام';
    }elseif($member[$x]->job_title_fk == 4){
        $member_name='أمين الصندوق';
    }elseif($member[$x]->job_title_fk == 5){
        $member_name='عضو';
    }
   
 //$ss = '';
  // for( ;$y<count($committee_id);){
    //if($committee_id[$y] == $member[$x]->id ){
     //  $ss ="checked='checked'";
      // var_dump($y); 
      // $y++;
     
    // break;
    //}else{
        //$ss = '';
     // break;
   // }

 // }

 echo'  <input type="checkbox" name="member[]"  value="'.$member[$x]->id.'" readonly/>
 ('.$member_name.')( '.$member[$x]->name.')  <br/>
';



}
// $y++;
}else{
    
}  
}



?>
 </div></div>
 <br/><br/>
 <input type="hidden" value="<?php echo  count($member); ?>" name="count_member" />
 <div class="form-group" >
<?php

if(isset($result4[$this->uri->segment(3)]->id) && $result4[$this->uri->segment(3)]->id!=null ){
echo ' 
   <input type="hidden" value="'.$result4[$this->uri->segment(3)]->id.'" name="id" />
   <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="update" value="تعديل" class="btn btn-primary"
                    onclick ="return checc();" >

                </div>' ;
}else{
     
    echo' <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary"
                    onclick ="return checc();"  >

                </div>';
}
?>
               

            </div>

 </fieldset>
  <?php echo form_close();
  endif;?>
 </div>
 
 
 <script>

function checc(){
    
    var checked=false;
	var elements = document.getElementsByName("member[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked) {
			checked = true;
		}
	}
	if (!checked) {
		alert('يجب على الأقل إختيار عضو واحد');
	}
	return checked;
    
}

</script>