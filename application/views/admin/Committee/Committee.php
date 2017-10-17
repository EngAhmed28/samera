<div class="clearfix"></div>

<div class="well bs-component" >

<?php echo form_open_multipart('dashboard/Committee',array('class'=>"form-horizontal",'role'=>"form" ))?>

        <fieldset>
            <?php if(isset($records)&&$records!=null):?>
<table id="example" class=" display table table-bordered table-striped table-hover">

<thead> 

<tr class="info">

<th width="2%">#</th>



            <th  width="20%" class=" ">إسم طالب المساعدة</th>

             <th width="30%" class=" ">الجوال</th>
             
             <th width="30%" class=" ">العنوان</th>
             
             <th width="20%" class=" ">إضافة قرار لجنة البحث</th>

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
     
      <td ><?php if($record->mobile) echo $record->mobile ; else echo 'لا يوجد';?></td>
      <td><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></td>
         
         <td>
         
         <a target="_blank" href="<?php echo base_url().'dashboard/openion/'.$record->id?>" class="btn btn-info btn-xs">

                           <i class="fa fa-print"></i> طباعة </a>
         <?php
         
            if(isset($result2[$record->id]) && $result2[$record->id]!=null){
         
         ?>
         <a href="<?php echo base_url().'dashboard/search_form2/'.$record->id?>" class="btn btn-warning btn-xs">

                           <i class="fa fa-pencil"></i> تعديل </a>
                           
                           <?php }
                           else {
                           ?>
                           <a href="<?php echo base_url().'dashboard/search_form2/'.$record->id?>" class="btn btn-success btn-xs">

                           <i class="fa fa-plus"></i> إضافة </a>
                           <?php } ?>
            
         </td>

  </tr>     
            
            
            
            
            
             <?php 

 endforeach;

 ?>

</tbody></table>



<?php endif;?>
            
        </fieldset>


        <?php echo form_close()?>

</div>