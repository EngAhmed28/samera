
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
                        <th  class="">اسم العضو</th>
                        <th  class="">المسمى الوظيفي</th>
                        <th  class="">رقم الجوال</th>

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
                            <td >


                                <?php
                                if($record->job_title_fk==1){
                                    echo 'رئيس المجلس';
                                }elseif($record->job_title_fk==2){

                                    echo 'النائب';
                                }elseif($record->job_title_fk==3){

                                    echo 'الأمين العام';
                                }elseif($record->job_title_fk==4){

                                    echo 'امين الصندوق';
                                }else{
                                    echo 'عضو';

                                }

                                ?>

                            </td>
                            <td ><?php echo $record->telephone?></td>


                        </tr>
                    <?php endforeach ;?>

                    </tbody>
                </table>
            </div>





        </div>

    </div>
</div>



<?php  endif;?>