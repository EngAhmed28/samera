<div class="clearfix"></div>


<?php if(isset($researcher)&&$researcher!=null){?>


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
                        <th  class="">إسم الباحث</th>
                        <th  class="">عدد الأبحاث</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $serial = 0; ?>
                    <?php foreach($researcher as $record){

                        $serial++;


                        ?>
                        <tr>
                            <td data-title="#"><span class="badge"><?php echo $serial?></span></td>
                            <td ><?php echo $record->name?></td>

                            <td ><?php echo $record->cc?></td>
                        </tr>



                    <?php }?>

                    </tbody>
                </table>
            </div>
            
        </div>

    </div>
</div>

<?php  }
else
    echo '<br/><br/><div class="alert alert-info">الباحثين لديك لم يقم أي منهم بعمل بحث ميداني</div>';
?>
