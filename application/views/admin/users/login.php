<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>جمعية </title>

    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/bootstrap-arabic-theme.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/bootstrap-arabic.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/animate.css">
    <link href="<?php echo base_url()?>asisst/admin_asset/login/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo base_url()?>asisst/admin_asset/login/css/owl.theme.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>asisst/admin_asset/login/css/responsive.css">
</head>

<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">

<header>
    <div class="top-menu">
        <div class="social col-xs-12 col-sm-6">
            <div class="social-media">
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/facebook.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/google-plus.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/instagram.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/linkedin.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/rss.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/twitter.png"></a>
                <a href="#"><img src="<?php echo base_url()?>asisst/admin_asset/login/img/social/youtube.png"></a>
            </div>

        </div>
        <div class="col-xs-6 col-sm-3 text-center hidden-xs">
            <div id="flag">
                <img src="<?php echo base_url()?>asisst/admin_asset/login/img/logo.png" alt="">
            </div>


        </div>


        <div class="date col-xs-6 col-sm-3 hidden-xs">
            <div class="col-xs-6">
                <script type='text/javascript'>
                    <!--
                    var months = ['يناير', 'فبراير', 'مارس', 'أبريل', 'مايو', 'يونيو', 'يوليو', 'أغسطس', 'سبتمبر', 'أكتوبر', 'نوفمبر', 'ديسمبر'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(day + " " + months[month] + " " + year);
                    //-->

                </script>
            </div>
            <div class="col-xs-6">

                <div id="clock"></div>
                <script type="text/javascript">
                    <!--
                    function showTime() {
                        var a_p = "";
                        var today = new Date();
                        var curr_hour = today.getHours();
                        var curr_minute = today.getMinutes();
                        var curr_second = today.getSeconds();
                        if (curr_hour < 12) {
                            a_p = "صباحاَ";
                        } else {
                            a_p = "مساءَ";
                        }
                        if (curr_hour == 0) {
                            curr_hour = 12;
                        }
                        if (curr_hour > 12) {
                            curr_hour = curr_hour - 12;
                        }
                        curr_hour = checkTime(curr_hour);
                        curr_minute = checkTime(curr_minute);
                        curr_second = checkTime(curr_second);
                        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                    }

                    function checkTime(i) {
                        if (i < 10) {
                            i = "0" + i;
                        }
                        return i;
                    }
                    setInterval(showTime, 500);
                    //-->

                </script>

            </div>
        </div>
    </div>
</header>


<div class="r-login">
    <img src="<?php echo base_url()?>asisst/admin_asset/login/img/login/3.jpg" alt="" class="r-log-back">
    <div class="col-xs-12 ">
        <div class="col-sm-5 r-log-pad ">
            <div class="col-xs-12 r-form-log">
                <?php if(isset($response)):?>
                <!------ error login ---->
                <h4 class="text-center r-error"> <span class="r-span-error"> <i class="fa fa-times-circle" aria-hidden="true"></i></span>خطأ في أدخال البيانات </h4>
                <!------ end error login ---->
                <?php endif?>

                <?php echo form_open_multipart('login/check_login',array('role'=>'form'))?>
                <h3 class="text-center">
                    <span><i class="fa fa-key" aria-hidden="true"></i></span> تسجيل دخول </h3>
                <div class="form-group center-block">
                    <input name="user_name" type="text" id="username" class="form-control" placeholder="أسم المستخدم">
                </div>
                <div class="form-group center-block">
                    <input name="user_pass" type="password" id="password"  class="form-control" placeholder="كلمة المرور">
                </div>
                <div class="col-xs-12 r-button">
                    <div class="col-xs-6">
                       <input class="btn center-block" name="login" type="submit" value="دخول" />
                  <!--      <button class="btn center-block" name="login" type="submit" ><a href="">    دخول </a>  </button>
                   --> </div>
                    <div class="col-xs-6">
                      <button class="btn center-block"> <a href="#">تسجيل</a> </button>
                   </div>
                </div>
                <?php echo form_close()?>
            </div>
        </div>
        <div class="col-sm-7">

        </div>
    </div>

</div>






<!--footer-->
<!--section id="footer">
    <div class="footer_b col-xs-12">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom">
                        <p class="text-block"> ©جميع الحقوق محفوظة لدى جمعية <span>التنمية ... </span></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_mid pull-right">
                        <ul class="social-contact list-inline">
                            <li> <a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="#"><i class="fa fa-rss"></i></a></li>
                            <li> <a href="#"><i class="fa fa-google-plus"></i> </a></li>
                            <li>
                                <a href="#"> <i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"> <i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section-->



<script src="<?php echo base_url()?>asisst/admin_asset/login/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/login/js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/login/js/jquery.easing.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/login/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/login/js/scroll.js"></script>
<script src="<?php echo base_url()?>asisst/admin_asset/login/js/custom.js"></script>

</body>

</html>
