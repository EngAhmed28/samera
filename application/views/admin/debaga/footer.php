

<style>

/*
.r-footer {
    margin-bottom: 15px;
}

.r-footer  {
 
   bottom: 0;
  
    border-radius: 10px;
    height: 90px;
}

.r-footer  p {
    font-size: 16px;
    font-weight: bold;
}

.r-footer  .r-p {
    margin-top: 10px;
}

.r-index-two {
    margin-top: 30px;
}

.r-index-two h3 {
    margin-top: 7px;
    margin-bottom: 0px;
    font-size: 18px;
}

.r-box-one {
    border: 2px solid #333;
    margin-top: 15px;
    margin-bottom: 10px;
    padding-bottom: 10px;
}

.r-box-one .r-first {
    font-weight: bold;
    margin-top: 5px;
    margin-bottom: -5px;
}
#r-fo{
    border: 2px solid #333;
    margin-top: 100px;
}
*/

</style>

 <div class="r-footer col-xs-12" id="r-fo">
     <div class="col-xs-12">
            <div class="col-xs-12">
                <h6 class="text-center r-p"> حائل
                 - مدينة سميراء - 
              <?php echo $debaga[0]->name ;
              $phone = unserialize( $debaga[0]->tele_info);
               $donation = unserialize( $debaga[0]->donations_number);
              ?>
                 - ص ب (95) هاتف 
                 <?php
                 for($x=0;$x<count($phone);$x++){
                    echo '  - ('.$phone[$x].')';
                 }
                 ?>
                 <br />
                 
                 
                      حساب الجمعية لدي شركة الراجحي المصرفية للاستثمار - فرع سميراء -
                      التبرعات
                      <?php 
                 for($y=0;$y<count($donation);$y++){
                    echo ',('.$donation[$y].')';
                 }
                 ?>
                 
                 
                 
                 
                 
                 
                 
                 
                 </h6>
            </div>
            
     </div>
    </div>
   