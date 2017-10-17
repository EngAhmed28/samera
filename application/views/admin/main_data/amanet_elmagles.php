
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>

<div class="inner-content">
    <?php if(isset($result)): ?>


    <?php echo form_open_multipart('dashboard/updateamanet_elmagles/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>

        <div class="col-md-9">
            <div class="layout">
                <div class="form-group">
                    <label>النتائج المتوقعة للجمعية</label>
                    <textarea id="content"  name="content" class="form-control text-right" cols="50" rows="10" required="required"><?php echo $result['content']; ?></textarea>
            </div>
        </div>
            <div class="col-md-5"></div>
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <input type="submit"  style="width: 100px" name="update" value="حفظ" class="btn btn-primary" >
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>


<?php echo form_close()?>

<?php elseif(! $records): ?>
            <?php echo form_open_multipart('dashboard/addamanet_elmagles',array('class'=>"form-horizontal",'role'=>"form" ))?>
       <div class="col-md-9">
                <div class="layout">
                    <div class="form-group">
                        <label>النتائج المتوقعة للجمعية</label>
                        <textarea id="content"  name="content" class="form-control text-right" cols="50" rows="10"></textarea>
                    </div>
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-4">
                    <div class="layout">
                        <div class="form-group">
                            <input type="submit"  style="width: 100px" name="add" value="حفظ" class="btn btn-primary" >
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>

    <?php echo form_close()?>

<?php else: ?>

    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th  style="text-align: center">نص الكلمة</th>
            <th  style="text-align: center">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title=""><?php echo word_limiter($record->content,10)?> </td>
                <td data-title="التحكم" class="text-center">
                    <button type="button" class="btn btn-info btn-xs col-lg-5" data-toggle="modal" data-target="#myModal"><i class="fa fa-list"></i> عرض </button>
                    <a href="<?php echo base_url().'dashboard/updateamanet_elmagles/'.$record->id?>" class="btn btn-warning btn-xs col-lg-5"><i class="fa fa-pencil"></i> تعديل</a>
                </td>
            </tr>


        <?php endforeach ;?>

        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>

<?php endif?>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4" style="font-size: 16px;">النتائج المتوقعة للجمعية </div>
                    <div class="col-sm-8"><?php echo $record->content?> </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
