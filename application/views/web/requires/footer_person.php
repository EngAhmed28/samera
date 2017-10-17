
<!--footer-->
<section id="footer">
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="menu_head">جمعية سميراء الخيرية</h3>
					<div class="footer_menu">
						<ul>
							<li><a href="<?php echo base_url('web/');?>">الرئيسية </a></li>
							<li><a href="<?php echo base_url('web/about');?>">عن الجمعية</a></li>
							<li><a href="<?php echo base_url('web/members');?>">أعضاء مجلس الإدراة</a></li>
							<li><a href="<?php echo base_url('web/resala');?>">النتائج المتوقعة للجمعية</a></li>
							<li><a href="<?php echo base_url('web/contact');?>">إتصل بنا</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="menu_head">اطلع علينا</h3>
					<div class="footer_menu">
						<ul>
							<li><a href="<?php echo base_url().'web/manager_word' ?>">كلمة رئيس مجلس الإدارة</a></li>
							<li><a href="<?php echo base_url().'web/ameen_word' ?>">كلمة الأمين العام</a></li>
							<li><a href="<?php echo base_url().'web/news/0' ?>">أخبار الجمعية</a></li>
							<li><a href="<?php echo base_url().'web/news/1' ?>">الجمعية فى الصحافة</a></li>
							<li><a href="<?php echo base_url().'web/img' ?>">مكتبة الصور</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="menu_head">اتصل بنا</h3>
					<div class="footer_menu_contact">
						<ul>
							<li> <i class="fa fa-home"></i>
								<span>12 شارع الميرغنى, الدور العاشر </span></li>
							<li><i class="fa fa-globe"></i>
								<span> +880-12345678</span></li>
							<li><i class="fa fa-phone"></i>
								<span> info@mail.com</span></li>
							<li><i class="fa fa-map-marker"></i>
								<span> www.web.com</span></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="menu_head">دليلك نحو الخير</h3>
					<div class="footer_menu tags">
						<a href="#"> بناء مساجد</a>
						<a href="#"> مشروعات مياة</a>
						<a href="#"> مشروعات تعليمية</a>
						<a href="#"> مشروعات طبية</a>
						<a href="#"> كفالة يتيم</a>
						<a href="#"> اغاثة متضررين</a>
						<a href="#"> اطعام مسكين</a>
						<a href="#"> افطار صائم</a>
						<a href="#"> كسوة شتاء</a>
						<a href="#"> تجهيز عروس</a>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div class="footer_b">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="footer_bottom">
						<p class="text-block"> ©جميع الحقوق محفوظة لدى جمعية  <span>التنمية ... </span></p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-12">
					<div class="footer_mid pull-right">
						<ul class="social-contact list-inline">
							<li> <a href="#"><i class="fa fa-facebook"></i></a></li>
							<li> <a href="#"><i class="fa fa-twitter"></i></a></li>
							<li> <a href="#"><i class="fa fa-rss"></i></a></li>
							<li> <a href="#"><i class="fa fa-google-plus"></i> </a></li>
							<li><a href="#"> <i class="fa fa-linkedin"></i></a></li>
							<li><a href="#"> <i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>





<!-- start bottom button -->
<div class="bottom-button">
	<a id="to-top" class="btn btn-lg btn-inverse page-scroll" href="#page-top"> <span class="sr-only">Toggle to Top Navigation</span> <i class="fa fa-chevron-up"></i> </a>
</div>



<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/jquery-1.10.1.min.js"></script>
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/bootstrap-arabic.min.js"></script>
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/jquery.easing.min.js"></script>
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/owl.carousel.min.js"></script>
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/jquery.lightbox-0.5.min.js"></script>
<!--<script src="http://cdn.jsdelivr.net/jquery.owlcarousel/1.31/owl.carousel.min.js"></script>-->
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/scroll.js"></script>
<script src="<?php echo base_url().'asisst/web_asset/'  ?>js/custom.js"></script>



<script type="text/javascript">
	$(function() {
		$('#thumbnails a').lightBox();
	});
</script>
<script>
	$(document).ready(function () {
		$('#myList li').append('<div class="clearfix"></div>');
		size_li = $("#myList li").size();
		x=9;
		$('#myList li:lt('+x+')').show();
		$('#loadMore').click(function () {
			x= (x+6 <= size_li) ? x+6 : size_li;
			$('#myList li:lt('+x+')').show();

		});
		/*
		 $('#showLess').click(function () {
		 x=(x-4<0) ? 3 : x-4;
		 $('#myList li').not(':lt('+x+')').hide();
		 });
		 */
	});
</script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>asisst/datepicker/js/jquery.calendars.lang.js"></script>


<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asisst/datepicker/css/jquery.calendars.picker.css" />
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.plugin.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.plus.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.picker.js" ></script>
<script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura.js"></script>
<script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura.min.js"></script>
<script src="<?php echo base_url();?>asisst/datepicker/js/jquery.calendars.ummalqura-ar.js"></script>


<script>
$(function() {
                 var calendar = $.calendars.instance('ummalqura','ar');
                            $('#popupDatepicker').calendarsPicker({calendar: calendar});
                            $('#popupDatepicker2').calendarsPicker({calendar: calendar});
                            $('#inlineDatepicker').calendarsPicker({calendar: calendar, onSelect: showDate});
                    });
</script>






</body>
</html>