
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/updateAbout/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
 <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>عنوان المقطع</label>
                    <input type="text" name="title"  value="<?php echo $result['title']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>صورة المقطع</label>
                    <input type="file" id="img" name="img" class=" form-control col-xs-6 no-padding" >
                </div>
                <div class="form-group">
                    <img src="<?php echo base_url('uploads/images/'.$result['img'].''); ?>" height="200px" width="200px">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>تفاصيل المقطع</label>
                    <textarea name="content" id="content"  class="form-control col-xs-6 no-padding" cols="30" rows="10" ><?php echo strip_tags($result['content']); ?></textarea>
                </div>
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
    </div>
<?php echo form_close()?>
<?php else: ?>
 <?php echo form_open_multipart('dashboard/addabout',array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="inner-content">

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>عنوان المقطع</label>
                <input type="text" name="title" class=" form-control col-xs-6 no-padding" required >
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>صورة المقطع</label>
                <input type="file" id="img" name="img" class=" form-control col-xs-6 no-padding" required>
            </div>

        </div>
    </div>

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>تفاصيل المقطع</label>
                <textarea name="content" id="content"  class="form-control col-xs-6 no-padding"  required></textarea>
            </div>
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
                        <th>عنوان المقطع</th>
                        <th>تاريخ الإضافة</th>
                        <th>حالة المقطع</th>
                        <th>الإجراء</th>
                    </tr>
                    </thead>
                    <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $x++;
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
                        <td><?php echo $x?></td>
                        <td><?php echo $record->title?></td>
                        <td><?php echo $record->date?></td>
                        <td>
                            <a href="<?php echo base_url().'dashboard/suspendAbout/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs col-lg-6"><?php echo $title ?> </a>
                        </td>
                        <td>
                            <a href="<?php echo base_url().'dashboard/updateAbout/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                            <a  href="<?php echo base_url().'dashboard/deleteAbout/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
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

