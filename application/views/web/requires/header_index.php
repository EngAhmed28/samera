<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<title><?php if(isset($title)){echo $title ;}else{echo "جمعية سميراء";}?></title>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="<?php if(isset($metakeyword)){echo $metakeyword;}else{echo "جمعية سميراء";}?>" name="keywords"/>
<meta content="<?php if(isset($metadiscription)){ echo $metadiscription;}else{echo "جمعية سميراء";}?>" name="description"/>
<meta content="<?php if(isset($title)){ echo $title;}else{echo "جمعية سميراء";}?>" name="author"/>

	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>bootstrap-arabic-theme.min.css" />
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>bootstrap-arabic.min.css" />
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>animate.css">
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>owl.carousel.css" >
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>owl.theme.css" >
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>jquery.lightbox-0.5.css">
	<!--<link href="http://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.carousel.css" rel="stylesheet">
    <link href="http://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.theme.css" rel="stylesheet">-->
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>style.css">
	<link rel="stylesheet" href="<?php echo base_url().'asisst/web_asset/css/'  ?>responsive.css">
</head>
<body id="page-top" data-spy="scroll" data-target="" class="flexcroll">

<header>

	<div class="top-menu">
		<div class="social col-xs-12 col-sm-6">
			<!--<ul>
                <li class=""><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                <li class=""><a href=""> <i class="fa fa-twitter"></i> </a></li>
                <li class=""><a href=""> <i class="fa fa-google-plus"></i> </a></li>
                <li class=""><a href=""> <i class="fa fa-instagram"></i> </a></li>
                <li class=""><a href=""> <i class="fa fa-rss"></i> </a></li>
            </ul>-->
			<div class="social-media">
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/facebook.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/google-plus.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/instagram.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/linkedin.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/rss.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/twitter.png"></a>
				<a href="#"><img src="<?php echo base_url().'asisst/web_asset/img/'  ?>social/youtube.png"></a>
			</div>


		</div>
		<div class="col-xs-6 col-sm-3 text-center hidden-xs">
			<div id="flag" >
				<img src="<?php echo base_url().'asisst/web_asset/img/'  ?>logo.png" alt="" >
			</div>


		</div>


		<div class="date col-xs-6 col-sm-6 hidden-xs">
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
						document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
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

	<!--
            <div class="bg-logo">
                <div class="container">
                <div class="col-lg-5 col-sm-6 col-xs-12">
                    <img src="<?php echo base_url().'asisst/web_asset/img/'  ?>logo.png" alt="">
                </div>
                <div class="col-lg-7 col-sm-6 col-xs-12">
                <ul class="list-unstyled">
                <li><a href="#" class="btn btn-lg account" >حسابات البنوك</a></li>
                <li><a href="#" class="btn btn-lg complain">صندوق الشكاوى</a></li>
                </ul>
                </div>

                </div>
            </div>
        -->

</header>


<!-- start slider -->
<section id="slider-menu">
	<div class="main-menu">
		<div class="container">
			<nav class="navbar navbar-default animatable2 zoomIn">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
								data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand visible-xs" href="#">
							<img src="<?php echo base_url().'asisst/web_asset/img/'  ?>logo.png" alt=""  >
						</a>



					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav ">
							<li class="active"><a href="<?php echo base_url()."Web";?>"> الرئيسيه <span class="sr-only">(current)</span></a></li>

							<li class="dropdown">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">عن جمعية سميراء <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li>
										<a href="<?php echo base_url().'web/about';?>">عن الجمعية</a>
									</li>
									<li>
										<a href="<?php echo base_url().'web/members';?>">أعضاء مجلس الإدراة</a>
									</li>
									<li>
							
                                       	<a href="<?php echo base_url().'web/goals';?>">أهداف الجمعية</a>
                                 	</li>
									<li>
												<a href="<?php echo base_url().'web/resala';?>">النتائج المتوقعة للجمعية</a> 
									</li>

								</ul>

							</li>
							<li class="dropdown">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">كلمات <span class="caret"></span></a>
								<ul class="dropdown-menu">
								  <li>
                                        <a href="<?php echo base_url().'web/manager_word' ?>">كلمة رئيس مجلس الإدارة</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'web/ameen_word' ?>">كلمة الأمين العام</a>
                                    </li>

								</ul>

							</li>
							<li class="dropdown">

								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">المركز الإعلامى للجمعية <span class="caret"></span></a>
								<ul class="dropdown-menu">
								<li>
                                        <a href="<?php echo base_url().'web/news/0' ?>">أخبار الجمعية</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'web/news/1' ?>">الجمعية فى الصحافة</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url().'web/img' ?>">مكتبة الصور</a>
                                    </li>


								</ul>

							</li>
							<li><a href=""<?php echo base_url().'web/Donors';?>">الجهات الداعمة</a></li>
							<li><a href="<?php echo base_url()."web/add_person";?>">برنامج المستفيدين</a></li>
							<li><a href="<?php echo base_url()."web/search_id"?>">طباعة نماذج المستفيدين</a></li>
                            <li><a href="<?php echo base_url()."web/contact"?>">إتصل بنا</a></li>

						</ul>


					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</div>
	</div>





	<div class="slider" >
		<div id="carousel-example-generic" class="carousel slide " data-ride="carousel" data-wrap="true">
			<!-- Indicators -->
			<ol class="carousel-indicators">
            <?php
            if(isset($this->imgs) && $this->imgs != null)
                for($x = 0 ; $x < count($this->imgs) ; $x++)
                {
                    if($x == 0)
                        $active = 'active';
                    else
                        $active = '';
                    echo '<li data-target="#carousel-example-generic" data-slide-to="'.$x.'" '.$active.'></li>';
                }
            ?>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
            <?php
            if(isset($this->imgs) && $this->imgs != null)
                for($x = 0 ; $x < count($this->imgs) ; $x++)
                {
                    if($x == 0)
                        $active = 'active';
                    else
                        $active = 'animatable zoomIn';
                    echo '<div class="item '.$active.'">
            					<img src="'.base_url().'uploads/images/'.$this->imgs[$x]->img.'" alt="...">
            					<div class="carousel-caption animatable3 flipInX">
            						<h2 class="kids">'.$this->imgs[$x]->title.'</h2>
            
            						<div class="clearfix"></div>
            						<h2 class="aid"> '.$this->imgs[$x]->content.' </h2>
            					</div>
            				</div>';
                }
            ?>
			</div>
		</div>
	</div>
</section>
