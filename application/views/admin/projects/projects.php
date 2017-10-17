
<div class="clearfix"></div>
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<div class="inner-content">
    <?php if(isset($result)):?>
        <?php echo form_open_multipart('dashboard/update_project/'.$result['id'],array('role'=>"form" ));
        $out["date"]=$result['date'];
        $out["projects_name"]=$result['title'];
        $out['content']=$result['content'];
        $photo=unserialize($result['image']);
        $out['input']='<input type="submit" name="update" value="تعديل" class="btn btn-primary" >';
        ?>
    <?php else: ?>
        <?php echo form_open_multipart('dashboard/add_project',array('role'=>"form" ));
        $out["date"]='';
        $out["projects_name"]='';
        $out['content']='';
        $photo=1;
        $out['input']=' <input type="submit"  name="add_project" value="حفظ" class="btn btn-primary" >';
        ?>
    <?php endif ?>
    <div class="row">
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>عنوان المشروع</label>
                <input type="text" name="projects_name" class="form-control col-xs-6 no-padding" value="<?php echo $out['projects_name'];  ?>" required=""/>
            </div>
        </div>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="col-md-4">
        <div class="layout">

            <div class="form-group">
                <label>تاريخ المشروع</label>
                <input type="text" id="popupDatepicker"   value="<?php echo $out['date']; ?>" name="projects_date" class="form-control col-xs-6 no-padding"  required="required"/>

            </div>
        </div>




    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="col-md-4"></div>
    <!-------------------------------------------------------------------------------------------------->
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="row">
        <div class="col-md-2">
            <div class="layout">
                <div class="form-group">
                    <label>عدد صور </label>
                    <input  type="number" id="photo_num"   name="photo_num" min="0" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control col-xs-6 no-padding" />
                </div>
            </div>
        </div>
        <div class="col-md-8" id="optionearea1"> </div>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="row">
        <?php  if($photo !=1){?>
        <table class="table table-bordered table-hover table-striped" cellspacing="0" " style="margin-right: 191px; width: 56%;" >
        <thead>
        <?php
            for($x = 0 ; $x < count($photo) ; $x++){
                if(count($photo) > 1){
                    $td = '<td style="padding-top: 10%;">
                               <a  href="'.base_url().'dashboard/delete_project_photo/'.$result['id'].'/'.$x.'"  class="btn btn-danger btn-xs">
                                حذف <i class="fa fa-trash"></i></a>                            
                               </td>';
                }else
                $td = '';
                $img = base_url('uploads/images').'/'.$photo[$x];
                echo '<tr class="">
                          <td class="text-center">
                          <img src="'.$img.'" height="100px" width="100px">
                          </td>
                          '.$td.'
                          </tr>';
            }  ?>
            </thead></table>
        <?php   } ?>
    </div>
    <!-------------------------------------------------------------------------------------------------->
    <div class="row">
        <div class="col-md-8">
            <div class="layout">
                <div class="form-group ">
                    <label>محتوي المشروع</label>
                    <textarea type="text" id=""  name="details" class="form-control " ><?php echo $out['content']; ?></textarea>
                </div>
            </div>
        </div>

    </div>


    <div class="row" >
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <?php echo $out['input']?>
        </div>
        <div class="col-md-4"></div>
    </div>

    <?php echo form_close()?>
</div>


<?php  if(isset($records)&&$records!=null):?>
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
                            <th  class="">عنوان المشروع</th>
                            <th class="">تاريخ المشروع</th>
                            <th width="30%" class="">التحكم</th>
                            <th width="15%" class="">حالة المشروع</th>
                            <th width="15%" class="">تم النشر بواسطة</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $serial = 0;
                        foreach($records as $record):
                            $serial++;
                            if($record->suspend == 1)
                            {
                                $class = 'success';
                                $title = 'نشط';
                            }
                            else
                            {
                                $class = 'danger';
                                $title = 'غير نشط';
                            }
                            ?>
                            <tr>
                                <td data-title="#"><span class="badge"><?php echo $serial ?></span></td>
                                <td ><?php echo $record->title?></td>
                                <td ><?php echo $record->date?></td>
                                <td data-title="التحكم" class="text-center">
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                                    <a href="<?php echo base_url().'dashboard/update_project/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                                    <a  href="<?php echo base_url().'dashboard/delete_project/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                                </td>
                                <td data-title="" class="text-center">
                                    <a href="<?php echo base_url().'dashboard/suspend_project/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs"><?php echo $title ?> </a>
                                </td>
                                <td ><?php echo $user[($serial-1)]['user_name']?></td>
                            </tr>
                            <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="gridSystemModalLabel">االمشروعات</h4>
                                        </div>
                                        <br />
                                        <div class="col-sm-3" style="font-size: 16px;">تاريخ المشروع</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo $record->date?>
                                        </div>
                                        <br /><br />
                                        <div class="col-sm-3" style="font-size: 16px;">عنوان المشروع</div>
                                        <div class="col-sm-9"  style="font-size: 16px;">
                                            <?php echo $record->title?>
                                        </div>
                                        <br /><br />
                                        <div class="modal-body">
                                            <div class="col-sm-2" style="font-size: 16px;">صور المشروع</div>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
                                                        <div class="carousel-inner" role="listbox">';
                                                            <?php
                                                            $photo=unserialize($record->image);
                                                            for($x=0;$x<count($photo);$x++){
                                                                if($x==0){
                                                                    $active='active';
                                                                }else{
                                                                    $active='';
                                                                }
                                                                $img = base_url('uploads/images').'/'.$photo[$x];
                                                                echo '
      <div class="item '.$active.'">
        <img src="'.$img.'" alt="صور المشروع">
      </div>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <a class="left carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="prev">
                                                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                        </a>
                                                        <a class="right carousel-control" href="#myCarousel<?php echo $record->id?>" role="button" data-slide="next">
                                                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <br/><br />
                                            </div>
                                            <br />
                                            <div class="col-md-3" style="font-size: 16px;"></div>
                                            <div class="col-md-9"></div>
                                            <br /><br />
                                            <div class="row">
                                                <div class="col-sm-4" style="font-size: 16px;">تفاصيل المشروع</div>
                                                <div class="col-sm-8">
                                                    <?php echo $record->content?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        <?php endforeach ;?>
                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
<?php endif;    ?>
<script>
    function lood(num){
        if(num>0 && num != '') {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>dashboard/add_project',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });
            return false;
        }
        else
        {
            $("#photo_num").val('');
            $("#optionearea1").html('');
        }
    }
</script>
<style>
    .carousel-inner > .item > img,
    .carousel-inner > .item > a > img {
        width: 70%;
        margin: auto;
    }
</style>
