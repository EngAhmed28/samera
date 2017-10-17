
<div class="clearfix"></div>
<span id="message">

<?php

if(isset($_SESSION['message']))

    echo $_SESSION['message'];

unset($_SESSION['message']);

?>

</span>

    <div class="col-md-12 inner-content">

        <div class="panel with-nav-tabs panel-default">

            <div class="panel-heading">

                <ul class="nav nav-tabs">

                    <li class="active"><a href="#tab0default" data-toggle="tab">الطلبات الواردة </a></li>

                    <li><a href="<?php echo base_url().'dashboard/work_approved/1' ?>#tab1default" data-toggle="tab">الطلبات الموافق عليها</a></li>

                    <li><a href="#tab2default" data-toggle="tab">الطلبات المرفوضة</a></li>

                </ul>

            </div>

            <div class="panel-body">

                <div class="tab-content">

                    <div class="tab-pane fade in active" id="tab0default">

<?php if(isset($records)&& $records!=null):?>



  <table id="example" class=" display table table-bordered table-striped table-hover">



        



        <thead>

        

        <tr class="info">



            <th width="2%">#</th>



            <th  class=" ">التاريخ</th>



            <th class=" ">إسم طالب المساعدة</th>

            

            <th class=" ">الجوال</th>



            <th width="15%" class=" ">التحكم</th>


        </tr>



        </thead>

        <tbody>

        <?php 
        
            $serial=0;

            ?>

        <?php foreach($records as $record):

                $serial++;

               

           for($x = 0 ; $x < count($health_state) ; $x++)
    if($health_state[$x]->id == $record->health_state)
        $health = $health_state[$x]->title;
  
  for($x = 0 ; $x < count($social_status) ; $x++)
    if($social_status[$x]->id == $record->social_status)
        $social = $social_status[$x]->title;
        
         for($x = 0 ; $x < count($house_type) ; $x++)
    if($house_type[$x]->id == $record->house_type)
        $type = $house_type[$x]->title;
  
  for($x = 0 ; $x < count($house_state) ; $x++)
    if($house_state[$x]->id == $record->house_state)
        $status = $house_state[$x]->title;          

                

        ?>

       

            <tr data-toggle="tooltip" data-placement="bottom" title="إضغط للتفاصيل">

                <td data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><span class="badge"><?php echo $serial?></span></td>

                

                <td data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><?php echo $record->date?></td>

                

                <td data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><?php echo $record->name?> </td>

                

                <td data-toggle="modal" data-target="#myModal<?php echo $record->id ?>"><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?> </td>



                <td >

                    <div class="row">

                    <div class="col-md-3">

                    <a data-toggle="tooltip" data-placement="bottom" title="موافقة" href="<?php echo base_url().'dashboard/approved_request/1/'.$record->id?>" class="btn btn-success btn-xs"> <i class="fa fa-check"></i></a>

                    </div>

                    <div class="col-md-3">

                    <a data-toggle="tooltip" data-placement="bottom" title="مرفوضة" href="<?php echo base_url().'dashboard/approved_request/2/'.$record->id?>" class="btn btn-danger btn-xs"> <i class="fa fa-times"></i></a>

                    </div>


                    </div>

                </td>


            </tr>
            
            <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل طالب المساعدة</h4>

             </div>
             <div class="row" style="margin-right:10px">
             
<div class="col-md-4">     
<h5>الإسم:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->name ?></h5>
</div>

<div class="col-md-4">     
<h5>تاريخ الميلاد:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->birth_date ?></h5>
</div>

<div class="col-md-4">     
<h5>الجوال:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف المنزل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->home_phone)echo $record->home_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان السكن:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الصحية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($health))echo $health; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الإجتماعية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($social))echo $social;else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>نوع المستفيد:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($benefit[$record->benefit]->title))echo $benefit[$record->benefit]->title;else echo 'لا يوجد';?></h5>
</div>

<div class="col-md-4">     
<h5>عدد أفراد الأسرة:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo ($record->male_num +  $record->femal_num +1)?></h5>
</div>

<div class="col-md-4">     
<h5>المهنة:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job)echo $record->job; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_place)echo $record->job_place; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_phone)echo $record->job_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الراتب:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->salary ?></h5>
</div>

</div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>

        <?php 

        

        endforeach ;?>



        </tbody>



    </table>



    <div class="text-center">

            </div>



<?php 

else:

echo '<div class="alert alert-danger" >

      لا توجد طلبات مساعدة واردة

          </div>';

endif;?>





 </div>

     <div class="tab-pane fade" id="tab1default">

 

     <?php if(isset($records2)&&$records2!=null):?>



   <table id="example" class=" display table table-bordered table-striped table-hover">



      



        <thead>

        

        <tr class="success">



            <th width="2%">#</th>



            <th  class=" ">التاريخ</th>



            <th class=" ">إسم طالب المساعدة</th>

            

            <th class=" ">الجوال</th>



            <th width="5%" class=" ">التحكم</th>



        </tr>



        </thead>

        <tbody>

        <?php 
        
            $serial=0;

            ?>

        <?php foreach($records2 as $record):

                $serial++;

               

                    
for($x = 0 ; $x < count($health_state) ; $x++)
    if($health_state[$x]->id == $record->health_state)
        $health = $health_state[$x]->title;
  
  for($x = 0 ; $x < count($social_status) ; $x++)
    if($social_status[$x]->id == $record->social_status)
        $social = $social_status[$x]->title;
        
         for($x = 0 ; $x < count($house_type) ; $x++)
    if($house_type[$x]->id == $record->house_type)
        $type = $house_type[$x]->title;
  
  for($x = 0 ; $x < count($house_state) ; $x++)
    if($house_state[$x]->id == $record->house_state)
        $status = $house_state[$x]->title;
                

        ?>

       

            <tr data-toggle="tooltip" data-placement="bottom" title="إضغط للتفاصيل">

                <td data-toggle="modal" data-target="#myModal2<?php echo $record->id ?>"><span class="badge"><?php echo $serial?></span></td>

                

                <td data-toggle="modal" data-target="#myModal2<?php echo $record->id ?>"><?php echo $record->date?></td>

                

                <td data-toggle="modal" data-target="#myModal2<?php echo $record->id ?>"><?php echo $record->name?> </td>

                

                <td data-toggle="modal" data-target="#myModal2<?php echo $record->id ?>"><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?> </td>



                <td >

                    <div class="row">

                    <div class="col-md-3">

                    <a data-toggle="tooltip" data-placement="bottom" title="الرجوع في الموافقة" href="<?php echo base_url().'dashboard/approved_request/0/'.$record->id?>" class="btn btn-warning btn-xs   "> <i class="fa fa-undo"></i></a>

                    </div>


                    </div>

                </td>



            </tr>

 <div class="modal fade" id="myModal2<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل طالب المساعدة</h4>

             </div>
             <div class="row" style="margin-right:10px">
             
<div class="col-md-4">     
<h5>الإسم:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->name ?></h5>
</div>

<div class="col-md-4">     
<h5>تاريخ الميلاد:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->birth_date ?></h5>
</div>

<div class="col-md-4">     
<h5>الجوال:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف المنزل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->home_phone)echo $record->home_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان السكن:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الصحية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($health))echo $health; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الإجتماعية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($social))echo $social;else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>نوع المستفيد:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($benefit[$record->benefit]->title))echo $benefit[$record->benefit]->title;else echo 'لا يوجد';?></h5>
</div>

<div class="col-md-4">     
<h5>عدد أفراد الأسرة:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo ($record->male_num +  $record->femal_num +1)?></h5>
</div>

<div class="col-md-4">     
<h5>المهنة:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job)echo $record->job; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_place)echo $record->job_place; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_phone)echo $record->job_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الراتب:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->salary ?></h5>
</div>

</div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>


        <?php 

        

        endforeach ;?>



        </tbody>



    </table>



    <div class="text-center">

            </div>



<?php 

else:

echo '<div class="alert alert-danger" >

      لا توجد طلبات مساعدة موافق عليها

          </div>';
endif;?>

 </div>

<!---------------------------------------------------------------------------------------------------------------->             



     <div class="tab-pane fade" id="tab2default">

     

     <?php if(isset($records3)&&$records3!=null):?>

  

  <table id="example" class=" display table table-bordered table-striped table-hover">



       



        <thead>

        

        <tr class="danger">



            <th width="2%">#</th>



            <th  class=" ">التاريخ</th>



            <th class=" ">إسم طالب المساعدة</th>

            

            <th class=" ">الجوال</th>



            <th width="5%" class=" ">التحكم</th>



        </tr>



        </thead>

        <tbody>

        <?php 
        
            $serial=0;

            ?>

        <?php foreach($records3 as $record):

                $serial++;

               

            for($x = 0 ; $x < count($health_state) ; $x++)
    if($health_state[$x]->id == $record->health_state)
        $health = $health_state[$x]->title;
  
  for($x = 0 ; $x < count($social_status) ; $x++)
    if($social_status[$x]->id == $record->social_status)
        $social = $social_status[$x]->title;
        
         for($x = 0 ; $x < count($house_type) ; $x++)
    if($house_type[$x]->id == $record->house_type)
        $type = $house_type[$x]->title;
  
  for($x = 0 ; $x < count($house_state) ; $x++)
    if($house_state[$x]->id == $record->house_state)
        $status = $house_state[$x]->title;        

                

        ?>

       

            <tr data-toggle="tooltip" data-placement="bottom" title="إضغط للتفاصيل">

                <td data-toggle="modal" data-target="#myModal3<?php echo $record->id ?>"><span class="badge"><?php echo $serial?></span></td>

                

                <td data-toggle="modal" data-target="#myModal3<?php echo $record->id ?>"><?php echo $record->date?></td>

                

                <td data-toggle="modal" data-target="#myModal3<?php echo $record->id ?>"><?php echo $record->name?> </td>

                

                <td data-toggle="modal" data-target="#myModal3<?php echo $record->id ?>"><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?> </td>



                <td >

                    <div class="row">

                    <div class="col-md-3">

                    <a data-toggle="tooltip" data-placement="bottom" title="الرجوع في الرفض" href="<?php echo base_url().'dashboard/approved_request/0/'.$record->id?>" class="btn btn-warning btn-xs   "> <i class="fa fa-undo"></i></a>

                    </div>


                    </div>

                </td>



            </tr>
            
<div class="modal fade" id="myModal3<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل طالب المساعدة</h4>

             </div>
             <div class="row" style="margin-right:10px">
             
<div class="col-md-4">     
<h5>الإسم:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->name ?></h5>
</div>

<div class="col-md-4">     
<h5>تاريخ الميلاد:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->birth_date ?></h5>
</div>

<div class="col-md-4">     
<h5>الجوال:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف المنزل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->home_phone)echo $record->home_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان السكن:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الصحية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($health))echo $health; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الحالة الإجتماعية:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($social))echo $social;else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>نوع المستفيد:</h5>
</div>
<div class="col-sm-8">
<h5><?php if(isset($benefit[$record->benefit]->title))echo $benefit[$record->benefit]->title;else echo 'لا يوجد';?></h5>
</div>

<div class="col-md-4">     
<h5>عدد أفراد الأسرة:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo ($record->male_num +  $record->femal_num +1)?></h5>
</div>

<div class="col-md-4">     
<h5>المهنة:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job)echo $record->job; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>عنوان العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_place)echo $record->job_place; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>هاتف العمل:</h5>
</div>
<div class="col-sm-8">
<h5><?php if($record->job_phone)echo $record->job_phone; else echo 'لا يوجد'; ?></h5>
</div>

<div class="col-md-4">     
<h5>الراتب:</h5>
</div>
<div class="col-sm-8">
<h5><?php echo $record->salary ?></h5>
</div>

</div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>


        <?php 

        

        endforeach ;?>



        </tbody>



    </table>



    <div class="text-center">

            </div>



<?php 

else:

echo '<div class="alert alert-danger" >

      لا توجد طلبات مساعدة مرفوضة 

          </div>';

endif;?>

</div>

<!--------------------------------------------------------------------------------------------------------->             

 

            </div>

        </div>

    </div>

</div>



<style>

td { cursor: pointer; cursor: hand; }



</style>





