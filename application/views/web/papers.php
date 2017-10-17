

<?php

if(isset($person)&&$person!=null){
    
    

?>
<!--button onClick="window.print()" class="btn btn-success hidden-print"><span class="glyphicon glyphicon-print"></span> طباعة </button-->
	 <div class="btn-group btn-sm col-lg-4 text-center">
                        <a href="#" class="btn btn-warning btn-sm  col-lg-6" data-toggle="dropdown">إقرارات</a>
                        <a href="#" class="btn btn-warning dropdown-toggle btn-sm " data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a target="_blank" href="<?php echo base_url().'web/request_print/'.$person['id']; ?>" ><i class="fa fa-check-square"></i> إستمارة طلب مساعدة </a></li>
                            <li><a target="_blank" href="<?php echo base_url().'web/add_patient_reserve/'.$person['id']; ?>" ><i class="fa fa-check-square"></i> إقرار عادي </a></li>
                            <li><a target="_blank" href="<?php echo base_url().'web/add_diagnosis/'.$person['id']; ?>" ><i class="fa fa-check-square"></i> إقرار مسجد </a></li>
                           
                        </ul>
                    </div>	
<?}else{
    
 echo '
 <br/>
 <div class="alert alert-danger text-center" >
              لا توجد نتائج للبحث
              </div>';  
    
}?>






