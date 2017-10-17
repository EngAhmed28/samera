


<section class="partners">
    <div class="container">
        <h4 class="heading">الجهات الداعمه والمانحه</h4>
        <hr>
        <?php if(!empty($records)):
            foreach ($records as $record):?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
            <img src="<?php echo base_url().'uploads/images/'.$record->img;?>">
        </div>
        <?php endforeach; endif;?>
    </div>
</section>