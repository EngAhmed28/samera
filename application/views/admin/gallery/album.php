

<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/update_album/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
 <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>الصور</label>
                    <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control col-xs-6 no-padding" placeholder="   عدد الصور" >
                </div>
            </div>
        </div>

     <div class="col-md-8" id="optionearea1">

         <?php
         $photo=unserialize($result['img']);
         if($photo){?>
             <table  class="table table-bordered table-striped table-hover" style="width:500px">
                 <tbody>
                 <?php
                 for($x = 0 ; $x < count($photo) ; $x++){
                     if(count($photo) > 0){
                         if (!empty($photo[$x])):
                             ?>
                             <tr>
                                 <td>  <img src="<?php echo base_url()?>uploads/images/<?php echo $photo[$x];?>" height="200px" width="200px"></td>
                                 <td><a  href="<?php echo base_url()?>dashboard/delete_photo_album/<?echo $result['id'];?>/<? echo $x;?>"  class="btn btn-danger btn-xs "> حذف<i class="fa fa-trash"></i></a></td>
                             </tr>

                         <?endif; }} ?>
                 </tbody>
             </table>
         <? }?>
     </div>
 </div>


     <div class="inner-content">
        <div class="col-md-5"></div>
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <input type="submit"  style="width: 100px" name="update_album" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php echo form_close()?>
<?php else: ?>
    <?php echo form_open_multipart('dashboard/add_album',array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="inner-content">

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>الصور</label>
                <input type="number" id="photo_num"  name="photo_num" min="1" max="10" onkeyup="return lood($('#photo_num').val());" class="form-control col-xs-6 no-paddingt" placeholder="   عدد الصور" required>
            </div>
        </div>
    </div>


    <div class="col-md-8" id="optionearea1"></div>
</div>

    <div class="inner-content">
    <div class="col-md-5"></div>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <input type="submit"  style="width: 100px" name="add_album" value="حفظ" class="btn btn-primary" >
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<?php echo form_close(); endif;?>

<div class="col-md-12">
    <?php if(isset($records)&&$records!=null):?>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">جدول النتائج</h3>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table id="example" class=" display table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th  width="50%" style="text-align: center">الصور</th>
                        <th style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $serial = 0; ?>
                    <?php foreach($records as $record):?>
                        <?php
                        $serial++;
                        $photo=unserialize($record->img);
                        $img='';

                        for($x=0;$x<count($photo);$x++){

                            $img = base_url('uploads/images').'/'.$photo[$x];

                        }

                        ?>
                        <tr>
                            <td><?php echo $serial?></td>
                            <td >
                                <div id="myCarouse<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">

                                        <?php
                                        $photo = unserialize($record->img);
                                        for($x=0;$x<count($photo);$x++){
                                            if($x==0){
                                                $active='active';
                                            }else{
                                                $active='';
                                            }
                                            $img = base_url('uploads/images').'/'.$photo[$x];
                                            echo '
                                              <div class="item '.$active.'" >
                                                <img src="'.$img.'"  style="width:100px;height:100px;margin-right: 200px;">
                                              </div>';
                                        }
                                        ?>

                                    </div>
                                    <a class="left carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#myCarouse<?php echo $record->id?>" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </td>

                            <td data-title="التحكم" class="text-center">
                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل </button>
                                <a href="<?php echo base_url().'dashboard/update_album/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                                <a  href="<?php echo base_url().'dashboard/delete_album/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                            </td>



                        </tr>
                        <div class="modal fade" id="myModal<?php echo $record->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="gridSystemModalLabel">مكتبة الصور</h4>
                                    </div>
                                    <br />


                                    <div class="modal-body">
                                        <div class="col-sm-2" style="font-size: 16px;">الصور</div>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div id="myCarousel<?php echo $record->id?>" class="carousel slide" data-ride="carousel">
                                                    <div class="carousel-inner" role="listbox">

                                                        <?php
                                                        $photo=unserialize($record->img);
                                                        for($x=0;$x<count($photo);$x++){
                                                            if($x==0){
                                                                $active='active';
                                                            }else{
                                                                $active='';
                                                            }
                                                            $img = base_url('uploads/images').'/'.$photo[$x];
                                                            echo '
                                                      <div class="item '.$active.'">
                                                        <img src="'.$img.'" >
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


                                        <div class="col-md-3" style="font-size: 16px;"></div>
                                        <div class="col-md-9"></div>
                                        <br /><br />

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
    <?php endif;?>
</div>

<script>
    function lood(num){
        if(num>0)
        {
            var id = num;
            var dataString = 'num=' + id ;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_album',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $("#optionearea1").html(html);
                }
            });

            return false;
        }
        else{
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
