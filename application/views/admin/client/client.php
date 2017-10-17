
<div class="clearfix"></div>
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
<div class="inner-content">
    <?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/updateclient/'.$result['id'],array('role'=>"form" ));
        $out["name"]=$result['name'];
        $out["job_title_fk"]=$result['job_title_fk'];
        $out["address"]=$result['address'];
        $out["card_number"]=$result['card_number'];
        $out["phone_number"]=$result['telephone'];
        $out['input']='<input type="submit" name="update" value="تعديل" class="btn btn-primary"/>';
    ?>
    <?php else: ?>
    <?php echo form_open_multipart('dashboard/addclient',array('role'=>"form" ));
        $out["name"]='';
        $out["job_title_fk"]='';
        $out["address"]='';
        $out["card_number"]='';
        $out["phone_number"]='';
        $out['input']='<input type="submit"  name="add" value="حفظ" class="btn btn-primary"/>';
    ?>
    <?php endif?>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>إسم الموظف</label>
                <input type="text"  name="name" class=" form-control col-xs-6 no-padding" value="<?php echo $out['name'];  ?>" id="">
            </div>
            <div class="form-group">
                <label>رقم الهوية</label>
                <input type="number"   name="card_number" value="<?php echo $out['card_number'];  ?>"  class="form-control col-xs-6 no-padding" value="" id="">

            </div>
        </div>
    </div>
<!-------------------------------------------------------------------------------------------------->
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>المنصب الوظيفي</label>
                <select id="job_title_fk"  name="job_title_fk" class="form-control text-right"  required="required">
                    <?php $array_tupes=array("موظف","باحث");
                    for ($x=0;$x<sizeof($array_tupes);$x++){
                        $selected ="";   if($out['job_title_fk'] ==$x){$selected ="selected";}?>
                        <option value="<?php echo $x; ?>" <?php echo $selected;?> ><?php echo $array_tupes[$x];?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label>رقم الجوال</label>
                <input type="number" name="phone_number" class="form-control col-xs-6 no-padding" value="<?php echo $out['phone_number'];  ?>" id="">

            </div>
        </div>




    </div>
<!-------------------------------------------------------------------------------------------------->
    <div class="col-md-4">
        <div class="layout">

            <div class="form-group">
                <label>العنوان</label>
                <input type="text" class="form-control col-xs-6 no-padding" name="address" value="<?php echo $out['address'];  ?>">
            </div>
        </div>




    </div>
<!-------------------------------------------------------------------------------------------------->
    <div class="row" >
        <div class="col-md-5"></div>
        <div class="col-md-3">
           <?php echo $out['input']?>
        </div>
        <div class="col-md-4"></div>
    </div>

    <?php echo form_close()?>
</div>


<?php if(isset($records)&&$records!=null):?>
<div class="col-md-12 inner-content">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">جدول النتائج</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="example" class=" display table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th width="">#</th>
                        <th class="">إسم الموظف</th>
                        <th class="">المسمى الوظيفي</th>
                        <th class="">التحكم</th>
                        <th class="">حالة الموظف</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $x = 0; ?>
                    <?php foreach($records as $record):?>
                        <?php
                        $x++;
                        if($record->suspend == 1) {
                            $class = 'success';
                            $title = 'نشط';}
                        else{
                            $class = 'danger';
                            $title = 'غير نشط';
                        }if($record->job_title_fk == 1){
                            $job_title_fk="باحث";
                        }elseif($record->job_title_fk == 0){
                            $job_title_fk="موظف";
                        } ?>
                        <tr>
                            <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                            <td data-title=""><?php echo $record->name?> </td>
                            <td  data-title=""><?php echo $job_title_fk ?></td>
                            <td data-title="التحكم" class="text-center">
                                <a href="<?php echo base_url().'dashboard/updateclient/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                                <a  href="<?php echo base_url().'dashboard/deleteclient/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                            </td>
                            <td data-title="" class="text-center">
                                <a href="<?php echo base_url().'dashboard/suspendclient/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs"><?php echo $title ?> </a>
                            </td>
                        </tr>
                    <?php endforeach ;?>
                   </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<?php endif;?>