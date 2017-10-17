<div class="well bs-component" >
<?php if(isset($result)):?>
<?php echo form_open_multipart('dashboard/search_form2/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
<fieldset>


<div class="row">

<div class="col-md-2 ">
 <label for="inputUser" >نوع الطلب (الحالة):</label>
</div>

<?php
$request_type1 = '';$request_type2 = ''; $request_type3 = '';
if(isset($result3[0])){
   if($result3[0]->request_type == 1){
      
      $request_type1 = "checked='checked'";
  }else{
      $request_type1='';
  }
  
     if($result3[0]->request_type == 2){
      
      $request_type2 = "checked='checked'";
  }else{
      $request_type2='';
  }

     if($result3[0]->request_type == 3){
      
      $request_type3 = "checked='checked'";
  }else{
      $request_type3='';
  }
}
?>

<div class="col-md-5 ">
    <input type="radio" name="request_type" value="1" <?php echo $request_type1?>  required /> جديد &nbsp;&nbsp;&nbsp;
   <input type="radio" name="request_type" value="2" <?php echo $request_type2?>  required /> مسجل &nbsp;&nbsp;&nbsp;
    <input type="radio" name="request_type" value="3" <?php echo $request_type3?> required /> موقوف &nbsp;&nbsp;&nbsp;
</div>

<div class="col-md-2 ">
 <label for="inputUser"  class="control-label">رقم الملف:</label>
</div>

<div class="col-md-3">
<input type="text" name="file_num" value="<?php if(isset($result2)&&$result2!=null){ 
    if(isset($result4[$this->uri->segment(3)]) && $result4[$this->uri->segment(3)] != null) 
        echo $this->uri->segment(3).'/'.$result['place']; 
    else 
        echo ($result2[0]->id + 1) . '/'.$result['place'];
    } else echo '1/'.$result['place'];?>" class="form-control" readonly />
</div>


</div>
<!------------------><br />
<div class="row ">

<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">إسم طالب المساعدة:</label>
</div>

<div class="col-md-5 ">
 <input type="text" name="name" class="form-control" value="<?php echo $result['name'];?>" readonly="readonly" /> 
</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">رقم السجل المدنى:</label>
</div>

<div class="col-md-3 ">
 <input type="text" name="card_num" class="form-control" value="<?php echo $result['card_num'];?>" readonly="readonly" /> 

</div>


</div>
<!------------------><br />
<div class="row">

<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">تاريخ الميلاد:</label>
</div>

<div class="col-md-2 ">
 <input type="text" id="popupDatepicker"   value="<?php echo $result['birth_date']; ?>" name="birth_date" class="form-control  " readonly>
</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">السكن :مدينة/قرية</label>
</div>

<div class="col-md-2 ">
 <input type="text" name="town" class="form-control" value="<?php echo $place[$result['place']]->title;?>" readonly="readonly" /> 

</div>


<div class="col-md-2">
 <label for="inputUser" class="control-label">الحى:</label>
</div>

<div class="col-md-2 ">
 <input type="text" name="neighborhood" class="form-control" value="<?php if($result['neighborhood']) echo $result['neighborhood']; else echo 'لا يوجد'; ?>" readonly="readonly" /> 

</div>

</div>
<!------------------><br />
<div class="row">

<div class="col-md-2 "> 
 <label for="inputUser"  class="control-label">هاتف المنزل:</label>
</div>

<div class="col-md-2 ">
 <input type="text" id="popupDatepicker"   value="<?php if($result['home_phone']) echo $result['home_phone']; else echo 'لا يوجد'; ?>" name="home_phone" class="form-control  " readonly>
</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">هاتف العمل:</label>
</div>

<div class="col-md-2 ">
 <input type="text" name="job_phone" class="form-control" value="<?php if($result['job_phone']) echo $result['job_phone']; else echo 'لا يوجد';?>" readonly="readonly" /> 

</div>


<div class="col-md-2">
 <label for="inputUser" class="control-label">الجوال:</label>
</div>

<div class="col-md-2 ">
 <input type="text" name="mobile" class="form-control" value="<?php if($result['mobile']) echo $result['mobile']; else echo 'لا يوجد';?>" readonly="readonly" /> 

</div>

</div>
<!------------------><br />
<div class="row">

<div class="col-md-2 ">
 <label for="inputUser" class="control-label">الحالة الإجتماعية:</label>

</div>

<div class="col-md-4">
 <input type="text" name="social_status" class="form-control" value="<?php if(isset($all_defines[$result['social_status']])) echo $all_defines[$result['social_status']]; else echo 'لا يوجد';?>" readonly="readonly" /> 

</div>


<div class="col-md-2 ">
 <label for="inputUser" class="control-label">نوع المستفيد:</label>

</div>

<div class="col-md-4">
 <input type="text" name="benefit" class="form-control" value="<?php if(isset($all_defines[$result['benefit']])) echo $all_defines[$result['benefit']]; else echo 'لا يوجد';?>" readonly="readonly" /> 

</div>
</div>
<!------------------><br />
<?php // if ($result['male_num'] !=0 || $result['femal_num'] !=0 ):?>

<div class="row">
<div class="col-md-2">
 <label for="inputUser" class="control-label">أفراد الأسرة: ذكور</label>
</div>

<div class="col-md-2">

 <input type="text" name="male_num" class="form-control" value="<?php
 if($result['gender'] == 1) echo ($result['male_num']+1); else echo $result['male_num']?>" readonly="readonly" /> 

</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">إناث:</label>
</div>
<div class="col-md-2">

 <input type="text" name="femal_num" class="form-control" value="<?php 
 if($result['gender'] == 2) echo ($result['femal_num']+1); else echo $result['femal_num'];?>" readonly="readonly" /> 

</div>


<div class="col-md-2">
 <label for="inputUser" class="control-label">المجموع:</label>
</div>
<div class="col-md-2">

 <input type="text" name="family_num" id="family_num" class="form-control" value="<?php echo ($result['femal_num'] + $result['male_num'] +1);?>" readonly="readonly" /> 

</div>

</div>



<?php //endif;?>
<!---------------------------><br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">نوع السكن:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_state" class="form-control" value="<?php if(isset($all_defines[$result['house_type']]))echo $all_defines[$result['house_type']];else echo 'لا يوجد'; ?>" readonly="readonly" /> 
</div>

<?php if (isset($all_defines[$result['house_state']]) && $all_defines[$result['house_state']] != 'ملك'):?>

<div class="col-md-2">
 <label for="inputUser" class="control-label">قيمة الإجار سنويا:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_rent" class="form-control" value="<?php if($result['house_rent']) echo $result['house_rent']; else echo 'لا يوجد'; ?>" readonly="readonly" /> 
</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">إسم مالك البيت:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_owner" class="form-control" value="<?php if($result['house_owner']) echo $result['house_owner']; else echo 'لا يوجد'; ?>" readonly="readonly" /> 
</div>

<?php else: ?>
<div class="col-md-2">
 <label for="inputUser" class="control-label">قيمة الإجار سنويا:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_rent" class="form-control" value="" readonly="readonly" /> 
</div>

<div class="col-md-2">
 <label for="inputUser" class="control-label">إسم مالك البيت:</label>
</div>

<div class="col-md-2">
 <input type="text" name="house_owner" class="form-control" value="" readonly="readonly" /> 
</div>


<?php endif;?>

</div>
<!----------------------------------------------><br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">حالة السكن:</label>
</div>


<div class="col-md-5">
  <input type="text" name="house_type" class="form-control" value="<?php if(isset($all_defines[$result['house_state']])) echo $all_defines[$result['house_state']];?>" readonly="readonly" /> 

 </div>


</div>
<!----------------------------------------------><br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">المهنة أو العمل:</label>
</div>


<div class="col-md-4">
  <input type="text" name="house_type" class="form-control" value="<?php if($result['job'])echo $result['job'];else echo 'لا يوجد';?>" readonly="readonly" /> 

 </div>
<div class="col-md-2">
 <label for="inputUser" class="control-label">مكان العمل:</label>
</div>


<div class="col-md-4">
  <input type="text" name="house_type" class="form-control" value="<?php if($result['job_place'])echo $result['job_place'];else echo 'لا يوجد';?>" readonly="readonly" /> 

 </div>

</div>
<!----------------------------------------------><br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">مقدار الدخل:</label>
</div><br /><br />
<table id="example" class=" display table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th class=" ">الراتب</th>
            <th class=" ">الضمان</th>
            <th class=" ">التقاعد</th>
            <th class=" ">الأوقاف</th>
            <th class=" ">عوائد</th>
            <th class=" ">المعاقين</th>
            <th class=" ">التسول</th>
            <th class=" ">عقار</th>
            <th class=" ">تأمينات</th>
            <th class=" ">أخرى</th>
            <th class=" ">المجموع</th>
            <th class=" ">المتوسط</th>
        </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            
      $famil= ($result['femal_num']+$result['male_num']+1);
       if(isset($result['salary']) && $result['salary']!= null){
       $salary=$result['salary'];
      
       }else{
        $salary =0;
        
       }
       
        if(isset($result['id']) && $result['id']!= null){
        $this->db->select('*');
        $this->db->from('income');
        $this->db->where('person_id',$result['id']);
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
           $camels = $dataa['camels'];
           $sheep = $dataa['sheep'];
           $cows = $dataa['cows'];
           $others= $dataa['others'];
             
             
            }else{
              $society = 0; 
              $retirement =  0 ; 
              $awqaf =0 ;
              $waned =0 ;
              $other=0;
              $total=0;
              $retard=0;
              $begger=0;
              $akar=0;
              $ta2meen=0;
              $camels = 0;
              $sheep = 0;
              $cows = 0;
              $others= 0;
            }
    
            
            ?>
                <!--input type="hidden" id="family_num" value="<?php// echo $famil; ?>" class="form-control  " readonly /-->
                <td><input type="text"  name="salary" id="salary" value="<?php echo $salary;?>" onkeyup="return summ();"  class="form-control  " readonly /></td>
                <td><input type="text" name="society" id="society" value="<?php echo $society;?>" onkeyup="return summ();" class="form-control  " readonly /></td>
                <td><input type="text" name="retirement" id="retirement" value="<?php echo $retirement;?>" onkeyup="return summ();" class="form-control  " readonly /></td>
                <td><input type="text" name="awqaf"  id="awqaf" value="<?php echo $awqaf;?>" onkeyup="return summ();" class="form-control  " readonly /></td>
                <td><input type="text" name="3waned" id="3waned" value="<?php echo $waned;?>"  onkeyup="return summ();" class="form-control  " readonly /></td>
               
                 <td><input type="text" name="retard" id="retard" value="<?php echo $retard;?>"  onkeyup="return summ();" class="form-control  " readonly /></td>
                 <td><input type="text" name="begger" id="begger" value="<?php echo $begger;?>"  onkeyup="return summ();" class="form-control  " readonly /></td> 
                <td><input type="text" name="3akar" value="<?php echo $akar; ?>" id="3akar" onkeyup="return summ();" class="form-control  " onkeypress="return isNumberKey(event)" /></td>
                <td><input type="text" name="ta2meen" value="<?php echo $ta2meen; ?>" id="ta2meen" onkeyup="return summ();" class="form-control  " onkeypress="return isNumberKey(event)" /></td>
                <td><input type="text" name="other" id="other" value="<?php echo $other  ;?>" onkeyup="return summ();" class="form-control  " onkeypress="return isNumberKey(event)" /></td>
                <td><input type="text" id="total2" name="total2" value="<?php echo $total  ;?>"  class="form-control  " readonly/></td>
                <td><input type="text" id="total" name="total"   value="<?php echo sprintf('%.0f',$total/$famil)  ;?>"  class="form-control  " readonly  /></td>
            
            
            </tr>
        </tbody>
      </table>

</div>

<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">مقدار الأنعام:</label>
</div><br /><br />
<table id="example" style="width:50%; margin-right: 250px;" class=" display table table-bordered table-striped table-hover">

        <thead>
        <tr class="info">
            <th class=" ">الإبل</th>
            <th class=" ">الأغنام</th>
            <th class=" ">الأبقار</th>
            <th class=" ">أخري</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="text" name="camels" onkeypress="return isNumberKey(event)" value="<?php echo $camels; ?>" class="form-control  " /></td>
                <td><input type="text" name="sheep" onkeypress="return isNumberKey(event)"  value="<?php echo $sheep; ?>" class="form-control  " /></td>
                <td><input type="text" name="cows" onkeypress="return isNumberKey(event)" value="<?php echo $cows; ?>" class="form-control  " /></td>
                <td><input type="text" name="others" onkeypress="return isNumberKey(event)" value="<?php echo $others; ?>" class="form-control  " /></td>
            </tr>
        </tbody>
      </table>

</div>

<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">يوجد نشاط تجاري:</label>
</div>

<?php
$bu1 = ''; $bu = '';
if(isset($result3[0]->business)){
  if($result3[0]->business == 1){
    $bu= "checked='checked'";
  }else{
    $bu='';
  }
  
    if($result3[0]->business == 2){
      $bu1 = "checked='checked'";
  }else{
      $bu1='';
  }
}
?>

<div class="col-md-4" style="padding-top: 10px;">
   
    <input type="radio" name="business" onclick="$('#business_type').prop('readonly',true);" class="" value="1" <?php echo $bu ?> required /> لا
    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 
     <input type="radio" name="business" onclick="$('#business_type').val('');$('#business_type').prop('readonly',false);" value="2" <?php echo $bu1 ?> required /> نعم  

 </div>
 
 
<div class="col-md-2">
<?php
$business_type= '';
if(isset($result3[0]->business_type)){
    if($result3[0]->business_type != ''){
      $business_type =$result3[0]->business_type;
  }else{
      $business_type='لا يوجد';
  }
}
?>
 <label for="inputUser" class="control-label">نوعه:</label>
</div>


<div class="col-md-4">
  <input type="text" name="business_type" value="<?php echo $business_type ;?>" class="form-control"  disabled /> 

 </div>

</div>

<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">هل يوجد ممتلكات ثابتة:</label>
</div>


<div class="col-md-4" style="padding-top: 10px;">
  <select name="propety" id="propety" class="form-control"  required disabled >
  
  <option value="">--قم بالإختيار--</option>
  <option value="0">لا يوجد</option>
  <?php
  
  foreach($propety as $prop)
  {
    if($result3[0]->propety == $prop->id){
    $propd = "selected='selected'";
  }else{
    $propd='';
  }
        echo '<option value="'.$prop->id.'" '.$propd.'>'.$prop->title.'</option>';
  }
  
  ?>

</select>

 </div>
 
 <div class="col-md-2">
 <label for="inputUser" class="control-label">الحالة الإجتماعية والمعيشة:</label>
</div>


<div class="col-md-4" style="padding-top: 10px;">
  <select name="living_type" id="living_type" class="form-control"  required  disabled>
  
  <option value="">--قم بالإختيار--</option>
  <option value="0">لا يوجد</option>
  <?php
 
  foreach($living_type as $live)
  {
      if($result3[0]->living_type == $live->id){
    $lived = "selected='selected'";
  }else{
    $lived='';
  }
        echo '<option value="'.$live->id.'" '.$lived.'>'.$live->title.'</option>';
  }
  
  ?>

</select>

 </div>

</div>


<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label" >الحالة الصحية للأسرة:</label>
</div>


<div class="col-md-10" >

<input type="text" name="family_health" class="form-control" value="<?php echo $result3[0]->family_health; ?>" required  disabled /> 

 </div>

</div>

<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">معلومات إضافية:</label>
</div>


<div class="col-md-10" >

<input type="text" name="info" class="form-control" value="<?php echo $result3[0]->info ?>"  required disabled /> 

 </div>

</div>

<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">قرار الباحث:</label>
</div>


<div class="col-md-10" >

<textarea id="opinion"  name="opinion" class="form-control" required="required" disabled><?php
echo $result3[0]->opinion; 
?></textarea>

 </div>

</div>
<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">قرار لجنة البحث والمساعدة:</label>
</div>
<?php
 if(isset($result4[$this->uri->segment(3)])){
  if($result4[$this->uri->segment(3)]->opinion)
            $opinion_lagna = $result4[$this->uri->segment(3)]->opinion;
        else
            $opinion_lagna = '';
            
                  if($result4[$this->uri->segment(3)]->committee_id){
                    
               
             $memr= $result4[$this->uri->segment(3)]->committee_id;
             $committee_id = unserialize($memr);
        }else{
            $committee_id = ''; 
        }  
 }else{
    $opinion_lagna="";
 }
  
           
?>
<?php ?>
<div class="col-md-10" >

<textarea id="opinion_lagna"  name="opinion_lagna" class="form-control  "  required="required" ><?php echo $opinion_lagna?></textarea>

 </div>

</div>

<br />
<div class="row">

<div class="col-md-2">
 <label for="inputUser" class="control-label">اعضاء المجلس:</label>
</div>


<div class="col-md-10" >
<?php


// var_dump($committee_id);
if(isset($result4[$this->uri->segment(3)])){
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

 echo' <input type="checkbox" name="member[]" '.$ss.' value="'.$member[$x]->id.'"/> 
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
   


 echo'  
 ('.$member_name.')( '.$member[$x]->name.') <input type="checkbox" class="cc" name="member[]"  value="'.$member[$x]->id.'" /> <br/>
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
if(isset($result4[$this->uri->segment(3)])){
    
 
   echo ' 
   <input type="hidden" value="'.$result4[$this->uri->segment(3)]->id.'" name="id" />
   <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="update" value="تعديل" class="btn btn-primary" 
                    
                    onclick="return checc();" >

                </div>' ;
}else{
     
    echo' <div class="col-xs-10 col-xs-pull-2">

                    <input type="submit"  name="add" value="حفظ" class="btn btn-primary" 
                    
                    onclick="return checc();" >

                </div>';
}
?>
               

            </div>

 </fieldset>
  <?php echo form_close();
  endif;?>
 </div>
 
 <script>

var nashwa = Math.ceil( ( parseInt($('#total2').val())/parseInt($('#family_num').val()) )  );
$('#total').val(nashwa);//.toFixed(2)

</script>

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
