<div class="clearfix"></div>
<div class="inner-content" >
<?php echo form_open_multipart('dashboard/Committee',array('class'=>"form-horizontal",'role'=>"form" ))?>


   
            <?php if(isset($records)&&$records!=null):?>
 <table id="example" class=" display table table-bordered table-striped table-hover">

<thead> 

<tr class="info">

<th width="2%">#</th>



            <th  width="20%" class=" ">إسم طالب المساعدة</th>

             <th width="20%" class=" ">الجوال</th>
             
             <th width="20%" class=" ">العنوان</th>
             
             <th width="20%" class=" ">إضافة قرار مجلس الإدارة</th>
            <!-- <th width="20%" class=" ">طباعة قرارات مجلس الإدارة</th>-->

</tr>

</thead>

<tbody>
<?php  

$z=1;

  foreach($records as $record):

 ?>
           
       <tr>

     <td ><?php echo $z++ ?></td>

     <td ><?php echo $record->name  ;?></td>
     
      <td ><?php echo $record->mobile  ;?></td>
      <td><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></td>
         
         <td>
         <?php
         
            if(isset($result2[$record->id]) && $result2[$record->id]!=null){
         
         ?>
         <a href="<?php echo base_url().'dashboard/search_form3/'.$record->id?>" class="btn btn-warning btn-xs col-lg-12">

                           <i class="fa fa-pencil"></i> تعديل </a>
                           
                           <?php }
                           else {
                           ?>
                           <a href="<?php echo base_url().'dashboard/search_form3/'.$record->id?>" class="btn btn-success btn-xs col-lg-12">

                           <i class="fa fa-plus"></i> إضافة </a>
                           <?php } ?>
            
         </td>
         
              <!--  <td>
         <?php
         
            if(isset($result2[$record->id]) && $result2[$record->id]!=null){
         
         ?>
         <a href="<?php echo base_url().'dashboard/print_search_form/'.$record->id?>" class="btn btn-info btn-xs col-lg-12">

                           <i class="fa fa-print"></i> طباعة </a>
                           
                           <?php }
                           else {
                           ?>
                           

                           <i class="fa fa-print danger" class="btn btn-danger btn-xs col-lg-12" ></i> لا يوجد قرار للطباعة </a>
                           <?php } ?>
            
         </td>-->

  </tr>     
            
            
            
            
            
             <?php 

 endforeach;

 ?>

</tbody></table>



<?php endif;?>
            
    


        <?php echo form_close()?>

</div>