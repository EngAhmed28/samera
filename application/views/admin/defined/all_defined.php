
<div class="clearfix"></div>
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
$arr_type=array("","حالة السكن","نوع السكن","الحالة الصحية","الحالة الإجتماعية","الممتلكات","الحالة المعيشة","مكان السكن","نوع المستفيد");
?>
<div class="inner-content">
    <?php if(isset($result) && $result!=null ):?>
    <?php echo form_open_multipart('dashboard/update_all_defined/'.$result['id'],array('role'=>"form" ))?>
    <div class="row" >
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label><?php echo $arr_type[$result['type']];?></label>
                <input type="text" id=""  value="<?php echo $result['title']; ?>" name="define" class="form-control"  required="required" >
            </div>

        </div>




    </div>
    <div class="col-md-4"></div>
    <div class="col-md-4"></div>
    </div>

   <div class="row" >
       <div class="col-md-5"></div>
       <div class="col-md-3">
           <input type="submit" name="update_All_defined" value="تعديل" class="btn btn-primary" >
       </div>
       <div class="col-md-4"></div>

   </div>
    <?php echo form_close()?>
    <?php else: ?>
    <?php echo form_open_multipart('dashboard/add_all_defined',array('role'=>"form" ))?>
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>إختر نوع التعريف</label>
                <select name="type" class="choose-date selectpicker form-control"  data-show-subtext="true" data-live-search="true">
                    <?for($a=1;$a<sizeof($arr_type);$a++ ):?>
                        <option value="<?echo $a?> "><?echo $arr_type[$a]?>  </option>
                    <?endfor?>
                </select>
            </div>

        </div>




    </div>
    <div class="col-md-4">
        <div class="layout">

            <div class="form-group">
                <label>التعريف</label>
                <input type="text" name="define" class="form-control col-xs-6 no-padding" required="required">

            </div>
        </div>




    </div>
    <div class="col-md-4"></div>
    <div class="col-md-5"></div>
    <div class="col-md-3">
        <input type="submit"  name="add_all_defined" value="حفظ" class="btn btn-primary" >

    </div>
    <div class="col-md-4"></div>
        <?php echo form_close()?>
    <?php endif?>

</div>
<?php if(isset($array_tables)&&$array_tables!=null):?>
<div class="col-md-12">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">جدول النتائج</h3>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table id="sample_1" class="table table-bordered table-hover table-striped" cellspacing="0"  width="99%" style="margin-right: 6px; direction:rtl;">
                    <thead>
                    <tr>
                        <th width="">#</th>
                        <th  width="">النوع</th>
                        <th width="">القوائم المنسدلة</th>
                        <th width="">التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $v=1;
                    foreach($array_tables as  $key=>$value):
                        ?>
                        <tr>
                        <td rowspan="<?php echo sizeof($array_tables[$key])?>"><?php echo $v;$v++ ?></td>
                        <td rowspan="<?php echo sizeof($array_tables[$key])?>" data-toggle="modal" data-target="#myModal"><?php echo $arr_type[$key]  ;?></td>
                        <?php foreach($array_tables[$key] as  $keys=>$value):
// for($mycount = 0 ; $mycount < sizeof($array_tables[$key]) ; $mycount++): ?>
                        <?php  if (sizeof($array_tables[$key])!= 0):?>
                            <td> <?php echo $array_tables[$key][$keys] ?></td>
                            <td>
                                <a href="<?php echo base_url().'dashboard/update_all_defined/'.$keys?>" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"></i> تعديل</a>
                                <a  href="<?php echo base_url().'dashboard/delete_all_defined/'.$keys?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i> حذف</a>
                            </td>
                            </tr>
                        <?php  endif; ?>
                        <?php
                    endforeach;
                        //endfor;?>
                    <?php  endforeach ; ?>
                    </tbody></table>


            </div>





        </div>

    </div>
</div>
<?php endif; ?>
