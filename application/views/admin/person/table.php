<?php
echo '<div class="col-xs-12 table-responsive">
      <table id="example" class=" display table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th class=" ">الإسم</th>
            <th class=" ">تاريخ الميلاد</th>
            <th class=" ">السجل المدني</th>
            <th class=" ">النوع</th>
            <th class=" ">المرحلة الدراسية</th>
        </tr>
        </thead>
        <tbody>';
        
for($x = 0 ; $x < $_POST['num'] ; $x++){
    
    echo '<tr>
           <td><input type="text" id="f_name'.$x.'" name="f_name'.$x.'" class="form-control  " required="required" /></td>
           <td><input type="date" id="f_birth_date'.$x.'" name="f_birth_date'.$x.'" class="form-control  " required="required" /></td>
           <td><input type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" id="f_id_card'.$x.'" name="f_id_card'.$x.'" class="form-control  " required="required" /></td>
           <td>
               <select id="type'.$x.'" name="f_type'.$x.'" class="form-control" onchange="return education('.$x.');" required="required" >
               <option value="">--قم بالإختيار--</option>
               <option value="1">زوجة</option>
               <option value="2">إبن</option>
               <option value="3">إبنة</option>
               </select>
           </td>
           <td>
               <select id="education'.$x.'" name="f_education'.$x.'" class="form-control" required="required">
               <option value="">--قم بالإختيار--</option>
               <option value="1">دون سن الدراسة</option>
               <option value="2">رياض أطفال</option>
               <option value="3">إبتدائي</option>
               <option value="4">متوسط</option>
               <option value="5">ثانوي</option>
               <option value="6">جامعي</option>
               <option value="7">خريج</option>
               </select>
           </td>
          </tr>';
    
}

echo ' </tbody>
      </table>
      </div>';
?>

<style>

input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}

input[type=date]::-webkit-calendar-picker-indicator {
    -webkit-appearance: none;
    display: none;
}

</style>

<script>

 function education(num1)
 {
    id= '#education' + num1;
    
    id2= '#type' + num1;
    
    if($(id2).val() == 1)
    {
        $(id).attr("disabled", true);
        return false;
    } 
    else
    {
        $(id).attr("disabled", false);
        return false;
    }  
    
 }

</script>
