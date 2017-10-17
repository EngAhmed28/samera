<?php

$this->load->view('web/requires/header_index');


?>


<!-- start news  -->
<section id="news">
    <div class="container no-padding">
        <div class="col-md-3">
            <div class="sidebar">
          <form action="<?php echo base_url().'Login/check_login' ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تسجيل الدخول للمنتسبين</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>إسم العضو</label>
                            <input type="text" name="user_name" placeholder="الاسم" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>كلمة السر</label>
                            <input type="password" name="user_pass" placeholder="كلمة السر" class="form-control" required>
                        </div>
                        <div class="form-group text-center">
                        <input type="submit"  name="login" value="الدخول" class="btn btn-default" >
                        </div>

                    </div>
                </div>
            </form>
            	<div class="panel panel-default">
                    <?php
                   if(isset($_COOKIE['rateLikeChnage_3'])) {
             
              if(count($_COOKIE['rateLikeChnage_3']) > 0){
                  echo'<div class="panel-heading">
                   النتائج
                    </div>
               <div class="panel-body daleal">';
                for($k = 0 ; $k < count($this->voot) ; $k++){
                    $type = '';
                    if($this->voot[$k]->id==1){
                      $type ='warning';  
                    }elseif($this->voot[$k]->id===2){
                        $type ='success';   
                    }elseif($this->voot[$k]->id===3){
                        $type ='danger';   
                    }
          echo'<span>'.$this->voot[$k]->name.'</span>
                            <div class="progress">
                                <div class="progress-bar progress-bar-'.$type.'" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:'.$this->voot[$k]->count.'%;">
                                </div>
                            </div>';
                      }
                      echo'</div>';
}
              }else{
                echo'                   
               <div class="panel-heading">
                        استفتاء
                    </div>                    
<div class="panel-body daleal">
                        <form class="" method="post" action="'.base_url("").'web/voters" enctype="multipart/form-data">
                               <label>
                                <input type="radio" name="voting" value="1">    ممتازه  
                            <br>
                                <input type="radio" name="voting" value="2">  جيده جدا   
                            <br>
                                <input type="radio" name="voting" value="3">   مقبوله     </label>
                                <input type="hidden" value="'.base_url(uri_string()).'" name="url" />
                        <input class="btn btn-default" type="submit" name="vote" value="تصويت">  
                        </form>
                    </div>';  
              }
                    ?>
                </div>
           <!--       <form action="<?php echo base_url().'web/voters' ?>" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">إستفتاء</h3>
                    </div>
                    <div class="panel-body">
                        <div class="radio">
                            <label>
                                <input type="radio" name="voting" id="optionsRadios1" value="1" checked>
                                ممتاز
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="voting" id="optionsRadios2" value="2">
                                جيد جداّ
                            </label>
                        </div>
                        <div class="radio ">
                            <label>
                                <input type="radio" name="voting" id="optionsRadios3" value="3" >
                                مقبول
                            </label>
                        </div>
                        
                        <div class="form-group text-center">
                        <input type="submit"  name="vote" value="تصويت" class="btn btn-default" >
                        </div>

                    </div>
                </div>
                </form> -->


            </div>
        </div>
        <div class="col-md-9 news-items">

            <h4 class="heading">أخر الأخبار</h4>
            
            <?php
            if(isset($records) && $records !=null){
                for($x = 0 ; $x < count($records) ; $x++){
                    $photo=unserialize($records[$x]->image);
                    echo '<div class="col-md-4 col-sm-6 col-xs-12 padding-3 ">
                                <div class="news">
                                    <div class="col-sm-4 col-xs-12 poster padding-3">
                                        <a href="'.base_url().'Web/details/'.$records[$x]->id.'/'.$records[$x]->type.'"><img style="height:50px;width:83px;" src="'. base_url().'uploads/images/'.$photo[0].'" alt=""></a>
                                    </div>
                                    <div class="poster-details col-sm-8 padding-3">
                                        <a href="'.base_url().'Web/details/'.$records[$x]->id.'/'.$records[$x]->type.'"> <h2> '.$records[$x]->title.' </h2></a>
                                        <p class="date"><i class="fa fa-clock-o" aria-hidden="true"></i>'.$records[$x]->date.'</p>
                
                                        <p>'.word_limiter($records[$x]->content,10).'</p>
                                    </div>
                                </div>
                            </div>';
                }
            }
            ?>
            
            
            
            <!--div class="col-xs-12 text-right">
                <a href="#">المزيد ...</a>
            </div-->

        </div>

    </div>


</section>




<!-- Start section counter-->
<section class="counter1 text-center">
    <div class="parallax-overlay">
        <h1 class="animatable bounceInDown ">نرغب فى الوصول الى  عدد كبير من المستفيدين</h1>
        <div  class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-6 ">
                    <div class="counter_div">
                        <div class="counter" data-count="100000000">0</div>
                        <h4>عدد طلبات المساعدة</h4>
                        <a href="#">تبرع الأن <i class="fa fa-heartbeat" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 ">
                    <div class="counter_div">
                        <div class="counter" data-count="6000000">0</div>
                        <h4>عدد المستفيدين </h4>
                        <a href="#">تبرع الأن <i class="fa fa-heartbeat" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 ">
                    <div class="counter_div">
                        <div class="counter" data-count="153000000">0</div>
                       <h4>عدد طلبات المساعدة خلال الشهر</h4>
                        <a href="#">تبرع الأن <i class="fa fa-heartbeat" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 ">
                    <div class="counter_div">
                        <div class="counter" data-count="153000000">0</div>
                        <h4>إجمالي التبرعات</h4>
                        <a href="#">تبرع الأن <i class="fa fa-heartbeat" aria-hidden="true"></i></a>
                    </div>
                </div>


            </div>
        </div>

    </div>

</section>


<!-- End section counter-->







<!--section poors projects  start here here-->
<!--
<section class="projects-section">
    <div class="container">
        <h4 class="heading">مشروعات الجمعية</h4>

        <div id="owl-demo2" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#">
                    <img src="<?php echo base_url().'asisst/web_asset/img/'  ?>poor/poor1.jpg" class="img-responsive " title="" />
                    <h3 class="text-center"> مشروعات خيرية</h3>
                    <h4>لتخفيف معاناة حر الصيف عن الأسر المحتاجة والمتعففة</h4>
                </a>
            </div>
        </div>
    </div>
</section>
-->
<section class="projects-section">
    <div class="container">
        <h4 class="heading">مشروعات الخير طريقك الى الجنة</h4>

        <div id="owl-demo2" class="owl-carousel owl-theme">
            <?php if(!empty($projects)):

                for($a = 0 ; $a < count($projects) ; $a++):
                    $img =unserialize($projects[$a]->image);?>
                    <div class="item">
                        <a href="<?php echo base_url('web/project_details/'.$projects[$a]->id.'');?>">
                            <img src="<?php echo base_url().'uploads/images/'.$img[0]; ?>" class="img-responsive " title="" />
                            <h3 class="text-center"> <?php echo $projects[$a]->title; ?></h3>
                            <h4><?php echo word_limiter($projects[$a]->content,10);?></h4>
                        </a>
                    </div>
                <?php endfor; endif;?>

        </div>
    </div>
</section>




<section class="partners">
    <div class="container">
        <h4 class="heading">الجهات الداعمه والمانحه</h4>

        <div id="owl-demo1" class="owl-carousel owl-theme">
        <?php
        if(isset($records4) && $records4 !=null)
                for($x = 0 ; $x < count($records4) ; $x++)
                    echo '<div class="item">
                            <img src="'.base_url().'uploads/images/'.$records4[$x]->img.'">
                        </div>';
        ?>
            
         

        </div>





    </div>
</section>






<!-- opinion-->
<section id="testmonials">
    <div class="container">
        <div id="carousel-example-3" class="carousel slide" data-ride="carousel">
            <h4 class="heading">اراء بعض  الناس عن الجمعية</h4>


            <!-- Wrapper for slides -->
            <div class="carousel-inner text-center" role="listbox">
            
            <?php
            if(isset($opinion) && $opinion !=null)
                for($x = 0 ; $x < count($opinion) ; $x++){
                    if($x == 0)
                        $active = 'active';
                    else
                        $active = '';
                    echo '<div class="item '.$active.'">
                                <div class="col-sm-4 col-xs-12 title">
                                    <div class="col-xs-6">
                                        <img src="'.base_url().'uploads/images/'.$opinion[$x]->img.'">
                                    </div>
            
                                    <h5>'.$opinion[$x]->title.'</h5>
                                    <h6>'.$opinion[$x]->job.'</h6>
                                </div>
                                <div class="col-sm-8 col-xs-12 ">
                                    <div class="testmonial">
                                        <p>'.word_limiter($opinion[$x]->content,20).'</p>
                                    </div>
                                </div>
            
                            </div>';
                }
            ?>
                


             

            </div>
            <!-- Controls -->
            <div class="hidden-xs hidden-sm">
                <a class="left carousel-control" href="#carousel-example-3" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-3" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>



<?php
$this->load->view('web/requires/footer');
?>