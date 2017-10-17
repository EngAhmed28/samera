
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/updateadver/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
 <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>صورة الإعلان</label>
                    <input type="file" id="image" name="image" class=" form-control col-xs-6 no-padding" >
                </div>
             
            </div>
        </div>
     <div class="col-md-4" >
         <div class="layout">

             <div class="form-group">
                 <img src="<?php echo base_url('uploads/images/'.$result['image'].''); ?>" height="200px" width="200px">
             </div>
         </div>
      </div>
 </div>
     <div class="inner-content">

        <div class="col-md-5"></div>
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <input type="submit"  style="width: 100px" name="update_adver" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php echo form_close()?>
<?php else: ?>
    <?php echo form_open_multipart('dashboard/addadver',array('class'=>"form-horizontal",'role'=>"form" ))?>

    <div class="inner-content">

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>صورة الإعلان</label>
                <input type="file" id="image" name="image" class=" form-control col-xs-6 no-padding" required>
            </div>

        </div>
    </div>

    </div>
        <div class="inner-content">
    <div class="col-md-5"></div>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <input type="submit"  style="width: 100px" name="add_adver" value="حفظ" class="btn btn-primary" >
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
                <table id="example" class=" display table table-bordered table-striped table-hover" >
                    <thead>
                    <tr class="info">
                        <th  width="5%" style="text-align: center">م</th>
                        <th width="40%"  style="text-align: center">صورة الإعلان</th>
                        <th width="40%"  style="text-align: center">الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $x++; ?>
                    <tr>
                        <td><?php echo $x?></td>
                        <td    style=" padding-right: 150px;"><img width="100" height="100" src="<?php echo base_url('uploads/thumbs/'.$record->image)?>"/></td>
                        <td style=" padding-right: 150px;">
                            <a href="<?php echo base_url().'dashboard/updateadver/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                            <a  href="<?php echo base_url().'dashboard/deleteadver/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
                        </td>
                    </tr>

        <?php endforeach ;?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php endif;?>
</div>

