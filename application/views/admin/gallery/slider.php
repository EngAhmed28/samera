<div class="inner-tabs">
    <ul class="list-unstyled">
        <li class="red"><a href="#" data-toggle="modal" data-target="#addjob"><i class="fa fa-plus  fa-2x" aria-hidden="true"></i> إضافة جديد</a></li>
        <li class="green"><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> تعديل بيانات</a></li>
        <li class="blue"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> عرض نتائج</a></li>
        <li class="purple"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> إضافة جديد</a></li>
        <li class="chocolate"><a href="#"><i class="fa fa-plus" aria-hidden="true"></i> إضافة جديد</a></li>
    </ul>
</div>
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/updateslider/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
 <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text" name="title"  value="<?php echo $result['title']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>الصورة</label>
                    <input type="file" id="img" name="img" class=" form-control col-xs-6 no-padding" >
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                </div>
            </div>
        </div>


        <div class="col-md-5"></div>
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <input type="submit"  style="width: 100px" name="update_slider" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php echo form_close()?>
<?php else: ?>
    <?php echo form_open_multipart('dashboard/addslider',array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="inner-content">

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>العنوان</label>
                <input type="text" name="title" class=" form-control col-xs-6 no-padding" required >
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>الصورة</label>
                <input type="file" id="img" name="img" class=" form-control col-xs-6 no-padding" required>
            </div>

        </div>
    </div>



    <div class="col-md-5"></div>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <input type="submit"  style="width: 100px" name="add_slider" value="حفظ" class="btn btn-primary" >
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
                        <th>العنوان</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $x++; ?>
                    <tr>
                        <td><?php echo $x?></td>
                        <td><?php echo $record->title?></td>
                        <td>
                            <a href="<?php echo base_url().'dashboard/updateslider/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                            <a  href="<?php echo base_url().'dashboard/deleteslider/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
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

