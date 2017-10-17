<div class="inner-tabs">
    <ul class="list-unstyled">
        <?php  foreach ($this->groups as $row){?>
            <li class="red"><a href="<?php echo base_url().$row->page_link ;?>" >
                    <?php echo  $row->page_title?></a></li>
        <?php  } ?>
    </ul>
</div>