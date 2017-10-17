

<section class="members">
    <div class="container">
        <h4 class="heading">أعضاء مجلس الإدارة</h4>
        <div class="table-responsive">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>اسم العضو</th>
                    <th>المسمي الوظيفي</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($records)):
                    foreach ($records as $record):

                        if($record->job_title_fk == 1 ){
                            $job_name="رئيس مجلس الإدارة";
                        }elseif($record->job_title_fk == 2 ){
                            $job_name="النائب";
                        }elseif($record->job_title_fk == 3 ){
                            $job_name="الامين العام";
                        }elseif($record->job_title_fk == 4 ){
                            $job_name="أمين الصندوق";
                        }elseif($record->job_title_fk == 5 ){
                            $job_name="عضو";
                        }

                        ?>
                <tr>
                    <td><?php echo $record->name;?></td>
                    <td><?php echo $job_name;?></td>
                </tr>
                <?php  endforeach;endif;?>
                </tbody>
            </table>
        </div>

    </div>
</section>