


<?php if(isset($records)&&$records!=null){ ?>


    <div class="col-md-12">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">جدول النتائج</h3>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table id="example" class=" display table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th width="2%">#</th>
                        <th  class="text-right">إسم طالب المساعدة</th>
                        <th  class="text-right">التفاصيل</th>
                        <th  class="text-right">رأي الباحث</th>
                        <th  class="text-right">رأي مجلس الإدارة</th>
                    </tr>
                    </thead>
                    <tbody>
             <?php  $serial = 0;
    foreach($records as $record){

        $serial++;


        echo ' <tr>
                <td data-title="#"><span class="badge">'. $serial.'</span></td>
                <td >'.$record->name.'</td>
                <td >
                <button class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target="#myModal'.$record->id.'">

                           <i class="fa fa-list"></i> بيانات طالب المساعدة </button>
                </td>
                <td >';



        if(isset($result3[$record->id])&&$result3[$record->id]!=null)
            echo '<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModal2'.$record->id.'">

                           <i class="fa fa-list"></i> عرض رأي الباحث </button>';
        else
            echo 'لا يوجد';



        echo '</td>
                
                <td >';



        if(isset($result4[$record->id])&&$result4[$record->id]!=null)
            echo '<button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal3'.$record->id.'">

                           <i class="fa fa-list"></i> عرض رأي مجلس الإدارة </button>';
        else
            echo 'لا يوجد';



        echo '  </td>


            </tr>
            
            
            ';



    }
    echo '    </tbody>';

             foreach($records as $record){
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


                 if($record->home_phone)
                     $home_phone = $record->home_phone;
                 else
                     $home_phone = 'لا يوجد';

                 if($record->job)
                     $job = $record->job;
                 else
                     $job = 'لا يوجد';

                 if($record->job_place)
                     $job_place = $record->job_place;
                 else
                     $job_place = 'لا يوجد';

                 if($record->job_phone)
                     $job_phone = $record->job_phone;
                 else
                     $job_phone = 'لا يوجد';

                 if($record->salary)
                     $salary = $record->salary;
                 else
                     $salary = 'لا يوجد';

                 echo '
            <div class="modal fade" id="myModal'. $record->id .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">تفاصيل طالب المساعدة</h4>

             </div>
             <div class="row" style="margin-right:10px;">
   
             
<div class="col-md-4">     
<h5>الإسم:</h5>
</div>
<div class="col-sm-8">
<h5>'. $record->name.'</h5>
</div>

<div class="col-md-4">     
<h5>تاريخ الميلاد:</h5>
</div>
<div class="col-sm-8">
<h5>'. $record->birth_date.'</h5>
</div>

<div class="col-md-4">     
<h5>الجوال:</h5>
</div>
<div class="col-sm-8">
<h5>'.$record->mobile.'</h5>
</div>

<div class="col-md-4">     
<h5>هاتف المنزل:</h5>
</div>
<div class="col-sm-8">
<h5>'.$home_phone.'</h5>
</div>

<div class="col-md-4">     
<h5>عنوان السكن:</h5>
</div>
<div class="col-sm-8">
<h5>'. $place[$record->place]->title. ' , '  .$record->neighborhood.'</h5>
</div>

<div class="col-md-4">     
<h5>نوع السكن:</h5>
</div>
<div class="col-sm-8">
<h5>'. $status.'</h5>
</div>

<div class="col-md-4">     
<h5>حالة السكن:</h5>
</div>
<div class="col-sm-8">
<h5>'. $type.'</h5>
</div>

<div class="col-md-4">     
<h5>الحالة الصحية:</h5>
</div>
<div class="col-sm-8">
<h5>'. $health.'</h5>
</div>

<div class="col-md-4">     
<h5>الحالة الإجتماعية:</h5>
</div>
<div class="col-sm-8">
<h5>'. $social .'</h5>
</div>

<div class="col-md-4">     
<h5>عدد أفراد الأسرة:</h5>
</div>
<div class="col-sm-8">
<h5>'.($record->male_num +  $record->femal_num + 1).'</h5>
</div>

<div class="col-md-4">     
<h5>المهنة:</h5>
</div>
<div class="col-sm-8">
<h5>'. $job .'</h5>
</div>

<div class="col-md-4">     
<h5>عنوان العمل:</h5>
</div>
<div class="col-sm-8">
<h5>'. $job_place .'</h5>
</div>

<div class="col-md-4">     
<h5>هاتف العمل:</h5>
</div>
<div class="col-sm-8">
<h5>'. $job_phone .'</h5>
</div>

<div class="col-md-4">     
<h5>الراتب:</h5>
</div>
<div class="col-sm-8">
<h5>'. $salary .'</h5>
</div>

</div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>';

                 $researcher='';

                 if(isset($result3[$record->id])&&$result3[$record->id]!=null)
                 {
                     if(isset($result3[$record->id]->researcher_id)){
                         if($result3[$record->id]->researcher_id != 0)
                             $researcher = $client[$result3[$record->id]->researcher_id]->name;
                         else
                             $researcher = 'Admin';
                     }
                     else
                         $researcher = '';

                 }


                 if(isset($result3[$record->id])&&$result3[$record->id]!=null) {

                     echo'        <div class="modal fade" id="myModal2'. $record->id .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">رأي الباحث لطلب بإسم '. $record->name .'</h4>

             </div>
             <div class="row" style="margin-right:10px">
             
<div class="col-md-4">     
<h5>إسم الباحث:</h5>
</div>
<div class="col-sm-8">
<h5>'. $researcher .'</h5>
</div>

<div class="col-md-4">     
<h5>رأي الباحث:</h5>
</div>
<div class="col-sm-8">
<h5>'. $result3[$record->id]->opinion .'</h5>
</div>

</div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>';

                 }

                 if(isset($result4[$record->id])&&$result4[$record->id]!=null){




                     echo '<div class="modal fade" id="myModal3'. $record->id .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">

    <div class="modal-content" style="width:550px">

                    <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">رأي مجلس الإدارة لطلب بإسم '. $record->name .'</h4>

             </div>
             <div class="row" style="margin-right:10px">
             
<div class="col-md-4">     
<h5>رأي مجلس الإدارة:</h5>
</div>
<div class="col-sm-8">
<h5>';

                     if($result4[$record->id]->checked == 1)
                         $checked = 'يستحق الدعم النقدي والعيني من الفئة';
                     elseif($result4[$record->id]->checked == 2)
                         $checked = 'يستحق الدعم العيني فقط من الفئة';
                     elseif($result4[$record->id]->checked == 3)
                         $checked = 'يستبعد من أي دعم وذلك للأسباب التالية';

                     if($result4[$record->id]->fileds == 1)
                         $fileds = '(أ)';
                     elseif($result4[$record->id]->fileds == 2)
                         $fileds = '(ب)';
                     elseif($result4[$record->id]->fileds == 3)
                         $fileds = '(ج)';

                     echo $checked.' '.$fileds;



                     echo '</h5>
</div>

<div class="col-md-4">     
<h5>التفاصيل:</h5>
</div>
<div class="col-sm-8">
'. $result4[$record->id]->details.'
</div>

</div>
             
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>

    </div>

  </div>

</div>';


                 }

             }




             }




             ?>

                    </tbody>
                </table>
            </div>





        </div>

    </div>
</div>


