
<?php 
 $this->load->view('admin/debaga/header');
    ?>
    
    <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
      
  
      
 

     
            <div class="col-xs-12">
           <div class="col-xs-6">
                <h6> اسم طالب المساعدة كاملا : <span><?php echo  $record[0]['name']; ?>
               </div>
            <div class="col-xs-3">   
              </span>  ( <?php echo ( $record[0]['femal_num'] + $record[0]['male_num'] +1)?> ) عدد أفراد الاسرة </h6>
           
           </div>
            <div class="col-xs-3">
                    <h6>تاريخ الميلاد : <?php  echo  $record[0]['birth_date']?> هـ</h6>
                </div>
           
           </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <h6>مقر السكن : <span><?php echo $place[$record[0]['place']]->title; if($record[0]['neighborhood']) echo ',' . $record[0]['neighborhood']; ?></span></h6>
                </div>
           <div class="col-xs-3">
                    <h6> رقم الحفيظة : <span><?php echo  $record[0]['card_num'] ?></span></h6>
                </div>
          <div class="col-xs-3">
                    <h6>تاريخها  : <?php  echo  $record[0]['card_date'] ?> هـ</h6>
                </div>
           <div class="col-xs-3">
                    <h6>مصدرها : <span><?php  echo  $record[0]['card_source'] ?></span></h6>
                </div>
            </div>
         
            <div class="col-xs-12 r-box-one">
                <h6 class="r-first"> 1- إقرار إمام المسجد</h6>
                <div class="col-xs-6">
                    <h6> اقر انا / <span>......................................</span></h6>
                </div>
                <div class="col-xs-6">
                    <h6>إمام مسجد /<span>......................................</span></h6>
                </div>
                <h6 class="text-center"> بان المذكور بياناته اعلاه ومن المحافظين ع الصلوات الخمس جماعة ف المسجد .</h6>
                <h6 class="pull-right"> توقيع الامام / <span>............................</span></h6>
            </div>
            <div class="col-xs-12 r-box-one">
                <h6 class="r-first"> 2- إقرار مؤذن المسجد</h6>
                <div class="col-xs-6">
                    <h6> اقر انا / <span>......................................</span></h6>
                </div>
                <div class="col-xs-6">
                    <h6>مؤذن مسجد /<span>......................................</span></h6>
                </div>
                <h6 class="text-center"> بان المذكور بياناته اعلاه ومن المحافظين ع الصلوات الخمس جماعة ف المسجد .</h6>
                <h6 class="pull-right"> توقيع المؤذن / <span>............................</span></h6>
            </div>
            <div class="col-xs-12 r-box-one">
                <h6 class="r-first"> 3- إقرار اثنان من جماعة المسجد</h6>
                <h6> نقر نحن كل من :</h6>
                <div class="col-xs-6">
                    <h6> 1- <span>......................................</span> </h6>
                </div>
                <div class="col-xs-6">
                    <h6> من جماعة مسجد<span>......................................</span></h6>
                </div>
                <div class="col-xs-6">
                    <h6> 2- <span>......................................</span> </h6>
                </div>
                <div class="col-xs-6">
                    <h6> من جماعة مسجد<span>......................................</span></h6>
                </div>
                <h6 class="text-center"> بان المذكور بياناته اعلاه ومن المحافظين ع الصلوات الخمس جماعة ف المسجد .</h6>
                <div class="col-xs-12">
                    <h6 class="pull-left"> 1- التوقيع / <span>............................</span></h6>
                    <h6 class="pull-right">  2- التوقيع / <span>............................</span></h6>
                </div>
            </div>
            <div class="col-xs-12 r-box-one">
                <h6 class="r-first"> 4- تصديق مكتب المساجد في محافظة سميراء</h6>
                <h6>....................... ............................... ............................... ..................................................
                <br>.................................                  
                ................ .................................... .............. .................</h6>
                <div class="col-xs-12 ">
                    <div class="col-xs-4">
                        <h6 class="text-center">الختم</h6>
                    </div>
                    <div class="col-xs-8 text-center">
                        <h6 class="text-center"> مدير مكتب المساجد في محافظه سميراء</h6>
                        <h6> الاسم / <span> ...............................</span></h6>
                        <h6> التوقيع / <span> ...............................</span></h6>
                    </div>
                </div>
            </div>



 
   
    <?php 
    $this->load->view('admin/debaga/footer');
    ?>
        
     