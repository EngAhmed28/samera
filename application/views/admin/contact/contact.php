
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>


<div class="col-md-12 inner-content">
    <?php echo form_open_multipart('dashboard/delete_selected_contact',array('class'=>"form-horizontal",'role'=>"form" ))?>

    <?php if(isset($records)&&$records!=null):?>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">جدول النتائج</h3>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table id="example" class=" display table table-bordered table-striped table-hover">
                        <caption class="text-right text-success" >
                            <input type="submit" style="float: right;" name="del" value="حذف ما تم إختياره" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs " title="حذف ما تم إختياره">
                        </caption>
                        <thead>
                        <tr class="info">
                            <th width="2%"><input type="checkbox" id="all" name="all" value="1" style="float: center" ></th>
                            <th></th>
                            <th>التاريخ</th>
                            <th>العنوان</th>
                            <th>أرسل بواسطة</th>
                            <th>الإجراء</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $x = ($this->uri->segment('3')*10)-10;

                        if($x < 0)
                            $x=0;
                        ?>
                        <?php foreach($records as $record):
                            $x++;
                            if($record->active == 0)
                                $envelop = '<i class="fa fa-envelope"></i>';
                            else
                                $envelop = '<i class="	fa fa-envelope-open-o"></i>';
                            ?>

                            <tr>
                                <td>
                                    <input type="checkbox" value="<?php echo $record->id?>" id="check" style="float: center;" name="check[]" class="cc">
                                  </td>

                                <td onclick="return read('<?php echo $record->id?>');"  ><?php echo $envelop; ?></td>

                                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->date?></td>

                                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->title?> </td>

                                <td onclick="return read('<?php echo $record->id?>');"><?php echo $record->email?> </td>
                                <td >
                                    <a  href="<?php echo base_url().'dashboard/delete_contact/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs   "> <i class="fa fa-trash"></i></a>

                                </td>
                            </tr>

                            <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="width:550px">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">تفاصيل الرسالة</h4>
                                        </div>

                                        <div class="row" style="margin-right:10px">
                                            <div class="col-md-4">
                                                <h5>عنوان الرسالة:</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <h5><?php echo $record->title?></h5>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right:10px">
                                            <div class="col-md-4">
                                                <h5>التاريخ:</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <h5><?php echo date('Y/m/d',$record->date)?></h5>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right:10px">
                                            <div class="col-md-4">
                                                <h5>إسم المرسل:</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <h5><?php echo $record->name ?></h5>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right:10px">
                                            <div class="col-md-4">
                                                <h5>الإيميل</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <h5><?php echo $record->email ?></h5>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-right:10px">
                                            <div class="col-md-4">
                                                <h5>نص الرسالة:</h5>
                                            </div>
                                            <div class="col-sm-8">
                                                <h5><?php echo $record->content ?></h5>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ;?>

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

</div>
<?php
else:
echo '<div class="alert alert-danger" >
              لا توجد رسائل واردة.
              </div>';
endif;
echo form_close()?>
<script>
    function read(id){
        var id = id;
        var url = '<?php echo base_url() ?>dashboard/viewmessage/' + id;
        window.location.replace(url);
        return false;
    }
</script>
<style>
    td { cursor: pointer; cursor: hand; }
</style>
<script>
    $(document).ready(function(){
        $('#all').on('click',function(){
            if(this.checked){
                $('.cc').each(function(){
                    this.checked = true;
                });
            }else{
                $('.cc').each(function(){
                    this.checked = false;
                });
            }
        });

        $('.cc').on('click',function(){
            if($('.cc:checked').length == $('.cc').length){
                $('#all').prop('checked',true);
            }else{
                $('#all').prop('checked',false);
            }
        });
    });


