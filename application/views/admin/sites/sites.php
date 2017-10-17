<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/update_sites/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم الموقع</label>
                    <input type="text" name="name"  value="<?php echo $result['name']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>عنوان الموقع</label>
                    <input type="text" name="url"  value="<?php echo $result['url']; ?>" class=" form-control col-xs-6 no-padding"  >
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
    <?php echo form_open_multipart('dashboard/add_sites',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم الموقع</label>
                    <input type="text" name="name"   class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>




        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>عنوان الموقع</label>
                    <input type="text" name="url"   class=" form-control col-xs-6 no-padding"  >
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
                            <th>إسم الموقع</th>
                            <th>عنوان الموقع</th>
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
                                <td><?php echo $record->name?></td>
                                <td><?php echo $record->url?></td>
                                <td>
                                    <a href="<?php echo base_url().'dashboard/update_sites/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                                    <a  href="<?php echo base_url().'dashboard/delete_sites/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
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

