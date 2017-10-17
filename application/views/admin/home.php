<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php if(isset($title)){echo $title ;}else{echo "جمعية سميراء";}?></title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="<?php if(isset($metakeyword)){echo $metakeyword;}else{echo "جمعية سميراء";}?>" name="keywords"/>
    <meta content="<?php if(isset($metadiscription)){ echo $metadiscription;}else{echo "جمعية سميراء";}?>" name="description"/>
    <meta content="<?php if(isset($title)){ echo $title;}else{echo "جمعية سميراء";}?>" name="author"/>

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owl.carousel.css" >
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/owl.theme.css" >
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">


    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/table.css">

</head>

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
<!-- start bottom button -->
<div class="bottom-button">
    <a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
</div>




<div class="top-navbar">
    <div class="container">
        <div class="col-sm-6">
            <a href="index.html" class="logo">
                <img src="<?php echo base_url()?>asisst/admin_asset/img/logo.png">
                <h4 class="name-of-gameia">الجمعية الخيرية بمحافظة سميراء </h4>
                <span>منطقة حائل - محافظة سميراء </span>
            </a>
        </div>
        <div class="col-sm-6">
            <div class="widgetButtons">
                <div class="bb">
                    <a href="<?php echo base_url().'Login/home';?>" class="tipb" title="" data-original-title="Home">
                        <span class="ibw-home"></span>
                    </a>
                </div>
                <div class="bb">
                    <a href="<?php echo  base_url()."Login/mian_group/10"?>" class="tipb" title="" data-original-title="Messages">
                        <span class="ibw-message"></span>
                    </a>
                    <div class="caption red"><?php echo $this->message?></div>
                </div>

                <div class="bb">
                    <a href="<?php echo base_url()."Login/logout"?>" class="tipb" title="" data-original-title="Close">
                        <span class="ibw-close"></span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


<section class="main">
    <div class="container">

<?php if(isset($main_groups) && $main_groups!=null ){
       foreach ($main_groups as $row){?>
           <div class="col-md-3 col-sm-4 ">
               <div class="box">
                   <a href="<?php echo  base_url()."Login/mian_group/".$row->group_id?>">
                       <img src="<?php echo base_url()."asisst/admin_asset/main_img/".$row->group_icon_code?>" alt="" class="center-block">
                       <h5 class="text-center"> <?php echo  $row->group_title?>   </h5>
                   </a>
               </div>
           </div>
<?php }   }?>



<?php ?>



    </div>
</section>














<script type="text/javascript" src="<?php echo base_url()?>asisst/admin_asset/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/custom.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/js/wow.min.js"></script>



<script src="js/tables/jquery.dataTables.min.js"></script>
<script src="js/tables/dataTables.buttons.min.js"></script>
<script src="js/tables/buttons.print.min.js"></script>
<script src="js/tables/buttons.colVis.min.js"></script>
<script src="js/tables/plugin.js"></script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker();
    });
</script>


<script>
    new WOW().init();
</script>


</body>
</html>
