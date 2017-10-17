<section class="words">
    <div class="container">
        <div class="">

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">كلمة رئيس مجلس الإدارة</h3>
                </div>
                <div class="panel-body">
<?php   if(isset($records) && $records !=null){ foreach($records as $record):  ?>
    <?php  echo  $record->content ;?>
<?php  endforeach ; } ?>
</div>
            </div>
        </div>
    </div>
</section>