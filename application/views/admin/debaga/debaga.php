
   <?php 
    
    $this->load->view('admin/debaga/header');
    ?>
    
    
       <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
    
      
        <div class="r-index" id="content">
      
            <div class="col-xs-12">
           
                <h3 class="text-center">إقـــــــــرار</h3>
                <h5> أشــــــهد أنا / <span>..............................................</span></h5>
                <h5>محافظ محافظة سمراء <span>..............................................</span></h5>
                <h5>  رئيس مركز / عمدة <span>..............................................</span></h5>
                <h5> بأن المدعو / <span><?php echo $record[0]['name']; ?>     </span></h5>
                <h5> يسكن محافظة / قرية <span><?php echo $place[$record[0]['place']]->title; if($record[0]['neighborhood']) echo ',' . $record[0]['neighborhood']; ?>  </span> ومن المقيمين بها إقامة دائمة ومستعدين لاحضاره في أي وقت.</h5>
            </div>
            <div class="col-xs-6">
                <h5> ختم المحافظ /المركز / العمدة</h5>
            </div>
            <div class="col-xs-6">
                <h5> اسم وتوقيع المحافظ / رئيس مركز</h5>
            </div>
      
    </div>
      
     
    
    
<?php 
    
    $this->load->view('admin/debaga/footer');
    ?>