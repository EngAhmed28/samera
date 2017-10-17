
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/update_gehat_da3ma/'.$result['id'],array('role'=>"form" ))?>
 <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم الجهة</label>
                    <input type="text" id="title"  value="<?php echo $result['title']; ?>" name="title" class="form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>اللوجو</label>
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
                    <input type="submit"  style="width: 100px" name="update_gehat_da3ma" value="حفظ" class="btn btn-primary" >
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
<?php echo form_close()?>
<?php else: ?>
    <?php echo form_open_multipart('dashboard/add_gehat_da3ma',array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="inner-content">

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>إسم الجهة</label>
                <input type="text" name="title" class=" form-control col-xs-6 no-padding" required >
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>اللوجو</label>
                <input type="file" id="img" name="img" class=" form-control col-xs-6 no-padding" required>
            </div>

        </div>
    </div>



    <div class="col-md-5"></div>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <input type="submit"  style="width: 100px" name="add_gehat_da3ma" value="حفظ" class="btn btn-primary" >
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
                        <th>إسم الجهة</th>
                        <th>الإجراء</th>
                        <th>التفاصيل</th>
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
                            <a href="<?php echo base_url().'dashboard/update_gehat_da3ma/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                            <a  href="<?php echo base_url().'dashboard/delete_gehat_da3ma/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id?>"><i class="fa fa-list"></i> التفاصيل</button>
                        </td>
                    </tr>
            <!------------------------------------------------------------->
            <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width:550px">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">تفاصيل الجهة</h4>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                <h5>إسم الجهة:</h5>
                            </div>
                            <div class="col-sm-8">
                                <h5><?php echo $record->title?></h5>
                            </div>
                        </div>
                        <div class="row" style="margin-right:10px">
                            <div class="col-md-4">
                                <h5>اللوجو</h5>
                            </div>
                            <div class="col-sm-8">
                                <div class="imgContent">
                                    <img src="<?php echo base_url('uploads/thumbs/'.$record->img)?>" alt="اللوجو " class="img-rounded" width="100" height="100">
                                    <span class="title">اللوجو </span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-------------------------------------------------------------->
        <?php endforeach ;?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <?php endif;?>
</div>

