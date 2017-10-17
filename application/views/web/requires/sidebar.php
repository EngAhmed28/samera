	<!-- SIDEBAR -->
	<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          <div class="panel panel-default">
					<div class="panel-heading">
				جمعية سميراء الخيرية
					</div>
					<div class="panel-body">
						<div class="input-group">
						<a href=""><img src="<?php echo base_url();?>/asisst/web_asset/img/somyraa2.png" style=" width: 230px;
    margin-bottom: 6px;"></a>
						</div>
                        <div class="panel-footer">
                       		جمعية سميراء الخيرية
                        </div>
					</div>
	</div>
<!--
            <div class="panel panel-default">
					<div class="panel-heading">
			الجمعية الخيرية بمحافظة سميراء
					</div>
	</div>
-->
                <div class="panel panel-default">
                 <div class="panel-heading">
                      مساحة إعلانية
                    </div>
					<div class="panel-body">
       <?php
            echo '<div id="carousel-example-generic2" class="carousel slide" data-ride="carousel">';
           echo '<ol class="carousel-indicators">';
              for($aa = 0 ; $aa < count($this->advert) ; $aa++)
               {
                    if($aa==0)
                        {$activety='active';}
                    else
                        {$activety='';}
                    echo '<li data-target="#carousel-example-generic2" data-slide-to="'.$aa.'" class="'.$activety.'"></li>';
                }
                echo '</ol>';
                echo ' 
                <div class="carousel-inner" role="listbox">';
           for($aa = 0 ; $aa < count($this->advert) ; $aa++)
       {
                if($aa == 0){
                        $active='active';
                    }else{
                        $active='';
                    }
                    echo '
                    <div class="item '.$active.'">
					      <img src="'.base_url('uploads/images/'.$this->advert[$aa]->image.'').'"  style="height: 350px; width: 258px;"  alt="...">
				          </div>';
        }
           echo '</div>
                          <a class="left carousel-control" href="#carousel-example-generic2" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic2" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>';
           echo '</div>';
                      ?>      
					</div>
				</div>
    <!-- reports -->
				<!--div class="panel panel-default">
					<div class="panel-heading">
						تقارير الإنجاز السنوي للجمعية
					</div>
					<div class="panel-body">
                        <?php
/*
                        echo '<input type="hidden" value="'.base_url(uri_string()).'" name="url" />';
                        for($x = 0 ; $x < count($this->report) ; $x++)
                        {
                           echo '<a class="btn btn-info col-xs-12 cil-sm-12 col-md-12 col-lg-12" href="'.base_url().'web/download/'.$this->report[$x]->attached.'" download>
    <span class="glyphicon glyphicon-file"></span> حمل الملف الان</a><br /><br />'; 
                        }
*/
               ?>
					</div>
				</div-->
				<!-- reports -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        تسجيل دخول المنتسبين
                    </div>
                    <div class="panel-body">
                               <form method="post" action="<?php echo base_url().'web/log_in' ?>">
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" class="form-control" name="user_name" placeholder="الاسم" required>
                            </div>
                            <div class="form-group">
                                <label>كلمة السر</label>
                                <input type="password" class="form-control" name="user_pass" placeholder="كلمة السر" required>
                            </div>
                             <div class="form-group">
                                <input type="submit" name="login" value="دخول" class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                	<div class="panel panel-default">
                    <?php 
                      var_dump($_COOKIE);
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
	<div class="panel panel-default">
					<div class="panel-heading">
						مواقع تهمك
					</div>
					<div class="panel-body">
						<ul class="media-list">
                        <?php
                            for($i = 0 ; $i < 3 ;$i++)
                            {
                                echo '<li>
            								<a href="http://'.$this->sites[$i]->url.'" target="_blank">'.$this->sites[$i]->name.'</a>
            						  </li>';
                            }
                        ?>
						</ul>
					</div>
				</div>
				<!-- good for you -->
			</div>
<style>
          .carousel-inner > .item > img,
          .carousel-inner > .item > a > img {
              width: 70%;
              margin: auto;
          }
</style>