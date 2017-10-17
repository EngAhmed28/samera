
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
                        <th  class="text-right">اسم الموظف</th>
                        <th  class="text-right">رقم الجوال</th>
                        <th  class="text-right">الوظيفة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $serial = 0; ?>
                    <?php foreach($records as $record):?>
                        <?php
                        $serial++;
                        ?>
                        <tr>
                            <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                            <td ><?php echo $record->name?></td>
                            <td ><?php echo $record->telephone?></td>
                            <td >

                                <?php
                                if($record->job_title_fk==1){
                                    echo 'باحث';
                                }else{

                                    echo 'موظف';
                                }

                                ?>

                            </td>


                        </tr>
                    <?php endforeach ;?>
                    </tbody>
                </table>
            </div>





        </div>

    </div>
</div>



<?php  endif;?>