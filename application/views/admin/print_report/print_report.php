
<div class="clearfix"></div>



<div class="inner-content">

    <?php echo form_open_multipart('dashboard/print_report',array('class'=>"form-horizontal",'role'=>"form" ))?>

    <div class="col-md-4">
        <div class="layout">
            <div class="form-group ">
                <label>الفئة</label>
                <select name="benefit" id="benefit" class="choose-date selectpicker form-control"  data-show-subtext="true" data-live-search="true" required="required"/>
                    <option value="">--قم بإختيار الفئة--</option>
                    <?php
                    if((isset($benefit)&&$benefit!=null)){
                        echo '<option value="0">الكل</option>';
                        for($x = 0 ;$x < count($benefit) ; $x++)
                            echo '<option value="'.$benefit[$x]->id.'">'.$benefit[$x]->title.'</option>';
                    }
                    ?>
                </select>
            </div>
        </div>




    </div>
    <div class="col-md-4">
        <div class="layout">

            <div class="form-group">
                <label>عنوان التقرير</label>
                <input type="text" id="title" name="title" placeholder="أكتب عنوان التقرير" class="form-control col-xs-6 no-padding" />
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>



    <div class="row" >
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <input type="submit" name="print" value="طباعة" class="btn btn-success" >
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php echo form_close()?>
</div>