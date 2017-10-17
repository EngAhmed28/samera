




<section class="gallery">
    <div class="container">

        <div class="content">
            <?php
            $k = 0;
            foreach($records as $record):?>
            <?php
            $photo=unserialize($record->img);
            $val =count($photo);
            ?>

            <div class="col-md-4 col-sm-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">اسم الألبوم</h3>
                    </div>
                    <div class="panel-body">
                        <a href="<?php echo base_url('').'web/img_details/'.$record->id?>"><img src="<?php echo base_url('uploads/images/'.$photo[0])?>"></a>
                    </div>
                    <div class="panel-footer">عدد الصور (<?php   echo $val ?>)</div>

                </div>
            </div>
                <?php
                $k++;
            endforeach ;
            ?>
        </div>
    </div>
</section>


