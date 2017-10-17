<div class="clearfix"></div>

<div class="inner-content" >

<?php echo form_open_multipart('dashboard/print_lagna',array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>
 <?php 

            if(isset($lagna)&& $lagna!=null){?>

   
           
 <table id="example" class=" display table table-bordered table-striped table-hover">

<thead> 

<tr class="info">

<th width="2%">#</th>



            <th  width="20%" class=" ">إسم طالب المساعدة</th>

             <th width="20%" class=" ">الجوال</th>
             
             <th width="20%" class=" ">العنوان</th>

             <th width="20%" class=" ">طباعة قرارات مجلس الإدارة</th>

</tr>

</thead>

<tbody>
<?php  

$z=1;



  foreach($lagna as $record):
    if(isset($person[$record->person_id])){

 ?>
           
       <tr>

      <td ><?php echo $z++ ?></td>
      <td ><?php echo $person[$record->person_id]['name']  ;?></td>
      <td ><?php echo $person[$record->person_id]['mobile']   ;?></td>
      <td><?php echo  $place[$person[$record->person_id]['place']]->title. ' , '  .$person[$record->person_id]['neighborhood']; ?></td>
      <td>
      
         <a href="<?php echo base_url().'dashboard/print_search_form/'.$record->id?>" class="btn btn-info btn-xs col-lg-12">

                           <i class="fa fa-print"></i> طباعة </a>
                           

            
         </td>

  </tr>     
            
            
            
            
            
             <?php 
}
 endforeach;

 ?>

</tbody></table>



<?php }else{
    
    echo('<h2><center> لا يوجد أراء حاليه لمجلس الإدارة <center> </h2>');
}?>
            
     

        <?php echo form_close()?>

</div>