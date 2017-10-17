
        <div class="col-md-1 col-sm-2 hidden-print">
            <div class="sidebar text-center">


                <?php if(isset($this->main_groups) && $this->main_groups!=null ){
                foreach ($this->main_groups as $row){?>
                <a class="tooltip" href="<?php echo  base_url()."Login/mian_group/".$row->group_id?>">
                    <img src="<?php echo base_url()."asisst/admin_asset/main_img/".$row->group_icon_code?>" alt="" class="center-block" width="40" height="40">
                    <span class="tooltiptext"><?php echo  $row->group_title?></span>
                </a>
                <?php }   }?>


            </div>
        </div>
        <!-- end sidebar-->
        <div class="col-md-11 col-sm-10">