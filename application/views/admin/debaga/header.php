
  <?php
  $data=explode('/',$debaga[0]->date_construct);
 
  ?>

  
                <div class=" col-xs-4 ">
                    <h6 class="text-center">  
                     المملكة العربية السعودية <br />
                منطقة حائل - محافظة سميراء <br />
                الجمعية الخيرية بمحافظة سميراء <br />
                تحت اشراف وزارة العمل والتنمية الإجتماعية<br/>
                سجلت برقم 287
                    
                     <?php /*echo $debaga[0]->address .'<br/>';
                            echo $debaga[0]->name .'<br/>';
                            echo 'تحت اشراف وزارة الشؤون الاجتماعية <br/>';
                            echo 'سجلت برقم'.$debaga[0]->record_number ;*/
                     ?></h6>
                 
                   <!-- <h6 class="text-center r-bol"><?php ?></h6>
                    <h6 class="text-center">  تحت اشراف وزارة الشؤون الاجتماعية </h6>
                    <h6 class="text-center"> برقم (<?php  echo $debaga[0]->record_number ;?>)</h6>
                    <h6 class="text-center"> تاسست عام <?php  echo $data[0] ;?> هـ</h6>-->
                </div>
                <div class="col-xs-4 r-img">
                    <img style="width:160px !important ; height: 50px;" src="<?php echo base_url('uploads/images/'.$debaga[0]->logo.''); ?>" alt="">
                </div>
                <div class=" col-xs-4 pull-left r-data">
                    <h6>التاريــــــخ : <?php echo $day_date ;?> هـ</h6>
                </div>
            
          