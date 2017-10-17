
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($result)):?>
    <?php echo form_open_multipart('dashboard/updateMembers/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>الإسم</label>
                    <input type="text" name="name" class=" form-control col-xs-6 no-padding"  value="<?php echo $result['name']; ?>" >
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>المنصب الوظيفي</label>
                    <?php
                    $ra2es=0;
                    $na2eb=0;
                    $amen=0;
                    $amen_box=0;
                    if($checked){
                        foreach($checked as $che){
                            if($che->job_title_fk == '1'){
                                $ra2es=1;
                            }elseif($che->job_title_fk == '2'){
                                $na2eb=2;
                            }elseif($che->job_title_fk == '3'){
                                $amen=3;
                            }elseif($che->job_title_fk == '4'){
                                $amen_box=4;
                            }else{
                                $ra2es=0;
                                $na2eb=0;
                                $amen=0;
                                $amen_box=0;
                            }
                        }
                    }else{

                    }
                    ?>
                    <select class="choose-date selectpicker form-control" id="job_title_fk"  name="job_title_fk"  data-show-subtext="true" data-live-search="true">
                        <?
                        $seleted1='';
                        $seleted2='';
                        $seleted3='';
                        $seleted4='';
                        $seleted5='';

                        if($result['job_title_fk'] == 1){

                            $seleted1='selected="selected"';
                            echo' <option value="1" '.$seleted1.' >رئيس مجلس الإدارة</option>';
                        }elseif($result['job_title_fk'] == 2){
                            $seleted2=' selected="selected"';
                            echo' <option value="2" '.$seleted2.' >نائب رئيس مجلس الإدارة</option>';
                        }elseif($result['job_title_fk'] == 3){

                            $seleted3=' selected="selected"';
                            echo' <option value="3" '.$seleted3.' >الأمين العام</option>';
                        }elseif($result['job_title_fk'] == 4){
                            $seleted4=' selected="selected"';
                            echo' <option value="4" '.$seleted4.' >أمين الصندوق</option>';
                        }elseif($result['job_title_fk'] == 5){
                            $seleted5=' selected="selected"';
                        }
                        ?>

                        <?php if($ra2es == 0){

                            ?>
                            <option value="1" <?php echo $seleted1;?> >رئيس مجلس الإدارة</option>
                        <?}else{

                        }?>
                        <?php if($na2eb == 0){?>
                            <option value="2" <?php echo $seleted2;?> >نائب رئيس مجلس الإدارة</option>
                        <?}else{

                        }?>

                        <?php if($amen == 0){?>
                            <option value="3" <?php echo $seleted3;?>  >الأمين العام</option>
                        <?}else{

                        }?>


                        <?php if($amen_box == 0){?>
                            <option value="4" <?php echo $seleted4;?>  >أمين الصندوق</option>
                        <?}else{

                        }?>

                        <option value="5" <?php echo $seleted5;?> >عضو مجلس الإدارة</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم الجوال</label>
                    <input type="text" class=" form-control col-xs-6 no-padding"   name="phone_number" value="<?php echo $result['telephone'];  ?>" required="required">

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
    <?php echo form_open_multipart('dashboard/addmembers',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="inner-content">

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>الإسم</label>
                    <input type="text" name="name" class=" form-control col-xs-6 no-padding"  required="required" >
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>المنصب الوظيفي</label>
                    <?php
                    $ra2es=0;
                    $na2eb=0;
                    $amen=0;
                    $amen_box=0;
                    if($checked){
                        foreach($checked as $che){
                            //var_dump($che->job_title_fk);
                            if($che->job_title_fk == '1'){
                                $ra2es=1;
                            }elseif($che->job_title_fk == '2'){
                                $na2eb=2;
                            }elseif($che->job_title_fk == '3'){
                                $amen=3;
                            }elseif($che->job_title_fk == '4'){
                                $amen_box=4;
                            }else{
                                $ra2es=0;
                                $na2eb=0;
                                $amen=0;
                                $amen_box=0;
                            }
                        }
                    }else{

                    }
                    ?>
                    <select class="choose-date selectpicker form-control" id="job_title_fk"  name="job_title_fk"  data-show-subtext="true" data-live-search="true">
                        <option value="">إختر المنصب الوظيفي</option>
                        <?php if($ra2es == 0){?>
                            <option value="1">رئيس مجلس الإدارة</option>
                        <?}else{

                        }?>
                        <?php if($na2eb == 0){?>
                            <option value="2">نائب رئيس مجلس الإدارة</option>
                        <?}else{

                        }?>

                        <?php if($amen == 0){?>
                            <option value="3">الأمين العام</option>
                        <?}else{

                        }?>


                        <?php if($amen_box == 0){?>
                            <option value="4">أمين الصندوق</option>
                        <?}else{

                        }?>

                        <option value="5">عضو مجلس الإدارة</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم الجوال</label>
                    <input type="text" class=" form-control col-xs-6 no-padding"   name="phone_number" >

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
                            <th>إسم العضو</th>
                            <th>لمسمى الوظيفي</th>
                            <th>حالة العضو</th>
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
                            if($record->job_title_fk == 1){
                                $job_title_fk="رئيس مجلس الإدارة";
                            }elseif($record->job_title_fk == 2){
                                $job_title_fk="نائب رئيس مجلس الإدارة";
                            }elseif($record->job_title_fk == 3){
                                $job_title_fk="الأمين العام";
                            }elseif($record->job_title_fk == 4){
                                $job_title_fk="أمين الصندوق";
                            }elseif($record->job_title_fk == 5){
                                $job_title_fk="عضو مجلس الإدارة";
                            }

                            ?>
                            <tr>
                                <td><?php echo $x?></td>
                                <td><?php echo $record->name?></td>
                                <td><?php echo $job_title_fk ?></td>
                                <td>
                                    <a href="<?php echo base_url().'dashboard/suspendMembers/'.$record->id.'/'.$class?>" class="btn btn-<?php echo $class ?> btn-xs"><?php echo $title ?> </a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url().'dashboard/updateMembers/'.$record->id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                                    <a  href="<?php echo base_url().'dashboard/deleteMembers/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
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

