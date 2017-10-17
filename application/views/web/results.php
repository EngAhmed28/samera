<section class="result">
    <div class="container">

        <div class="content">
            <?php if(!empty($records)): ?>
            <h4 class="heading">النتائج المتوقعة للجمعية</h4>
            <h5><strong>النتائج للجمعية </strong></h5>
            <div class="clearfix"></div>
            <ul >
                <?php  foreach($records as $record):?>
                <li dir="RTL"><?php echo $record->content;?></li>
               <?php      endforeach ;?>
            </ul>
            <?php endif;?>
        </div>
    </div>
</section>