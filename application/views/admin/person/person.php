
<div class="clearfix"></div>
<span id="message">
    <?php
    if(isset($_SESSION['message']))
        echo $_SESSION['message'];
    unset($_SESSION['message']);
    ?>
</span>
<div class="" >
<?php 
if(isset($result1)):
    echo form_open_multipart('dashboard/update_person/'.$result1['id'],array('class'=>"form-horizontal",'role'=>"form" ));
?>
<fieldset>

    
    <div class="inner-content">    
        
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group ">
                    <label>إسم طالب المساعدة</label>
                    <input type="text" id="name"  name="name" value="<?php echo $result1['name'] ?>" class="form-control  " placeholder="إسم طالب المساعدة" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخ الميلاد</label>
                    <input type="text" id="popupDatepicker" value="<?php echo $result1['birth_date'] ?>" name="birth_date" class="form-control  " placeholder="تاريخ الميلاد" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>النوع</label>
                    <?php
                    if($result1['gender'] == 1){
                        $male="checked='checked'";
                    }else{
                        $male='';
                    }
                    if($result1['gender'] == 2){
                        $femal="checked='checked'";
                    }else{
                        $femal='';
                    }
                    ?>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="radio" name="gender" <?php echo $male ?>  value="1" required /> ذكر
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="radio" name="gender" <?php echo $femal ?> value="2" required />  أنثى
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الجوال</label>
                    <input type="text" id="mobile"  name="mobile" onkeypress="return isNumberKey(event)" value="<?php echo $result1['mobile'] ?>" class="form-control  " placeholder="الجوال" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>هاتف المنزل</label>
                    <input type="text" id="home_phone"  name="home_phone" onkeypress="return isNumberKey(event)" value="<?php echo $result1['home_phone'] ?>" class="form-control  " placeholder="هاتف المنزل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>المهنة</label>
                    <input type="text" id="job"  name="job" value="<?php echo $result1['job'] ?>" class="form-control  " placeholder="المهنة" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>مكان العمل</label>
                    <input type="text" id="job_place"  name="job_place" value="<?php echo $result1['job_place'] ?>" class="form-control  " placeholder="مكان العمل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>هاتف العمل</label>
                    <input type="text" id="job_phone"  name="job_phone" onkeypress="return isNumberKey(event)" value="<?php echo $result1['job_phone'] ?>" class="form-control  " placeholder="هاتف العمل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>نوع المستفيد</label>
                    <select name="benefit" id="benefit" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($benefit as $record){
                            if($record->id == $result1['benefit'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>مكان السكن</label>
                    <select name="place" id="place" class="form-control" required>
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($place as $record){
                            if($record->id == $result1['place'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';//نوع المستفيد
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحي</label>
                    <input type="text" id="neighborhood"  name="neighborhood" class="form-control  " placeholder="الحي" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>نوع السكن</label>
                    <select name="house_state" id="house_state" onchange="return rent($('#house_type').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($house_state as $record){
                            if($record->id == $result1['house_state'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>حالة السكن</label>
                    <select name="house_type" id="house_type" onchange="return rent($('#house_type').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($house_type as $record){
                            if($record->id == $result1['house_type'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="optionearea2">
        <?php
        if($result1['house_type'] == 111)
        {
            echo '<div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <label>القيمة السنوية</label>
                            <input type="text" id="house_rent" name="house_rent" value="'.$result1['house_rent'].'" onkeypress="return isNumberKey(event)" class="form-control" placeholder="القيمة السنوية" required>
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <label>إسم المالك</label>
                            <input type="text" id="house_owner" name="house_owner" value="'.$result1['house_owner'].'" class="form-control" placeholder="إسم المالك" required>
                        </div>
                    </div>
                  </div>';
        }    
        ?>       
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحالة الصحية</label>
                    <select name="health_state" id="health_state" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($health_state as $record){
                            if($record->id == $result1['health_state'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحالة الإجتماعية</label>
                    <select name="social_status" id="social_status" onchange="return social($('#social_status').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($social_status as $record){
                            if($record->id == $result1['social_status'])
                                $select = 'selected';
                            else
                                $select = '';
                            echo '<option value="'.$record->id.'" '.$select.'>'.$record->title.'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="optionearea3">
        <?php
        if($result1['social_status'] == 101){   
            if($result1['orphan_propety'] == 6){
                $check = 'checked';
                $checked = '';
            }
            else{
                $checked = 'checked';
                $check = '';
            }
            echo '<div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <label>إسم الولي الشرعي</label>
                            <input type="text" id="orphan_name" name="orphan_name" value="'.$result1['orphan_name'].'" class="form-control" placeholder="إسم الولي الشرعي" required>
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <label>إرفاق الإثبات</label>
                            <input type="file" id="orphan_prove" name="orphan_prove" class="form-control" accept="image/*" required>
                            <a href="'.base_url().'dashboard/download/'.$result1['orphan_prove'].'">إضغط لتحميل الملف</a>
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <br />
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="radio" id="orphan_propety" name="orphan_propety" value="6" '.$check.' required><label>مالك</label>
                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                            <input type="radio" id="orphan_propety" name="orphan_propety" value="7" '.$check.' required><label>مستأجر</label>
                            
                        </div>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <div class="layout">
                        <div class="form-group">
                            <label>الإيجار</label>
                            <input type="text" id="orphan_propety_rent" value="'.$result1['orphan_propety_rent'].'" onkeypress="return isNumberKey(event)" name="orphan_propety_rent" placeholder="الإيجار السنوي" class="form-control" >
                        </div>
                    </div>
                  </div>';
        }
        ?>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم السجل المدني</label>
                    <input type="text" id="card_num" onkeypress="return isNumberKey(event)" name="card_num" maxlength="10" minlength="10" value="<?php echo $result1['card_num'] ?>" class="form-control  " placeholder="رقم الحفيظة" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخه</label>
                    <input type="text" id="popupDatepicker2" name="card_date" value="<?php echo $result1['card_date'] ?>" class="form-control  " placeholder="تاريخه" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>مصدره</label>
                    <input type="text" id="card_source"  name="card_source" value="<?php echo $result1['card_source'] ?>" class="form-control  " placeholder="مصدره" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>الأفراد</label>
                    <input type="text" id="total" name="total" value="<?php echo $result1['male_num']+ $result1['femal_num']+1 ?>" class="form-control  " placeholder="" readonly>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>ذكور</label>
                    <input type="text" id="male_num" onkeypress="return isNumberKey(event)" name="male_num" value="<?php echo $result1['male_num'] ?>" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور" >
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>إناث</label>
                    <input type="text" id="femal_num" onkeypress="return isNumberKey(event)" name="femal_num" value="<?php echo $result1['femal_num'] ?>" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث" >
                </div>
            </div>
        </div>
        <div id="optionearea1">
        <?php
        if(isset($result2) && $result2 != null){
            $type = array('زوجة','إبن','إبنة');
            $education = array('دون سن الدراسة','رياض أطفال','إبتدائي','متوسط','ثانوي','جامعي','خريج');
                echo '<div class="col-xs-12 table-responsive">  
                        <table id="" class=" display table table-bordered table-striped table-hover">
                        <thead>
                        <tr class="info">
                            <th class=" ">الإسم</th>
                            <th class=" ">تاريخ الميلاد</th>
                            <th class=" ">السجل المدني</th>
                            <th class=" ">النوع</th>
                            <th class=" ">المرحلة الدراسية</th>
                        </tr>
                        </thead>
                        <tbody>';
                        
                for($x = 0 ; $x < count($result2) ; $x++){
    
                    echo '<tr>
                           <td><input type="text" id="f_name'.$x.'" name="f_name'.$x.'" value="'.$result2[$x]->f_name.'" class="form-control  " required="required" /></td>
                           <td><input type="date" id="f_birth_date'.$x.'" name="f_birth_date'.$x.'" value="'.$result2[$x]->f_birth_date.'" class="form-control  " required="required" /></td>
                           <td><input type="text" maxlength="10" minlength="10" onkeypress="return isNumberKey(event)" id="f_id_card'.$x.'" value="'.$result2[$x]->f_id_card.'" name="f_id_card'.$x.'" class="form-control  " required="required" /></td>
                           <td>
                               <select id="type'.$x.'" name="f_type'.$x.'" class="form-control" onchange="return education('.$x.');" required="required" >
                               <option value="">--قم بالإختيار--</option>';
                               
                               for($s = 0 ; $s < count($type) ; $s++)
                               {
                                    if(($s+1) == $result2[$x]->f_type)
                                        $selec = 'selected';
                                    else
                                        $selec = '';
                                    echo '<option value="'.($s+1).'" '.$selec.'>'.$type[$s].'</option>';
                               }
                               
                   echo '</select>
                           </td>
                           <td>';
                   if($result2[$x]->f_type == 1)
                        $enable = 'disabled="disabled"';
                   else
                        $enable = '';
                   
                       echo '<select id="education'.$x.'" name="f_education'.$x.'" class="form-control" required="required" '.$enable.'>
                                   <option value="">--قم بالإختيار--</option>';
                                   
                                   for($s = 0 ; $s < count($education) ; $s++)
                                   {
                                        if(($s+1) == $result2[$x]->f_education)
                                            $selec = 'selected';
                                        else
                                            $selec = '';
                                        echo '<option value="'.($s+1).'" '.$selec.'>'.$education[$s].'</option>';
                                   }
                                   
                       echo '</select>';
                   
                   echo '</td>
                          </tr>';
                    
                }
                
                echo ' </tbody>
                      </table>
                      </div>';
        } 
        ?>
        </div>
        <div class="col-xs-12">
            <table id="" class="table">
                <thead>
                    <tr class="info">
                        <th class=" ">نوع الدخل</th>
                        <th class=" ">مقداره</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class=" ">ضمان إجتماعي</th>
                        <td><input type="number" id="society" onkeyup="return summ();" name="society" value="<?php echo $result3['society'] ?>" min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">رعاية المعاقين</th>
                        <td><input type="number" id="retard" name="retard" onkeyup="return summ();" value="<?php echo $result3['retard'] ?>" min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">مكافحة التسول</th>
                        <td><input type="number" id="begger" name="begger" onkeyup="return summ();" value="<?php echo $result3['begger'] ?>"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">الأوقاف</th>
                        <td><input type="number" id="awqaf" name="awqaf" onkeyup="return summ();" value="<?php echo $result3['awqaf'] ?>"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">خرجية(عوائد)</th>
                        <td><input type="number" id="3waned" name="3waned" onkeyup="return summ();" value="<?php echo $result3['3waned'] ?>"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">تقاعد</th>
                        <td><input type="number" id="retirement" name="retirement" onkeyup="return summ();" value="<?php echo $result3['retirement'] ?>" min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class=" ">الراتب الشهري</th>
                        <td><input type="number" id="salary"  name="salary" class="form-control text-center" onkeyup="return summ();" value="<?php echo $result1['salary'] ?>" min="0" ></td>
                    </tr>
                    
                    <tr>
                        <th class=" ">أخرى</th>
                        <td><input type="number" id="other"  name="other" class="form-control text-center" onkeyup="return summ();" value="<?php echo $result3['other'] ?>" min="0" ></td>
                    </tr>
                    <tr>
                        <th class=" ">الإجمالــــي</th>
                        <td><input type="number" id="total2" name="total2" value="<?php echo $result3['total'] ?>" class="form-control text-center" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-6">
            <input type="submit" name="update_person" value="تعديل" class="btn btn-primary" >
        </div>
        
    </div>

<?php 
echo form_close();
else: 
    echo form_open_multipart('dashboard/add_person',array('class'=>"form-horizontal",'role'=>"form" ));
?>



    
    <div class="inner-content">    
        
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group ">
                    <label>إسم طالب المساعدة</label>
                    <input type="text" id="name"  name="name" class="form-control  " placeholder="إسم طالب المساعدة" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخ الميلاد</label>
                    <input type="text" id="popupDatepicker"  name="birth_date" class="form-control  " placeholder="تاريخ الميلاد" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>النوع</label>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="radio" name="gender"   value="1" required /> ذكر
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <input type="radio" name="gender" value="2" required />  أنثى
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الجوال</label>
                    <input type="text" id="mobile"  name="mobile" class="form-control  " placeholder="الجوال" onkeypress="return isNumberKey(event)" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>هاتف المنزل</label>
                    <input type="text" id="home_phone"  name="home_phone" class="form-control  " onkeypress="return isNumberKey(event)" placeholder="هاتف المنزل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>المهنة</label>
                    <input type="text" id="job"  name="job" class="form-control  " placeholder="المهنة" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>مكان العمل</label>
                    <input type="text" id="job_place"  name="job_place" class="form-control  " placeholder="مكان العمل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>هاتف العمل</label>
                    <input type="text" id="job_phone"  name="job_phone" class="form-control  " onkeypress="return isNumberKey(event)" placeholder="هاتف العمل" >
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>نوع المستفيد</label>
                    <select name="benefit" id="benefit" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($benefit as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>مكان السكن</label>
                    <select name="place" id="place" class="form-control" required>
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($place as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';//نوع المستفيد
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحي</label>
                    <input type="text" id="neighborhood"  name="neighborhood" class="form-control  " placeholder="الحي" required>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>نوع السكن</label>
                    <select name="house_state" id="house_state" onchange="return rent($('#house_type').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($house_state as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>حالة السكن</label>
                    <select name="house_type" id="house_type" onchange="return rent($('#house_type').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($house_type as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="optionearea2"></div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحالة الصحية</label>
                    <select name="health_state" id="health_state" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($health_state as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="layout">
                <div class="form-group">
                    <label>الحالة الإجتماعية</label>
                    <select name="social_status" id="social_status" onchange="return social($('#social_status').val());" class="form-control" required >
                        <option value="">--قم بالإختيار--</option>
                        <?php
                        foreach($social_status as $record)
                            echo '<option value="'.$record->id.'">'.$record->title.'</option>';
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="optionearea3"></div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>رقم السجل المدني</label>
                    <input type="text" id="card_num" maxlength="10" minlength="10" name="card_num" onkeypress="return isNumberKey(event)" class="form-control  " placeholder="رقم السجل المدني" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>تاريخه</label>
                    <input type="text" id="popupDatepicker2"  name="card_date" class="form-control  " placeholder="تاريخه" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>مصدره</label>
                    <input type="text" id="card_source"  name="card_source" class="form-control  " placeholder="مصدره" required>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>الأفراد</label>
                    <input type="text" id="total" value="1" name="total" class="form-control  " placeholder="" readonly>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>ذكور</label>
                    <input type="text" id="male_num"  name="male_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور" >
                </div>
            </div>
        </div>
        <div class="col-xs-4">
            <div class="layout">
                <div class="form-group">
                    <label>إناث</label>
                    <input type="text" id="femal_num"  name="femal_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث" >
                </div>
            </div>
        </div>
        <div id="optionearea1"></div>
        <div class="col-xs-12 table-responsive">
            <table id="" class=" display table table-bordered table-striped table-hover">
                <thead>
                    <tr class="info">
                        <th class=" ">نوع الدخل</th>
                        <th class=" ">مقداره</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="success">ضمان إجتماعي</th>
                        <td><input type="number" id="society" onkeyup="return summ();" name="society" value="0" min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class="success">رعاية المعاقين</th>
                        <td><input type="number" id="retard" name="retard" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class="success">مكافحة التسول</th>
                        <td><input type="number" id="begger" name="begger" onkeyup="return summ();" value="0"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class="success">الأوقاف</th>
                        <td><input type="number" id="awqaf" name="awqaf" onkeyup="return summ();" value="0"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class="success">خرجية(عوائد)</th>
                        <td><input type="number" id="3waned" name="3waned" onkeyup="return summ();" value="0"  min="0" class="form-control text-center"></td>
                    </tr>
                    <tr>
                        <th class="success">تقاعد</th>
                        <td><input type="number" id="retirement" name="retirement" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                    </tr>
                    
                    <tr>
                        <th class="success">الراتب الشهري</th>
                        <td><input type="number" id="salary"  name="salary" class="form-control text-center" onkeyup="return summ();" value="0" min="0" ></td>
                    </tr>
                    
                    <tr>
                        <th class="success">أخرى</th>
                        <td><input type="number" id="other"  name="other" class="form-control text-center" onkeyup="return summ();" value="0" min="0" ></td>
                    </tr>
                    
                    <tr>
                        <th class="success">الإجمالــــي</th>
                        <td><input type="number" id="total2" name="total2" class="form-control text-center" readonly></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-6">
            <input type="submit"  name="add_person" value="حفظ" class="btn btn-primary" >
        </div>
        
    </div>


<?php 
echo form_close();
endif?>

</div>

<?php 
if(isset($records)&&$records!=null):
?>

<table id="example" class=" display table table-bordered table-striped table-hover">
    <thead> 
        <tr>
            <th width="2%">#</th>
            <th  width="20%" class=" ">إسم طالب المساعدة</th>
            <th width="30%" class=" ">التحكم</th>
            <th width="15%" class=" ">الأوراق المرفقة</th>
            <th width="15%" class="text-center">طباعة</th>
        </tr>
    </thead>
    <tbody>
    <?php  
    $z=1;
    foreach($records as $record):
        for($x = 0 ; $x < count($health_state) ; $x++)
            if($health_state[$x]->id == $record->health_state)
                $health = $health_state[$x]->title;
        for($x = 0 ; $x < count($social_status) ; $x++)
            if($social_status[$x]->id == $record->social_status)
                $social = $social_status[$x]->title;
    ?>
    <tr>
        <td ><?php echo $z++ ?></td>
        <td ><?php echo $record->name  ;?></td>
        <td>
            <button title="تفاصيل" class="btn btn-info btn-xs " data-toggle="modal" data-target="#myModal<?php echo $record->id ?>">
            <i class="fa fa-list"></i> تفاصيل </button>
            <a title="تعديل" href="<?php echo base_url().'dashboard/update_person/'.$record->id?>" class="btn btn-add btn-xs">
            <i class="fa fa-pencil"></i> تعديل </a>
            <a title="حذف" href="<?php echo base_url().'dashboard/delete_person/'.$record->id?>" onclick="return confirm('هل انت متأكد من عملية الحذف ؟');" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delt">
            <i class="fa fa-trash-o"></i> حذف </a>
        </td>
        <td>
            <button title="إضافة" class="btn btn-success btn-xs" data-toggle="modal" data-target="#myModa<?php echo $record->id ?>">
            <i class="fa fa-plus"></i> إضافة الأوراق المرفقة </button>
        </td>
        <td>
            <div class="btn-group btn-xs col-lg-12 ">
                <a href="#" class="btn btn-warning btn-xs" data-toggle="dropdown"><i class="fa fa-file"></i> إقرارات </a>
                <a href="#" class="btn btn-warning dropdown-toggle btn-xs " data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu  ">
                    <li><a target="_blank" href="<?php echo base_url().'dashboard/request_print/'.$record->id; ?>" ><i class="fa fa-pencil-square"></i> إستمارة طلب مساعدة </a></li>
                    <li><a  target="_blank" href="<?php echo base_url().'dashboard/add_patient_reserve/'.$record->id; ?>" ><i class="fa fa-pencil-square"></i> إقرار عادي </a></li>
                    <li><a target="_blank" href="<?php echo base_url().'dashboard/add_diagnosis/'.$record->id; ?>" ><i class="fa fa-pencil-square"></i> إقرار مسجد </a></li>
                </ul>
            </div> 
        </td> 
    </tr>
    <div class="modal fade" id="myModal<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width:550px">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">تفاصيل طالب المساعدة</h4>
                </div>
                <div class="row" style="margin-right:10px">
                    <div class="col-md-4">     
                        <h5>الإسم:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo $record->name ?></h5>
                    </div>
                
                    <div class="col-md-4">     
                        <h5>تاريخ الميلاد:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo $record->birth_date ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>الجوال:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if($record->mobile)echo $record->mobile; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>هاتف المنزل:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if($record->home_phone)echo $record->home_phone; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>عنوان السكن:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo $place[$record->place]->title; if($record->neighborhood) echo ' , '  .$record->neighborhood; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>الحالة الصحية:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if(isset($health))echo $health; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>الحالة الإجتماعية:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if(isset($social))echo $social;else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>نوع المستفيد:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if(isset($benefit[$record->benefit]->title))echo $benefit[$record->benefit]->title;else echo 'لا يوجد';?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>عدد أفراد الأسرة:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo ($record->male_num +  $record->femal_num +1)?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>المهنة:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if($record->job)echo $record->job; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>عنوان العمل:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if($record->job_place)echo $record->job_place; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>هاتف العمل:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php if($record->job_phone)echo $record->job_phone; else echo 'لا يوجد'; ?></h5>
                    </div>
                    
                    <div class="col-md-4">     
                        <h5>الراتب:</h5>
                    </div>
                    <div class="col-sm-8">
                        <h5><?php echo $record->salary ?></h5>
                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                </div>
            </div>
        </div>
    </div>
    
    <form name="form<?php echo $record->id ?>" method="post" action="<?php echo base_url().'dashboard/add_paper/'.$record->id ?>" enctype="multipart/form-data">
        <div class="modal fade" id="myModa<?php echo $record->id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="width:550px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">الأوراق المرفقة</h4>
                    </div>
                    <br />
                    <div class="row" style="margin-right:5px">
                        <div class="col-md-3">     
                            <h5>إقرار عادي</h5>
                        </div>
                        <div class="col-sm-6">
                            <input type="file" id="report1<?php echo $record->id ?>" name="report1<?php echo $record->id ?>" class="form-control  " accept="image/*" >
                        </div>
                        <div class="col-sm-3">
                            <?php 
                            if(isset($papers[$record->id]->report1) && $papers[$record->id]->report1 != '')
                                echo '<a href="'.base_url().'dashboard/download/'.$papers[$record->id]->report1.'">إضغط لتحميل الملف</a>';
                            ?>
                        </div>
                    </div>
                    <div class="row" style="margin-right:5px">
                        <div class="col-md-3">     
                            <h5>إقرار مسجد</h5>
                        </div>
                        <div class="col-sm-6">
                            <input type="file" id="report2<?php echo $record->id ?>" name="report2<?php echo $record->id ?>" class="form-control  " accept="image/*" >
                        </div>
                        <div class="col-sm-3" style="padding-top: 20px;">
                            <?php 
                            if(isset($papers[$record->id]->report2) && $papers[$record->id]->report2 != '')
                                echo '<a href="'.base_url().'dashboard/download/'.$papers[$record->id]->report2.'">إضغط لتحميل الملف</a>';
                            ?>
                        </div>
                    </div>             
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php 
    endforeach;
    ?>
    </tbody>
</table>





    <?php
endif;
?>

<script>

function calc(male,female)
{
    if(male == '')
        male = 0;
    if(female == '')
        female = 0;
    total = parseInt(male) + parseInt(female) + parseInt(1);
    $('#total').val(total);
    
    if($('#total').val() > parseInt(1))
    {
        var dataString = 'num=' + ($('#total').val() - parseInt(1));

        $.ajax({

            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_person',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            $('#optionearea1').html(html);
            } 
        });
        return false;
    } 
    else
    {
        $('#total').val(1);
        $('#optionearea1').html('');
        return false;
    }  
    
}

function rent(valu)
{
    if(valu == 111)
    {
        var dataString = 'valu=' + valu;

        $.ajax({

            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_person',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            $('#optionearea2').html(html);
            } 
        });
        return false;
    } 
    else
    {
        $('#optionearea2').html('');
        return false;
    }  
    
}

function social(social)
{
    if(social == 101)
    {
        var dataString = 'social=' + social;

        $.ajax({

            type:'post',
            url: '<?php echo base_url() ?>/dashboard/add_person',
            data:dataString,
            dataType: 'html',
            cache:false,
            success: function(html){
            $('#optionearea3').html(html);
            } 
        });
        return false;
    } 
    else
    {
        $('#optionearea3').html('');
        return false;
    }  
    
}


function summ()
{ 
    if($('#society').val() == '')
        $('#society').val(0);
    if($('#retard').val() == '')
        $('#retard').val(0);
    if($('#begger').val() == '')
        $('#begger').val(0);
    if($('#awqaf').val() == '')
        $('#awqaf').val(0);
    if($('#3waned').val() == '')
        $('#3waned').val(0);
    if($('#retirement').val() == '')
        $('#retirement').val(0);
    if($('#salary').val() == '')
        $('#salary').val(0);
    if($('#other').val() == '')
        $('#other').val(0);
    sum = parseInt($('#society').val()) + parseInt($('#retard').val()) + parseInt($('#begger').val()) + 
          parseInt($('#awqaf').val()) + parseInt($('#3waned').val()) + parseInt($('#retirement').val())
          + parseInt($('#salary').val()) + parseInt($('#other').val());
    
    $('#total2').val(sum); //.toFixed(2)
}

</script>

<script>

 function education(num1)
 {
    id= '#education' + num1;
    
    id2= '#type' + num1;
    
    if($(id2).val() == 1)
    {
        $(id).val('');
        $(id).attr("disabled", true);
        return false;
    } 
    else
    {
        $(id).attr("disabled", false);
        return false;
    }  
    
 }

</script>

<script>

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

</script>