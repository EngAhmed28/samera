
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>


    <?php if(isset($result)): ?>


    <?php echo form_open_multipart('dashboard/update_main_data/'.$result['id'],array('class'=>"form-horizontal",'role'=>"form" ))?>
<div class="inner-content">
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم الجمعية</label>
                    <input type="text" name="name"  value="<?php echo $result['name']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
            <div class="layout">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text" name="address"  value="<?php echo $result['address']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخ التأسيس</label>
                    <input type="text" id="popupDatepicker" name="date_construct"  value="<?php echo $result['date_construct']; ?>"  class=" form-control col-xs-6 no-padding"  placeholder=" تاريخ التأسيس" required="required" />
                </div>
                <div class="form-group">
                    <label>اللوجو</label>
                    <input type="file" id="logo" name="logo" class=" form-control col-xs-6 no-padding" >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم التسجيل</label>
                    <input type="number" name="record_number"  value="<?php echo $result['record_number']; ?>" class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
            <div class="layout">
                <div class="form-group">
                    <label>اللوجو</label>
                    <img src="<?php echo base_url('uploads/images/'.$result['logo'].''); ?>" height="200px" width="200px">
                </div>
            </div>
        </div>



</div>
<div class="inner-content">
    <div class="col-md-4">
        <div class="layout">
            <div class="form-group">
                <label>أرقام الهاتف</label>
                <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class=" form-control col-xs-6 no-padding"  placeholder="   أقصى عدد 5" >
            </div>
        </div>

    </div>
    <div class="col-md-8 table-responsive" >
        <!--  view telephone  -->
        <?php
        $telephone=unserialize($result['tele_info']);
        if($telephone){?>
            <table  class="table table-bordered table-striped table-hover" style="width:500px">
                <tbody>
                <?php
                for($x = 0 ; $x < count($telephone) ; $x++){
                    if(count($telephone) > 0){
                        ?>
                        <tr>
                            <td><input type="number" name="phone_old<?php echo$x; ?>" class="form-control" style="width:300px;" value="<?php echo $telephone[$x];?>"  /></td>
                            <td><a  href="<?php echo base_url()?>dashboard/delete/tele_info/<?echo $result['id'];?>/<? echo $x;?>"  class="btn btn-danger btn-xs "> حذف<i class="fa fa-trash"></i></a></td>
                        </tr>

                    <? }} ?>
                </tbody>
            </table>
        <? }?>
    </div>
    <!--  view telephone  -->
    </div>


    <div class="col-md-4"></div>
    <div class="col-md-8 "  id="optionearea1">

       </div>

 <div class="inner-content">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control col-xs-6 no-padding" placeholder="   أقصى عدد 5" >
                    </div>
                </div>

            </div>
            <div class="col-md-8 table-responsive" >
                <!--  view email  -->
                <?php
                $email=unserialize($result['email_info']);
                if($email){?>
                    <table  class="table table-bordered table-striped table-hover" style="width:500px">
                        <tbody>
                        <?php
                        for($x = 0 ; $x < count($email) ; $x++){
                            if(count($email) > 0){
                                if (!empty($email[$x])):
                                    ?>
                                    <tr>
                                        <td><input type="email" name="email_old<?php echo$x; ?>" class="form-control" style="width:300px;" value="<?php echo $email[$x];?>"  /></td>
                                        <td><a  href="<?php echo base_url()?>dashboard/delete/email_info/<?echo $result['id'];?>/<? echo $x;?>"  class="btn btn-danger btn-xs "> حذف<i class="fa fa-trash"></i></a></td>
                                    </tr>

                                <?endif; }} ?>
                        </tbody>
                    </table>
                <? }?>
            </div>

            <!--  view email  -->
            <div class="col-md-4"></div>
            <div class="col-md-8 " id="optionearea3">

            </div>

        </div>

<div class="inner-content">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>أرقام التبرعات</label>
                        <input type="number" id="fax_info" name="fax_info" min="1" max="5" onkeyup="return lood($('#fax_info').val(),'#optionearea2','fax_info');" min="1" max="5" class="form-control col-xs-6 no-padding" placeholder="   أقصى عدد 5" >
                    </div>
                </div>

            </div>
            <div class="col-md-8 table-responsive" >
                <!--  view fax  -->
                <?php
                $fax=unserialize($result['donations_number']);
                if($fax){?>
                    <table  class="table table-bordered table-striped table-hover" style="width:500px">
                        <tbody>
                        <?php
                        for($x = 0 ; $x < count($fax) ; $x++){
                            if(count($fax) > 0){
                                if (!empty($fax[$x])):
                                    ?>
                                    <tr>
                                        <td><input type="text" name="fax_old<?php echo$x; ?>" class="form-control" style="width:300px;" value="<?php echo $fax[$x];?>"  /></td>
                                        <td><a  href="<?php echo base_url()?>dashboard/delete/donations_number/<?echo $result['id'];?>/<? echo $x;?>"  class="btn btn-danger btn-xs "> حذف<i class="fa fa-trash"></i></a></td>
                                    </tr>

                                <?endif; }} ?>
                        </tbody>
                    </table>
                <? }?>
            </div>
    <!--  view fax  -->
            </div>

        <div class="inner-content">
            <div class="col-md-4"></div>
            <div class="col-md-8" id="optionearea2">
            </div>


            <div class="col-md-5"></div>
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <input type="hidden" name="count_phone" value="<?php echo count($telephone) ?>" />
                        <input type="hidden" name="count_mail" value="<?php echo count($email) ?>" />
                        <input type="hidden" name="count_fax" value="<?php echo count($fax) ?>" />
                        <input type="submit"  style="width: 100px" name="update" value="حفظ" class="btn btn-primary" >
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>



<?php echo form_close()?>

<?php elseif(! $records): ?>
        <?php echo form_open_multipart('dashboard/add_main_data',array('class'=>"form-horizontal",'role'=>"form" ))?>
    <div class="inner-content">
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم الجمعية</label>
                    <input type="text" name="name"  class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
            <div class="layout">
                <div class="form-group">
                    <label>العنوان</label>
                    <input type="text" name="address"  class=" form-control col-xs-6 no-padding"  >
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخ التأسيس</label>
                    <input type="text" id="popupDatepicker" name="date_construct"    class=" form-control col-xs-6 no-padding"  placeholder=" تاريخ التأسيس" required="required" />
                </div>
                <div class="form-group">
                    <label>اللوجو</label>
                    <input type="file" id="logo" name="logo" class=" form-control col-xs-6 no-padding" >
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="layout " >
                <div class="form-group">
                    <label>رقم التسجيل</label>
                    <input type="number" name="record_number"   class=" form-control col-xs-6 no-padding"  >
                </div>

                <div class="form-group" style="height: 80px">
                </div>

            </div>

        </div>
       </div>
        <div class="inner-content" >
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>أرقام الهاتف</label>
                        <input type="number" id="tele_info"  name="tele_info" min="1" max="5" onkeyup="return lood($('#tele_info').val(),'#optionearea1','tele_info');" class=" form-control col-xs-6 no-padding"  placeholder="   أقصى عدد 5" >
                    </div>
                </div>

            </div>
            <div class="col-md-8" id="optionearea1" style="margin-left:10px">
            </div>
        </div>

        <div class="inner-content">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>البريد الإلكتروني</label>
                        <input type="number" id="email_info"  name="email_info" min="1" max="5" onkeyup="return lood($('#email_info').val(),'#optionearea3','email_info');" class="form-control col-xs-6 no-padding" placeholder="   أقصى عدد 5" >
                    </div>
                </div>

            </div>
            <div class="col-md-8" id="optionearea3"  style="margin-left: 10px">
            </div>
        </div>

        <div class="inner-content">
            <div class="col-md-4">
                <div class="layout">
                    <div class="form-group">
                        <label>أرقام التبرعات</label>
                        <input type="number" id="fax_info" name="fax_info" min="1" max="5" onkeyup="return lood($('#fax_info').val(),'#optionearea2','fax_info');" min="1" max="5" class="form-control col-xs-6 no-padding" placeholder="   أقصى عدد 5" >
                    </div>
                </div>

            </div>
            <div class="col-md-8" id="optionearea2"  style="margin-left: 10px">
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

    <?php echo form_close()?>

<?php else: ?>
        <div class="inner-content">
    <table id="no-more-tables" class="table table-bordered" role="table">
        <thead>
        <tr>
            <th  style="text-align: center">إسم الجمعية</th>
            <th  style="text-align: center">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($records as $record):?>
            <tr>
                <td data-title=""><?php echo word_limiter($record->name,10)?> </td>
                <td data-title="التحكم" class="text-center">
                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal"><i class="fa fa-list"></i> عرض </button>
                    <a href="<?php echo base_url().'dashboard/update_main_data/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
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
                    <table id="" class="table table-bordered table-hover table-striped" cellspacing="0"  style="">
                        <tr>
                            <td>إسم الجمعية </td>
                            <td><?php echo $record->name ?></td>
                        </tr>
                        <tr>
                            <td>اللوجو</td>
                            <td  style="width: 76%;"><img src="<?php echo base_url('uploads/images/'.$record->logo.''); ?>" width="15%"/></td>
                        </tr>
                        <tr>
                            <td>تاريخ التأسيس</td>
                            <td><?php echo $record->date_construct ?></td>
                        </tr>
                        <tr>
                            <td>رقم التسجيل</td>
                            <td  style="width: 76%;"><?php echo $record->record_number; ?></td>
                        </tr>
                        <tr>
                            <td><h5>ارقام الهاتف</h5></td>
                            <td>
                                <?php
                                $phones = unserialize($record->tele_info);
                                for($x = 0 ; $x < count($phones) ; $x++)
                                    echo '<h5>'.$phones[$x].'</h5>';
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td><h5>الايميلات</h5></td>
                            <td>
                                <?php
                                $emails = unserialize($record->email_info);
                                for($x = 0 ; $x < count($emails) ; $x++)
                                    echo '<h5>'.$emails[$x].'</h5>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><h5>ارقام التبرعات</h5></td>
                            <td>
                                <?php
                                $faxes = unserialize($record->donations_number);
                                for($x = 0 ; $x < count($faxes)  ;$x++)
                                    echo '<h5>'.$faxes[$x].'</h5>';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>العنوان</td>
                            <td><?php echo $record->address ?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<script>
    function lood(num,div,page){
        var cleer = '#' + page;
        if(num != 0)
        {
            var id = num;
            var dataString = 'num=' + id + '&page=' + page;
            $.ajax({
                type:'post',
                url: '<?php echo base_url() ?>/dashboard/add_main_data',
                data:dataString,
                dataType: 'html',
                cache:false,
                success: function(html){
                    $(div).html(html);
                }
            });

            return false;
        }
        else
        {
            $(cleer).val('');
            $(div).html('');
            return false;
        }
    }
</script>