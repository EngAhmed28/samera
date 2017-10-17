<!DOCTYPE html>
<html lang="en">

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



<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/jquery.datetimepicker.css">

<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/tables/table.css">


<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/style.css">
<link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/css/responsive.css">

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">
<!-- start bottom button -->
<div class="bottom-button">
    <a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
</div>




<div class="top-navbar hidden-print">
    <div class="container">
        <div class="col-sm-6">
            <a href="<?php echo base_url().'Login/home';?>" class="logo">
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
                    <a href="#" class="tipb" title="" data-original-title="Messages">
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

<section id="inner">
    <div class="col-xs-12">
        <!-- start sidebar-->