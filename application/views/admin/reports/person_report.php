<div class="clearfix"></div>

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
                        <th width="2%">#</th>
                        <th  class="">اسم المستفيد</th>
                        <th  class="">رقم الجوال</th>
                        <th  class="">رقم الهوية</th>
                    </tr>
                    </thead>
                    <?php $serial = 0; ?>
                    <?php foreach($records as $record):?>
                    <?php
                    $serial++;
                    ?>
                    <tbody>

                    <tr>
                        <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                        <td ><?php echo $record->name?></td>
                        <td ><?php echo $record->mobile?></td>
                        <td ><?php echo $record->card_num?></td>


                    </tr>
                    <?php endforeach ;?>


                    </tbody>
                </table>
            </div>





        </div>

    </div>
</div>
<?php  endif;?>
