 
 <style>
 @import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

.content h6{
  font-size: 25px;
}
.content h6{
  font-size: 20px;
}
.content h6{
  font-size: 18px;
}
.content h6{
  font-size: 15px;
  float: right;
}


body {
    width: 100%;
    height: 100%;
  font-family: 'Droid Arabic Kufi', serif;
  color: #000;
}

html {
    width: 100%;
    height: 100%;
}


header .line{
  height: 5px;
  background-color: #eee;
}




.content .row{
margin-bottom: 20px;
}
.content input[type=radio], input[type=checkbox] {

    width: 18px;
    height: 18px;
    float: right;
    margin-left: 5px;
}


.content .table>caption+thead>tr:first-child>th,
.content .table>colgroup+thead>tr:first-child>th,
.content .table>thead:first-child>tr:first-child>th,
.content .table>caption+thead>tr:first-child>td, 
.content .table>colgroup+thead>tr:first-child>td, 
.content .table>thead:first-child>tr:first-child>td {
       border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
}
.content .table>thead>tr>th, 
.content .table>tbody>tr>th, 
.content .table>tfoot>tr>th, 
.content .table>thead>tr>td, 
.content .table>tbody>tr>td, 
.content .table>tfoot>tr>td {

    border-top: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
}


footer{
  margin-bottom: 20px;
}
footer .bottom-form{
  border: 1px solid #999;
  border-radius: 10px;
  padding: 15px;
}
 </style>
 
 
<?php 
 $this->load->view('admin/debaga/header');
    ?>
 <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
<div class="r-index" id="content" >
        <br /><br /><br />
        <h6 class="title">إستمارة تعريف عن طالب مساعدة</h6>



            <div class="col-xs-12">
            <div class="col-xs-6">
                <p>اسم طالب المساعدة كاملا : <?php echo  $record[0]['name']; ?></p>
            </div>
            <div class="col-xs-6">
                <p>عدد أفراد الأسرة : (<?php echo ( $record[0]['femal_num'] + $record[0]['male_num'] +1)?>)</p>
            </div>
            </div><!-- end row-->


             <div class="col-xs-12">
            <div class=" col-xs-3">
                <p>تاريخ الميلاد : <?php  echo  $record[0]['birth_date']?> هـ</p>
            </div>
            <div class="col-xs-3">
                <p>رقم الحفيظة : <?php  echo  $record[0]['card_num']?></p>
            </div>
            <div class=" col-xs-3">
                <p>تاريخها:   <?php  echo  $record[0]['card_date']?> هـ </p>
            </div>
            <div class="col-xs-3">
                <p>مصدرها : <?php  echo  $record[0]['card_source']?></p>
            </div>
            </div><!-- end row-->


             <div class="col-xs-12">
            <div class="col-xs-4">
                <p>المهنة : <?php  echo  $record[0]['job']?> </p>
            </div>
           <div class="col-xs-4">
                <p>الراتب الشهرى : (<?php  echo  $record[0]['salary']?>)ريال</p>
            </div>
            <div class="col-xs-4">
                <p>مصدره: <?php  echo  $record[0]['job']?> </p>
            </div>
            
            </div><!-- end row-->


                <div class="row col-xs-12  ">
             <div class="col-xs-2">
                <label>الحالة الاجتماعية :</label>
            </div>
            
            <?php
                
                foreach($social_status as $social){
                    
                    if($social->id == $record[0]['social_status'])
                        $check = 'checked= "checked"';
                    else
                        $check = '';
                        
                    
                echo '<div class="col-xs-2">
                '.$social->title.' <input type="checkbox" name="social_status" class="form-control" value="'.$social->id.'" '.$check.' width="10" disabled> 
                
             </div>';//&nbsp;&nbsp;&nbsp;&nbsp;
                   
                }
                
                ?>
                
            </div>
            
            <!-- end row-->


          
             <div class="col-xs-12">
                <p>اسم الولى الشرعى للأيتام مع إرفاق مايثبت ذلك / : <?php 
                
                $div = '';
                if($record[0]['orphan_name']) 
                
                {echo  $record[0]['orphan_name'];
                if($record[0]['orphan_propety'] == 7){
                  $ch = 'checked="checked"';  
                }
                else
                {
                    $ch ='';  
                }
                
                   if($record[0]['orphan_propety'] == 6){
                  $ch6 = 'checked="checked"';  
                }
                else
                {
                    $ch6 ='';  
                }
                $div = '<div class="col-xs-4">
                <p>ليس لدى أملاك مؤجرة  <input type="checkbox" name="orphan_propety" value="7" '.$ch.' class="form-control" disabled></p>
            </div>
            
            <div class="col-xs-4">
                <p> لدى أملاك مؤجرة  <input type="checkbox" name="orphan_propety" value="6" '.$ch6.' class="form-control" disabled></p>
            </div>';
                
                }else 
                
                
                {
                echo 'لا يوجد';
                
                $div = '<div class="col-xs-4">
                <p>ليس لدى أملاك مؤجرة  <input type="checkbox" name="orphan_propety"  class="form-control" disabled></p>
            </div>
            
            <div class="col-xs-4">
                <p> لدى أملاك مؤجرة  <input type="checkbox" name="orphan_propety"  class="form-control" disabled></p>
            </div>';
                }?> </p>
            </div>                     
            <!-- end row-->
            <div class="row">
            <?php
                
                echo $div;
                
                ?>

            
            
            
            <div class="col-xs-4">
                <p>مقدار الإيجار السنوى ( <?php if($record[0]['orphan_propety_rent']) echo  $record[0]['orphan_propety_rent'];else echo 'لا يوجد';?> ) ريال</p>
                
            </div>
          
            
            </div><!-- end row-->



            <div class="row">
            <div class="col-xs-4">
            <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class=" ">نوع الدخل</th>
                        <th class=" ">مقداره</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ضمان اجتماعى</td>
                        <td><?php if($result3['society'] !=0) echo $result3['society']; else echo 'لا يوجد'; ?></td>                      
                    </tr>
                    <tr>
                        <td>رعاية المعاقين</td>
                        <td><?php if($result3['retard'] !=0) echo $result3['retard']; else echo 'لا يوجد'; ?></td>                       
                    </tr>
                    <tr>
                        <td>مكافحة التسول</td>
                        <td><?php if($result3['begger'] !=0) echo $result3['begger']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    <tr>
                        <td>الأوقاف</td>
                        <td><?php if($result3['awqaf'] !=0) echo $result3['awqaf']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    <tr>
                        <td>خرجية (عوائد)</td>
                        <td><?php if($result3['3waned'] !=0) echo $result3['3waned']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    <tr>
                        <td>تقاعد</td>
                        <td><?php if($result3['retirement'] !=0) echo $result3['retirement']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    
                    <tr>
                        <td>الراتب الشهري</td>
                        <td><?php if($record[0]['salary']!=0) echo $record[0]['salary']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    
                    <tr>
                        <td>أخرى</td>
                        <td><?php if($result3['other'] !=0) echo $result3['other']; else echo 'لا يوجد'; ?></td>                        
                    </tr>
                    
                    <tr>
                    <td>الإجمالى</td>
                     <td><?php if($result3['total'] !=0) echo ($result3['other']+$record[0]['salary']+$result3['retirement']+
                     $result3['3waned']+$result3['awqaf']+$result3['begger']+$result3['retard']+$result3['society']); else echo '0.00'; ?></td>                        
                    </tr>
                    
                </tbody>
            </table>


            </div>
            <div class="col-xs-4">
            <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class=" ">نوع السكن</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                
                <?php
                
                //foreach($house_state as $house)
                for($z = 0 ; $z < count($house_state)-1 ; $z++)
                {
                    
                    if($house_state[$z]->id == $record[0]['house_state'])
                        $name = 'يوجد';
                    else
                        $name = 'لا يوجد';
                        
                    
                    echo '<tr>
                        <td>'.$house_state[$z]->title.'</td>
                        <td>'.$name.'</td>                      
                    </tr>';
                    
                }
                
                //foreach($house_type as $house)
                for($z = 0 ; $z < count($house_type)-1 ; $z++)
                {
                    
                    if($house_type[$z]->id == $record[0]['house_type'])
                        $name = 'يوجد';
                    else
                        $name = 'لا يوجد';
                        
                    
                    echo '<tr>
                        <td>'.$house_type[$z]->title.'</td>
                        <td>'.$name.'</td>                      
                    </tr>';
                    
                }
                
                ?>
                
                    <tr> <td>أخرى</td>
                    <td></td></tr>
                </tbody>
                

            </table>
                

            </div>
            <div class=" col-xs-4">
            <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class=" ">الحالة الصحية</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                
                <?php
                
                foreach($health_state as $house){
                    
                    if($house->id == $record[0]['health_state'])
                        $name = 'يوجد';
                    else
                        $name = 'لا يوجد';
                        
                    
                    echo '<tr>
                        <td>'.$house->title.'</td>
                        <td>'.$name.'</td>                      
                    </tr>';
                    
                }
                
                
                ?>
                   
                    
                </tbody>               
            </table> 
            </div>            
            </div><!-- end row-->



            <div class="row">
            <div class="col-xs-6">
                <p>جوال: <?php echo $record[0]['mobile'] ?> </p>
            </div>
            <div class="col-xs-6">
                <p>إقــــرار:</p>  
            </div>
            </div><!-- end row-->


            <div class="row">
            <div class="col-xs-12">
                <p>أقر أنا المدون اسمى أعلاه فى يوم <?php echo $day_date ;?> هـ والذى أسكن فى (<?php echo $place[$record[0]['place']]->title; if($record[0]['neighborhood']) echo ',' . $record[0]['neighborhood']; ?>) بأن جميع البيانات المدونة فى هذة الورقة صحيحة وعلى مسئوليتى واذا ظهر عدم صحتها فليس لى الحق بمساعدتى من الجمعية الخيرية لكونى المتسبب فى ذلك .  </p>
            </div>
            
            </div><!-- end row-->



            <div class="row bottom">
            <div class="col-xs-4">
                <h6>توقيع المستفيد </h6>
                <p></p>
            </div>
            <div class="col-xs-4">
                <h6>الختم</h6>
                <img src="" width="50" height="50">  
            </div>
          <div class="col-xs-4">
                <h6>تصديق المحافظ/ رئيس المركز / العمدة</h6>
                <h6>الاسم / .........</h6>
                <h6>التوقيع / .........</h6>   
            </div>
            </div><!-- end row-->




</div>


    
    
    <?php 
    $this->load->view('admin/debaga/footer');
    ?>


