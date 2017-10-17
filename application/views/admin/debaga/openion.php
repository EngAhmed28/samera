<style>
@import url(http://fonts.googleapis.com/earlyaccess/droidarabickufi.css);

.content h6{
  font-size: 11px;
}
.content h6{
  font-size: 11px;
}
.content h6{
  font-size: 11px;
}
.content h6{
  font-size: 11px;
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

.nav{
  /*border: 1px double #999;
  padding: 10px;
  margin-top: 20px;
  border-radius: 10px;*/
}
.nav .logo img{
  float: left;
  
}
.content{
 /* margin-top: 10px;
 padding-top: 20px;*/
   

}
.col-xs-12{
  margin-bottom: 10px;
}
.line{
  height: 5px;
  background-color: #eee;
  margin-bottom: 10px;
  /*color: #000;*/
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
    text-align: center;
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
    text-align: center;
}

@media (max-width: 767px) {
table  {
 width: 100px;       /* Just for the demo          */
    overflow-x: auto; 
}
}

</style>

<?php
  $data=explode('/',$debaga[0]->date_construct);
 
  ?>
      
      
      <div class="r-index" id="content">
    

        
            <div class="col-xs-12 content">
            
                <!--div class="col-xs-4  ">
                    <h6>المملكة العربية السعودية <br> الجمعية الخيرية بمحافظة سميراء <br>
                    تحت إشراف وزارة العمل والشؤون الاجتماعية<br>
                    تأسست عام 1424 هـ رقم التسجيل 287</h6>
                </div-->
                <div class="col-xs-5  ">
                <h6 >  المملكة العربية السعودية <br />
                منطقة حائل - محافظة سميراء <br />
                الجمعية الخيرية بمحافظة سميراء <br />
                تحت اشراف وزارة العمل والتنمية الإجتماعية<br/>
                سجلت برقم 287
                     <?php //echo $debaga[0]->address .'<br/>';
                            //echo $debaga[0]->name .'<br/>';
                            //echo 'تحت اشراف وزارة العمل والتنمية الإجتماعية<br/>';
                            //echo 'سجلت برقم 287';//.$debaga[0]->record_number ;
                     ?></h6>
                     </div>
                
                <div class="col-xs-3 text-center">
                    <h6>بسم الله الرحمن الرحيم</h6>
                    <br><br>
                    <h6>نموذج بحث اجتماعى ميدانى</h6>
                    <br>
                    <h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(رأي الباحث/رأي اللجنة)</h6>
                </div>
                <div class="col-xs-4 logo">
                    <img style="width:75px !important ; height: 75px; float: left;" src="<?php echo base_url('uploads/images/'.$debaga[0]->logo.''); ?>" alt="">
          
                </div>

           
         
            
            </div>
            
             <div class="line col-xs-12"></div>
            
     
      
      <?php 

$check1 = ''; $check2 = ''; $check3 = '' ; $chec1 = ''; $chec2 ='';$id='';
    if(isset($result3[$this->uri->segment(3)])&&$result3[$this->uri->segment(3)]!=null)
    {
        if($result3[$this->uri->segment(3)]->request_type == 1)
            $check = 'جديد';//'checked="checked"';
        //else
            //$check1 = '';
        elseif($result3[$this->uri->segment(3)]->request_type == 2)
            $check = 'مسجل';//'checked="checked"';
        //else
            //$check2 = '';
        elseif($result3[$this->uri->segment(3)]->request_type == 3)
            $check = 'موقوف';//'checked="checked"';
        //else
            //$check3 = '';
            
        if($result3[$this->uri->segment(3)]->id)
            $id = $result3[$this->uri->segment(3)]->id;
        else
            $id = '';
    }

?>

            
            

            <div class="col-xs-12 content"> 
            <div class="col-xs-8 ">
            <h6><b>نوع الطلب:</b> <?php echo $check ?></h6>
            </div>
            
            
            
            <!--div class="col-xs-2 ">
                <h6>جديد <input type="checkbox" name="" class="form-control" <?php echo $check1?> width="10" disabled></h6>
                
            </div>
            <div class="col-xs-2 ">
                <h6>مسجل <input type="checkbox" name="" class="form-control" <?php echo $check2?>width="10" disabled></h6>
                
            </div>
            <div class="col-xs-2 ">
                <h6>موقوف <input type="checkbox" name="" class="form-control" <?php echo $check3?> width="10" disabled></h6>
                
            </div-->
            
            <div class="col-xs-4 ">
                <h6><b>رقم الملف :</b> <?php echo $this->uri->segment(3) .'/'.$result['place']?></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>الإسم:</b> <?php echo $result['name'];?></h6>
                
            </div>
            
            <div class="col-xs-4 ">
                <h6><b>رقم السجل المدنى:</b> <?php echo $result['card_num'];?></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>تاريخ الميلاد:</b>  <?php echo $result['birth_date'];?></h6>
                
            </div>
            
            <div class="col-xs-4 ">
                <h6><b>السكن:</b> <?php echo $place[$result['place']]->title;?></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>الحى :</b> <?php echo $result['neighborhood'];?></h6>
                
            </div>
            
            
            
            <div class="col-xs-4 ">
                <h6><b>نوع المستفيد:</b> <?php echo $all_defines[$result['benefit']];?></h6>
                
            </div>
            
            
            
            <div class="col-xs-4 ">
                <h6><b>هاتف المنزل :</b> <?php echo $result['home_phone']; ?></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>هاتف العمل  :</b> <?php echo $result['job_phone']; ?></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>الجوال :</b> <?php echo $result['mobile']; ?></h6>
                
            </div>
            
            
            
            
            
            
                
            <div class="col-xs-4 ">
            <h6><b>عدد أفراد الأسرة:ذكور ( </b> <?php if($result['gender'] == 1) echo ($result['male_num']+1); else echo $result['male_num']; ?>  <b>) </b></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>اناث ( </b> <?php if($result['gender'] == 2) echo ($result['femal_num']+1); else echo $result['femal_num'];?> <b> ) </b> </h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>المجموع (</b>  <?php echo ($result['femal_num'] + $result['male_num'] +1);?> <b> ) </b> </h6>
                
            </div>

            
            
            <div class="col-xs-8 ">
            <h6><b>الحالة الاجتماعية:</b>
            <?php
            
             foreach($social_status as $record){
                    
                    if($record->id == $result['social_status'])
                        /*$select = 'checked="checked"';
                    else
                        $select = '';
                        
                        '.$select.'
                        */
                    
                    echo ''.$record->title.' </h6>
                
            </div>';
                    
                }
            
            ?>
            
            
            <div class="col-xs-4 ">
            <h6><b>نوع السكن:</b>
            
            <?php
            
             foreach($house_state as $record){
                    
                    if($record->id == $result['house_state'])
                      /*  $select = 'checked="checked"';
                    else
                        $select = '';*/
                    
                    echo ''.$record->title.' </h6>
                
            </div>';
                    
                }
            
            ?>
            
            
            <div class="col-xs-4 ">
            <h6><b>حالة السكن:</b>
            
            <?php
            
             foreach($house_type as $record){
                    
                    if($record->id == $result['house_type'])
                      /*  $select = 'checked="checked"';
                    else
                        $select = '';*/
                    
                    echo ''.$record->title.' </h6>
                
            </div>';
            
            
                    
                }
                
                if($result['house_type'] == 7)
            {
                echo '<div class="col-xs-4 ">
                <h6><b>الإيجار سنويا( </b>'.$result['house_rent'].'<b> )</b></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>اسم مالك البيت : </b>'.$result['house_owner'].' </h6>
                
            </div>';
            }
            
            ?>
            
            
            <!--div class="col-xs-4 ">
                <h6><b>الإيجار سنويا( </b><?php //if($result['house_rent']) echo $result['house_rent']; else echo 'لا يوجد'; ?><b> )</b></h6>
                
            </div>
            <div class="col-xs-4 ">
                <h6><b>اسم مالك البيت : </b><?php //if($result['house_owner']) echo $result['house_owner']; else echo 'لا يوجد'; ?> </h6>
                
            </div-->
            


                <div class="col-xs-12 "> 
                <h6><b>مقدار الدخل:</b></h6>
                
                <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr class="info">
            <th>الراتب</th>
            <th>الضمان</th>
            <th>التقاعد</th>
            <th>الأوقاف</th>
            <th>عوائد</th>
            <th>المعاقين</th>
            <th>التسول</th>
            <th>عقار</th>
            <th>تأمينات</th>
            <th>أخرى</th>
            <th>المجموع</th>
            <th>المتوسط</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $result['salary']; ?></td> 
                        <?php
                           $famil= ($result['femal_num']+$result['male_num']+1);
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
                        <td><?php echo $society; ?></td>
                        <td><?php echo $retirement; ?></td> 
                        <td><?php echo $awqaf; ?></td> 
                        <td><?php echo $waned; ?></td> 
                        <td><?php echo $retard; ?></td> 
                        <td><?php echo $begger; ?></td> 
                        <td><?php echo $akar; ?></td> 
                        <td><?php echo $ta2meen; ?></td> 
                        <td><?php echo $other; ?></td>  
                        <td><?php echo $total; ?></td> 
                        <td><?php echo sprintf('%.0f',$total/$famil)  ;?></td>                     
                    </tr>
                   
                    
                </tbody>
 

            </table>
            
            </div>
               


                <div class="col-xs-12" >
                 
                <h6><b>مقدار الأنعام: </b></h6>
                
                <div class="col-xs-8 text-center" style=""> 
                
                <table id="example" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th class=" ">الإبل</th>
                        <th class=" ">الأغنام</th>
                        <th class=" ">الأبقار</th>
                        <th class=" ">أخرى</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $camels; ?></td> 
                        <td><?php echo $sheep; ?></td>
                        <td><?php echo $cows; ?></td> 
                        <td><?php echo $others; ?></td> 
                                             
                    </tr>
                   
                    
                </tbody>
 

            </table>
                </div>
                
                </div>
<?php 
$business = '';$opinion = ''; $info = ''; $family_health =''; $researcher='';
    if(isset($result3[$this->uri->segment(3)])&&$result3[$this->uri->segment(3)]!=null)
    {
        if($result3[$this->uri->segment(3)]->business == 2)
            $chec1 = 'لا';//'checked="checked"';
        //else
            //$chec2 = '';
        elseif($result3[$this->uri->segment(3)]->business == 1)
            $chec1 = 'نعم';//'checked="checked"';
        //else
            //$chec1 = '';
            
        if($result3[$this->uri->segment(3)]->business_type)
            $business = $result3[$this->uri->segment(3)]->business_type;
        else
            $business = 'لا يوجد';
            
        if($result3[$this->uri->segment(3)]->family_health)
            $family_health = $result3[$this->uri->segment(3)]->family_health;
        else
            $family_health = '';
            
        if($result3[$this->uri->segment(3)]->info)
            $info = $result3[$this->uri->segment(3)]->info;
        else
            $info = '';
        
        if($result3[$this->uri->segment(3)]->opinion)
            $opinion = $result3[$this->uri->segment(3)]->opinion;
        else
            $opinion = '';
            
        if(isset($result3[$this->uri->segment(3)]->researcher_id)){
            if($result3[$this->uri->segment(3)]->researcher_id != 0)
                $researcher = $client[$result3[$this->uri->segment(3)]->researcher_id]->name;
            else
                $researcher = 'Admin';
        }
        else
            $researcher = '';
    }

?>


                  
            <div class="col-xs-6 ">
            <h6><b>هل هناك أى نشاط تجارى للأسرة: </b><?php echo $chec1 ?> </h6>
            </div>
            
            
            <div class="col-xs-6 ">
                <h6><b>نوعة:</b> <?php echo $business ?></h6>
                
            </div>
            
            
            


                
            <div class="col-xs-6 ">
            <h6><b>هل لدى الأسرة أى ممتلكات ثابتة :</b>
            
            <?php
if(isset($propety) && $propety != null){
  foreach($propety as $prop)
  {
        if(isset($result3[$this->uri->segment(3)]) && $result3[$this->uri->segment(3)]->propety == $prop->id )
          /*  $select = 'checked="checked"';
        else
            $select = '';*/
        echo ''.$prop->title.'  </h6>
                
            </div>';
        
  }
  if($result3[$this->uri->segment(3)]->propety == 0)
        echo 'لا يوجد  </h6>
                
            </div>';
}
  
  ?>
            <div class="col-xs-6">
            <h6><b>الحالة الصحية للأسرة :</b> <?php echo $family_health ?></h6>
            </div>
 

               
            <div class="col-xs-6 ">
            <h6><b>الحالة الاجتماعية والمعيشة  :</b>
            
            <?php
if(isset($living_type) && $living_type != null){
  foreach($living_type as $live)
  {
        if(isset($result3[$this->uri->segment(3)]) && $result3[$this->uri->segment(3)]->living_type == $live->id)
               /* $select = 'checked="checked"';
            else
                $select = '';*/
        echo ''.$live->title.'  </h6>
                
            </div>';
  }
}
  
  ?>
            <div class="col-xs-6 ">
            <h6><b>معلومات إضافية :</b> <?php echo $info ?></h6>
            </div>
            
            
                


            
                <div class="line col-xs-12"></div>
            


            
            <div class="col-xs-3 ">
            <h6><b>رأى الباحث :</b></h6>
            </div>
            <div class="col-xs-9 ">
            <h6><?php echo strip_tags($opinion) ?></h6>
            </div>

            


            
            <div class="col-xs-3 ">
            <h6><b>اسم الباحث :</b> </h6>
            </div>
            <div class="col-xs-3 ">
            <h6><?php echo $researcher ?></h6>
            </div>
            <div class="col-xs-6 ">
            <h6><b>التوقيع:</b></h6>
            </div>
            


            
            <div class="col-xs-3 ">
            <h6><b>قرار لجنة البحث والمساعدات:</b></h6>
            </div>
            <div class="col-xs-9 ">
            <h6><?php 
            if(isset($result5[$this->uri->segment(3)]) && $result5[$this->uri->segment(3)] != null)
                echo strip_tags($result5[$this->uri->segment(3)]->opinion); ?></h6>
               
            </div>

  
                 ..................................................................................................................................................................................................................................................................................................................................
                          

<?php 

if(isset($result5[$this->uri->segment(3)])){
    
    if(isset($member)){
        
        $committee_id = unserialize($result5[$this->uri->segment(3)]->committee_id);
        
        for($y = 0 ;$y<count($committee_id); $y++){
            
            if($member[$committee_id[$y]]->job_title_fk == 1){
                $member_name='رئيس مجلس الإدارة';
            }elseif($member[$committee_id[$y]]->job_title_fk == 2){
                $member_name='نائب رئيس مجلس الإدارة';
            }elseif($member[$committee_id[$y]]->job_title_fk == 3){
                $member_name='الأمين العام';
            }elseif($member[$committee_id[$y]]->job_title_fk == 4){
                $member_name='أمين الصندوق';
            }elseif($member[$committee_id[$y]]->job_title_fk == 5){
                $member_name='عضو مجلس الإدارة';
            }
            
            echo '
                <div class="col-xs-5 ">
                <h6><b>الاسم :</b> '.$member[$committee_id[$y]]->name.' ( '.$member_name.' )</h6>
                </div>
                <div class="col-xs-4 ">
                <h6><b>التوقيع:</b></h6>
                </div>
                <div class="col-xs-3 ">
                <h6><b>التاريخ:</b>  '.$result5[$this->uri->segment(3)]->date.' هـ</h6>
                </div>
                ';
        }
    } 
}

?>

            <!--div class="col-xs-12"> 
            <h6><b>التاريخ:</b>   /  / 14 هـ</h6>
            </div-->



</div>





         

    


</div>

    
                    <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
 