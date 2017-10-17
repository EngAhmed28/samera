<?php    $this->load->view('admin/requires/header');?>


    <div class="col-md-1 col-sm-2 hidden-print">
        <div class="sidebar text-center">


            <?php if(isset($main_groups) && $main_groups!=null ){
                foreach ($main_groups as $row){?>
                    <a class="tooltip" href="<?php echo  base_url()."Login/mian_group/".$row->group_id?>">
                        <img src="<?php echo base_url()."asisst/admin_asset/main_img/".$row->group_icon_code?>" alt="" class="center-block" width="40" height="40">
                        <span class="tooltiptext"><?php echo  $row->group_title?></span>
                    </a>
                <?php }   }?>


        </div>
    </div>
    <!-- end sidebar-->
    <div class="col-md-11 col-sm-10">

    <div class="inner-tabs">
        <ul class="list-unstyled">
            <?php  foreach ($groups as $row){?>
                <li class="red"><a href="<?php echo base_url().$row->page_link ;?>" >
                        <?php echo  $row->page_title?></a></li>
     <?php  } ?>
        </ul>
    </div>

<?php    $this->load->view('admin/requires/footer');?>