<div class="clearfix"></div>
<span id="message">
<?php
if(isset($_SESSION['message']))
    echo $_SESSION['message'];
unset($_SESSION['message']);
?>
</span>
 <?php if(isset($result)):
        $out["form"]='dashboard/update_user_by_id/'.$result['user_id'];
        $out["user_name"]=$result['user_name'];
        $out["user_username"]=$result['user_username'];
        $out['user_email']=$result['user_email'];
        $out['role_id_fk']=$result['role_id_fk'];
        $out['user_phone']=$result['user_phone'];
        $out['user_photo']=$result['user_photo'];
        $out['hunt_span']='  <span style="color: red;" class="" >لعدم تغيير الصورة  الشخصية لا تختار أي شىء </span>';
        $out['input']='<input type="submit" name="edit_user" value="تعديل" class="btn btn-primary" >';
        ?>
    <?php else: 
        $out["form"]='dashboard/add_user';
        $out["user_name"]='';
        $out["user_username"]='';
        $out['user_email']='';
        $out['role_id_fk']="";
        $out['user_phone']="";
        $out['hunt_span']="";
        $out['input']=' <input type="submit"  name="add_user" value="حفظ" class="btn btn-primary" >';
        ?>
    <?php endif ?>
 <div class="inner-content">   
<?php echo form_open_multipart($out["form"]);?>    
   <div class="row">
    <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم العضو</label>
                    <input type="text"  placeholder="إسم العضو"  name="user_name"  value="<?php echo $out['user_name']; ?>"  class="form-control col-xs-6 no-padding" required="" />
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إسم المستخدم</label>
                    <input type="text"  placeholder="إسم المستخدم" name="user_username"  value="<?php echo $out['user_username']; ?>"  class="form-control col-xs-6 no-padding" required="" />
                <span style="color: red;">يجب مراعاه الحروف</span>
                </div>
            </div>
        </div>
   <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>البريد الألكتروني</label>
                    <input type="email" placeholder="البريد الألكتروني"  name="user_email"  value="<?php echo $out['user_email']; ?>"  class="form-control col-xs-6 no-padding"  />
               
                </div>
            </div>
        </div>
   
   </div>     
   <div class="row">
     <?php if(isset($result)): ?>
    <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>كلمة المرور</label>
              <br />   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">تغير كلمة المرور</button>
               
                </div>
            </div>
        </div>
   
     <?php else :?>
         <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" placeholder="كلمة المرور" name="user_pass" id="user_pass" onkeyup="return valid();"   class="form-control col-xs-6 no-padding" required="" />
                <span  id="validate1" ></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" placeholder="تأكيد كلمة المرور" name="user_pass_validate" id="user_pass_validate"  onkeyup="return valid2();"  class="form-control col-xs-6 no-padding"  required="" />
                <span  id="validate" ></span>
                </div>
            </div>
        </div>
     <?php endif?>    
      <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>إختر الدور الوظيفي</label>
                <select name="role_id_fk" class="form-control" required="required">
            <option value=""> إختر</option>
              <?php foreach($roles as $role):
            $selected="";if($out['role_id_fk'] == $role->role_id_pk){$selected="selected";}   ?>
                <option value="<?php echo $role->role_id_pk ?>" <?php echo $selected ?>  ><?php echo $role->role_name ?></option>
                 <?php endforeach?>
                </select>
                </div>
            </div>
        </div>  
        
   </div>
   
    <div class="row">
    
      <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم التليفون</label>
                    <input type="number"   name="user_phone"  value="<?php echo $out['user_phone']; ?>"  class="form-control col-xs-6 no-padding" placeholder="+966-539-044-145"  />
               
                </div>
            </div>
        </div>
    
    
     <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>الصورة الشخصية</label>
                    <input type="file"  name="user_photo"  value=""  class="form-control col-xs-6 no-padding" placeholder=""  />
               <?php echo $out['hunt_span']; ?>
               
                </div>
            </div>
        </div>
       <?php if(isset($out['user_photo'])):  ?>
     <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
           <img width="70" height="70" src="<?php echo base_url()."uploads/thumbs/".$out['user_photo']?>" />        
                </div>
            </div>
        </div>
    <?php endif?>
    
    
    </div>
   
    <div class="row" >
        <div class="col-md-5"></div>
        <div class="col-md-3">
            <?php echo $out['input']?>
        </div>
        <div class="col-md-4"></div>
    </div>
   
    <?php echo form_close()?>
    </div> 
      <?php if(isset($records)&&$records!=null):?>
<div class="col-md-12">
 
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">جدول النتائج</h3>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table id="example" class=" display table table-bordered table-striped table-hover">
                    <thead>
                    <tr class="info">
                        <th>م</th>
                        <th>إسم العضو</th>
                        <th>إسم المستخدم</th>
                        <th>الصورة الشخصية</th>
                        <th>الإجراء</th>
                        
                    </tr>
                    </thead>
                    <tbody>
        <?php $x = 1; ?>
        <?php foreach($records as $record):?>
                    <tr>
                        <td><?php echo $x++?></td>
                        <td><?php echo $record->user_name?></td>
                        <td><?php echo $record->user_username?></td>
                         <td><img width="30" height="30" src="<?php echo base_url()."uploads/thumbs/".$record->user_photo?>" />  </td>
                        <td>
                            <a href="<?php echo base_url().'dashboard/update_user_by_id/'.$record->user_id?>" >  <button type="button" class="btn btn-add btn-xs" data-toggle="modal" data-target="#update"><i class="fa fa-pencil"></i></button></a>
                            <a  href="<?php // echo base_url().'dashboard/delete_gehat_da3ma/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" > <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt"><i class="fa fa-trash-o"></i> </button></a>
                        </td>
                    </tr>
        <?php endforeach ;?>

                    </tbody>
                </table>
            </div>
        </div>

    </div>
   
</div>

  <?php endif;?>
  


    
  <?php if(isset($result)): ?>
  
    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">تغير كلمة المرور</h4>
      </div>
      <div class="modal-body">
   <?php echo form_open_multipart('dashboard/UpdatePassKey/'.$result['user_id']);?>       
       <div class="row">
       <div class="col-md-4">
            <div class="layout">
                <div class="form-group">
                    <label>كلمة المرور</label>
                    <input type="password" placeholder="كلمة المرور" name="user_pass" id="user_pass"  class="form-control col-xs-6 no-padding" onkeyup="return valid();"  />
                  <span  id="validate1" ></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="layout">
                <div class="form-group">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" placeholder="تأكيد كلمة المرور" name="user_pass_validate"  onkeyup="return valid2();" id="user_pass_validate"  class="form-control col-xs-6 no-padding"   />
                <span  id="validate" ></span>
                </div>
            </div>
        </div>
        
        <div class="col-md-2">
            <div class="layout">
                <div class="form-group"><br />
                   <button type="submit" name="UPDATE_PASS" value="UPDATE_PASS" class="btn btn-success">حفظ التغير</button>
                     </div>
            </div>
        </div>
        
        
        
        </div>
     <?php echo form_close()?>     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>
    </div>

  </div>
</div>
  <!-- Modal -->
  
  
  <?php endif?>
  
            <script>
    function valid()
    {
        if($("#user_pass").val().length > 10){
            document.getElementById('validate1').style.color = '#00FF00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور قوية';
        }else{
            document.getElementById('validate1').style.color = '#F00';
            document.getElementById('validate1').innerHTML = 'كلمة المرور ضعيفة';
        }
    }
    
    function valid2()
    {
        if($("#user_pass").val() == $("#user_pass_validate").val()){
            document.getElementById('validate').style.color = '#00FF00';
            document.getElementById('validate').innerHTML = 'كلمة المرور متطابقة';
        }else{
            document.getElementById('validate').style.color = '#F00';
            document.getElementById('validate').innerHTML = 'كلمة المرور غير متطابقة';
        }
    }
    
</script>

  
  
  
  