
<div class="clearfix"></div>



<div class="inner-content">


    <?php echo form_open_multipart('dashboard/requests_period',array('role'=>"form" )); ?>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>التاريخ من</label>
                <input  type="text" id="popupDatepicker" onchange="return loadd($('#popupDatepicker').val(),$('#popupDatepicker2').val());" name="date_from" class="form-control col-xs-6 no-padding" required="required" />
            </div>
        </div>




    </div>
    <div class="col-md-4">
        <div class="layout">

            <div class="form-group">
                <label> التاريخ إلى</label>
                <input type="text" id="popupDatepicker2" onchange="return loadd($('#popupDatepicker').val(),$('#popupDatepicker2').val());" name="date_to" class="form-control col-xs-6 no-padding"  required="required"/>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>

    <?php echo form_close()?>




</div>


<div id="optionearea1">

    <?php if(isset($records)&&$records!=null):?>



    <div class="well bs-component"  ="wait 0s, then enter left and hustle 100%">
    <fieldset>

        <table id="no-more-tables" class="table table-bordered" role="table">


            <thead>

            <tr>
                <th width="2%">#</th>
                <th  class="text-right">إسم طالب المساعدة</th>
                <th  class="text-right">التفاصيل</th>
                <th  class="text-right">رأي الباحث</th>
                <th  class="text-right">رأي مجلس الإدارة</th>


            </tr>

            </thead>
            <tbody>
            <?php $serial = 0; ?>
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
                <tr>
                    <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                    <td ><?php echo $record->name?></td>
                    <td >
                        <button class="btn btn-info btn-xs col-lg-12" data-toggle="modal" data-target="#myModal<?php echo $record->id ?>">

                            <i class="fa fa-list" ></i> بيانات طالب المساعدة </button>
                    </td>
                    <td >

                        <?php

                        if(isset($result3[$record->id])&&$result3[$record->id]!=null)
                            echo '<button class="btn btn-success btn-xs col-lg-12" data-toggle="modal" data-target="#myModal2'.$record->id.'">

                           <i class="fa fa-list"></i> عرض رأي الباحث </button>';
                        else
                            echo 'لا يوجد';

                        ?>

                    </td>

                    <td >

                        <?php

                        if(isset($result4[$record->id])&&$result4[$record->id]!=null)
                            echo '<button class="btn btn-primary btn-xs col-lg-12" data-toggle="modal" data-target="#myModal3'.$record->id.'">

                           <i class="fa fa-list"></i> عرض رأي مجلس الإدارة </button>';
                        else
                            echo 'لا يوجد';

                        ?>

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
                                    <h5><?php echo $record->mobile ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>هاتف المنزل:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->home_phone ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>عنوان السكن:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->town. ' , '  .$record->neighborhood; ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>نوع السكن:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $status; ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>حالة السكن:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $type; ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>الحالة الصحية:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $health ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>الحالة الإجتماعية:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $social ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>عدد أفراد الأسرة:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo ($record->male_num +  $record->femal_num)?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>المهنة:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->job ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>عنوان العمل:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->job_place ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>هاتف العمل:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $record->job_phone ?></h5>
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

                <?php if(isset($result3[$record->id])&&$result3[$record->id]!=null) { ?>

                <div class="modal fade" id="myModal2<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                    <div class="modal-dialog" role="document">

                        <div class="modal-content" style="width:550px">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="modal-title">رأي الباحث لطلب بإسم <?php echo $record->name ?></h4>

                            </div>
                            <div class="row" style="margin-right:10px">

                                <div class="col-md-4">
                                    <h5>إسم الباحث:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $result3[$record->id]->name ?></h5>
                                </div>

                                <div class="col-md-4">
                                    <h5>رأي الباحث:</h5>
                                </div>
                                <div class="col-sm-8">
                                    <h5><?php echo $result3[$record->id]->opinion  ?></h5>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>

                        </div>

                    </div>

                </div>

            <?php }

                if(isset($result4[$record->id])&&$result4[$record->id]!=null){

                    ?>


                    <div class="modal fade" id="myModal3<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                        <div class="modal-dialog" role="document">

                            <div class="modal-content" style="width:550px">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    <h4 class="modal-title">رأي مجلس الإدارة لطلب بإسم <?php echo $record->name ?></h4>

                                </div>
                                <div class="row" style="margin-right:10px">

                                    <div class="col-md-4">
                                        <h5>رأي مجلس الإدارة:</h5>
                                    </div>
                                    <div class="col-sm-8">
                                        <h5><?php

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


                                            ?></h5>
                                    </div>

                                    <div class="col-md-4">
                                        <h5>التفاصيل:</h5>
                                    </div>
                                    <div class="col-sm-8">
                                        <?php

                                        echo $result4[$record->id]->details;

                                        ?>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                </div>

                            </div>

                        </div>

                    </div>
                    <?php

                }?>

            <?php endforeach ;?>
            </tbody>
        </table>

    </fieldset>


</div>
<?php  endif;?>

</div>





<script>
        function loadd(date_from,date_to){

            if(date_from && date_to)
            {
                startDate = date_from;
                endDate = date_to;
                if (startDate > endDate){
                    alert('لا يجب أن يكون تاريخ البداية بعد تاريخ النهاية ');
                    $("#popupDatepicker").val('');
                    $("#popupDatepicker2").val('');
                    $("#optionearea1").html('');
                    return false;}
                else{
                    var dataString = 'date_from=' + date_from + '&date_to=' + date_to ;
                    $.ajax({
                        type:'post',
                        url: '<?php echo base_url() ?>/dashboard/requests_period',
                        data:dataString,
                        dataType: 'html',
                        cache:false,
                        success: function(html){
                            //$("#operation2").html('');
                            //$("#operation3").html('');
                            $("#optionearea1").html(html);
                        }
                    });
                }

                return false;

            }

        }
    </script>


