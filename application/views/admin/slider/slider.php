<div class="clearfix"></div>
<div class="">
<?php if(isset($result)):?>
    <!-- <form class="form-horizontal">-->
    <?php echo form_open_multipart('dashboard/updateslider/'.$result['id'],array('role'=>"form" ))?>


        <div class="inner-content">
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>العنوان</label>
                        <input type="text" id="name"  value="<?php echo $result['title']; ?>" name="title" class="form-control  " placeholder="العنوان" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>المحتوى</label>
                        <input type="text" id="content"  value="<?php echo $result['content']; ?>" name="content" class="form-control  " placeholder="المحتوى" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>الصورة</label>
                        <input type="file" name="img" class="form-control  " placeholder="الصورة" >
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <div class="imgContent">
                            <img src="<?php echo base_url('uploads/thumbs/'.$result['img'])?>" alt="الصورة " class="img-rounded" width="150" height="150">
                            <span class="help-block">لعدم تغيير الصورة  لا تختار اى شىء </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <div class="col-xs-10 col-xs-pull-2">
                <input type="submit" name="update_slider" value="حفظ" class="btn btn-primary" >
            </div>
        </div>
        </div>

    <!-- </form>-->
    <!-- </form>-->
    <?php echo form_close()?>
<?php else: ?>
    <?php echo form_open_multipart('dashboard/addslider',array('role'=>"form" ))?>


        <div class="inner-content">
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>العنوان</label>
                        <input type="text" id="title"  name="title" class="form-control  " placeholder="العنوان" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>المحتوى</label>
                        <input type="text" id="content"  name="content" class="form-control  " placeholder="المحتوى" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="layout">
                    <div class="form-group ">
                        <label>الصورة</label>
                        <input type="file" name="img" class="form-control  " placeholder="الصورة" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
            <div class="col-xs-10 col-xs-pull-2">
                <button type="reset" class="btn btn-default">إبدأ من جديد ؟</button>
                <input type="submit"  name="add_slider" value="حفظ" class="btn btn-primary" >
            </div>
        </div>
        </div>

    <!-- </form>-->
    <?php echo form_close()?>
<?php endif?>
</div>
<?php if(isset($records)&&$records!=null):?>
    <table id="example" class=" display table table-bordered table-striped table-hover">
        <thead>
        <tr class="info">
            <th width="2%">#</th>
            <th  class=" ">العنوان</th>
            <th  class=" ">المحتوى</th>
            <th width="20%" class=" ">التحكم</th>
        </tr>
        </thead>
        <tbody>
        <?php $x = 0; ?>
        <?php foreach($records as $record):?>
            <?php
            $x++;
            ?>
            <tr>
                <td data-title="#"><span class="badge"><?php echo $x?></span></td>
                <td data-title=""><?php echo $record->title?> </td>
                <td data-title=""><?php echo $record->content?> </td>
                <td data-title="التحكم" class="text-center">
                    <a href="<?php echo base_url().'dashboard/updateslider/'.$record->id?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> تعديل</a>
                    <a  href="<?php echo base_url().'dashboard/deleteslider/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> حذف</a>
                </td>
            </tr>
        <?php endforeach ;?>
        </tbody>
    </table>
    <div class="col-xs-12 mt30 text-center">
        <?php echo  $links?>
    </div>
<?php endif;?>