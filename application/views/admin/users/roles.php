<style>
    ul {
        list-style: none;
        padding-right: 20px;
    }
    .treeview li>input {
        height: 16px;
        width: 16px;
    }
</style>
<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
<?php if(isset($user_data)):
        $out['form']='dashboard/update_role/'.$user_data['user_id'];
        $out['user_id']=$user_data["user_id"];
        $out['DES']='disabled="disabled"';//user_permations
        $user_per=$user_permations;
        $out['hidden']=' <input type="hidden" name="user_id" value="'.$user_data['user_id'].'">';
        $out['input']='<input type="submit" name="edit_role" value="تعديل" class="btn btn-primary" >';
    else:
        $out['form']='dashboard/create_role';
        $out['user_id']="";
        $out['DES']='';
        $out['hidden']='';
        $user_per=array(0);
        $out['input']='<input type="submit" name="add_role" value="حفظ" class="btn btn-primary" >';
   endif;?>
<div class="inner-content">   
  <?php echo form_open_multipart($out['form'])?>

<div class="row">
    <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم المستخدم </label>
              <select name="user_id" class="form-control"  <?php echo $out['DES'];?> required="required" >
                   <option value=""> إختر</option>
                    <?php foreach ($users as $user) {
                       $select="";   if(isset($user_data)){
                            if($user->user_id ==  $out['user_id'] ){$select='selected="selected"';}
                        }
                        if(isset($user_in)){
                           if(in_array( $user->user_id,$user_in )) {continue;}
                        }
                        ?>
                        <option value="<?php echo $user->user_id?>"  <?php echo $select?>  > <?php echo $user->user_name?></option>
                    <?php }?>
                </select>
                <?php  echo $out['hidden'];?>
                </div>
            </div>
        </div>
</div>
<!-------------------------------------------------  ------------------------------------------------------------->
<div class="row">
        <?php    foreach ($results_main as $main_row):
          $main_checked="";//  if(in_array($main_row->page_id ,$user_per)){ $main_checked='checked="checked"';}
            ?>
        <div class=" col-md-3  pull-right">
        <div class="panel panel-success ">
            <div class="panel-heading">
                <h3 class="panel-title">		<?php  echo  $main_row->group_title?> </h3>
            </div>
<div class="panel-body">
<div id="page-wrap">
    <ul class="treeview">
        <li>
            <input type="checkbox" name="select-all[]" value="<?php  echo  $main_row->group_id."-1"?>" <?php  echo  $main_checked?> >
            <label for="tall" class="custom-unchecked"><?php echo  $main_row->group_title?> </label>
            <?php if(sizeof($main_row->sub) >0){?>
                <ul>
                <?php foreach ($main_row->sub as $sub_row ){
                    $sub_checked="";  if(in_array($sub_row->page_id ,$user_per)){ $sub_checked='checked="checked"';}    ?>
                    <li>
                        <input type="checkbox" name="select-all[]" value="<?php echo $sub_row->page_id."-2"?>" <?php  echo  $sub_checked?> >
                        <label for="tall-2" class="custom-unchecked"><?php echo  $sub_row->page_title?></label>
            
                    </li>
                <?php } ?>
                </ul>
            <?php } ?>
    </ul>
</div>

            </div>
        </div>
        </div>
        <?php endforeach;?>
</div>
<!-------------------------------------------------------------------------------------------------------------->
     

















  <div class="row" >
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <?php echo $out['input']?>
        </div>
        <div class="col-md-4"></div>
    </div>
 <?php echo form_close()?>
</div>



