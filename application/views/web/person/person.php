
<?php $this->load->view('web/requires/header2'); ?>
<section class="program">
    <div class="container">
        <div class="content">
            <div class="cont-new-m">
           <?php echo form_open_multipart('web/add_person',array('class'=>"form-horizontal",'role'=>"form" ))?>    
                        <legend>إضافة تعريف عن طالب المساعدة</legend>
                        <div class="form-group">
                            <label for="select" class="col-lg-2 control-label">  إسم طالب المساعدة:   </label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="name" name="name" class="form-control  " placeholder="إسم طالب المساعدة" required="">
                            </div>
                            <label for="inputUser" class="col-lg-2 control-label">تاريخ الميلاد:</label>
                            <div class="col-lg-4 input-grup">
                              <input type="text" id="popupDatepicker"  name="birth_date" class="form-control  " placeholder="تاريخ الميلاد" required>
                  </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">  النوع: </label> 
                            <input type="radio" name="gender" value="1" required=""> ذكر
                            <input type="radio" name="gender" value="2" required="">  أنثى
                        </div>
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">الجوال:</label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="mobile" name="mobile" class="form-control  " placeholder="الجوال" onkeypress="return isNumberKey(event)" required="">
                            </div>
                            <label for="inputUser" class="col-lg-2 control-label">هاتف المنزل:</label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="home_phone" name="home_phone" class="form-control  " onkeypress="return isNumberKey(event)" placeholder="هاتف المنزل">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">المهنة:</label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="job" name="job" class="form-control  " placeholder="المهنة">
                            </div>
                            <label for="inputUser" class="col-lg-2 control-label">مكان العمل:</label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="job_place" name="job_place" class="form-control  " placeholder="مكان العمل">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">هاتف العمل:</label>
                            <div class="col-lg-4 input-grup">
                                <input type="text" id="job_phone" name="job_phone" class="form-control  " onkeypress="return isNumberKey(event)" placeholder="هاتف العمل">
                            </div>
                            <label for="inputUser" class="col-lg-2 control-label">نوع المستفيد:</label>
                            <div class="col-lg-4 input-grup">
                                <select name="benefit" id="benefit" class="form-control" required="">
                                    <option value="">--قم بالإختيار--</option>
                                    <option value="53">أسرة فقيرة</option><option value="54">أيتام</option><option value="55">أرملة</option><option value="56">مطلقة</option><option value="57">معلقة أو مهجورة</option><option value="58">معاق</option><option value="59">كبير السن</option><option value="60">أسرة سجين</option><option value="61">أخرى</option>                </select>
                                </div>
                <!--label for="inputUser" class="col-lg-2 control-label">مكان السكن:</label>
                <div class="col-lg-4 input-grup">
                <select name="place" id="place" class="form-control" required>
                <option value="">--قم بالإختيار--</option>
                                <!--/select>
                            </div-->
                        </div>
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">مكان السكن:</label>
                            <div class="col-lg-4 input-grup">
                                <select name="place" id="place" class="form-control" required="">
                                    <option value="">--قم بالإختيار--</option>
                                    <option value="1">سميراء</option><option value="8">الرفايع</option><option value="9">حريد</option><option value="12">وسيط</option><option value="4">كتيفة</option><option value="11">الغانمية</option><option value="14">الجابرية</option><option value="13">وتده</option><option value="5">حمراء القعساء</option><option value="6">القعساء</option><option value="7">الصفران</option><option value="3">مشاش ابن جازي</option><option value="2">غسل</option><option value="17">غمرة</option><option value="18">عقلة اللبن</option><option value="10">الدريعاء</option><option value="16">الحمودية</option><option value="15">الديماسة</option><option value="19">بادية سميراء</option><option value="20">أخرى</option>                </select>
                                </div>
                <!--label for="inputUser" class="col-lg-2 control-label">السكن: مدينة/قرية:</label>
                <div class="col-lg-4 input-grup">
                <i class="fa fa-home"></i>
                    <input type="text" id="town"  name="town" class="form-control  " placeholder="السكن" required>
                </div-->
                <label for="inputUser" class="col-lg-2 control-label">الحي:</label>
                <div class="col-lg-4 input-grup">
                    <input type="text" id="neighborhood" name="neighborhood" class="form-control  " placeholder="الحي" required="">
                </div>
            </div>
            <div class="form-group">
                <label for="inputUser" class="col-lg-2 control-label">نوع السكن:</label>
                <div class="col-lg-4 input-grup">
                    <select name="house_state" id="house_state" onchange="return rent($('#house_type').val());" class="form-control" required="">
                        <option value="">--قم بالإختيار--</option>
                        <option value="23">بيت شعبي</option><option value="24"> بيت شعر وخيام</option><option value="51">أخرى</option><option value="90">فيلا </option><option value="113">شقة</option>                </select>
                    </div>
                    <label for="inputUser" class="col-lg-2 control-label">حالة السكن:</label>
                    <div class="col-lg-4 input-grup">
                        <select name="house_type" id="house_type" onchange="return rent($('#house_type').val());" class="form-control" required="">
                            <option value="">--قم بالإختيار--</option>
                            <option value="47">مع الأسرة</option><option value="48">أخرى</option><option value="111">مستأجر</option><option value="112">ملك</option>                </select>
                        </div>
                    </div>
                    <div id="optionearea2"></div>
                    <div class="form-group">
                        <label for="inputUser" class="col-lg-2 control-label">الحالة الصحية:</label>
                        <div class="col-lg-10 input-grup">
                            <select name="health_state" id="health_state" class="form-control" required="">
                                <option value="">--قم بالإختيار--</option>
                                <option value="49">سليم</option><option value="104">اخرى</option><option value="105">كفيف</option><option value="107">معاق</option><option value="109">مريض</option><option value="110">كبير سن</option>                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputUser" class="col-lg-2 control-label">الحالة الإجتماعية:</label>
                            <div class="col-lg-10 input-grup">
                                <select name="social_status" id="social_status" onchange="return social($('#social_status').val());" class="form-control" required="">
                                    <option value="">--قم بالإختيار--</option>
                                    <option value="25">معلقة</option><option value="26">متزوج</option><option value="50">أخرى</option><option value="99">مهجوره</option><option value="100">أرملة</option><option value="101">أيتام</option><option value="102">مطلقة</option><option value="103">اعزب</option>                </select>
                                </div>
                            </div>
                            <div id="optionearea3"></div>
            <!--div class="form-group" >
                <label for="inputUser" class="col-lg-2 control-label">أخرى:</label>
                <div class="col-lg-10 input-grup">
                <i class="fa fa-list"></i>
                <input type="text" id="other_person"  name="other_person" class="form-control  " placeholder="أخرى" >
                </div>
            </div>
            <div class="form-group" -->
                <!--/div-->
                <div class="form-group">
                    <label for="inputUser" class="col-lg-1 control-label"> السجل المدني:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="card_num" maxlength="10" minlength="10" name="card_num" onkeypress="return isNumberKey(event)" class="form-control  " placeholder="رقم السجل المدني" required="">
                    </div>
                    <label for="inputUser" class="col-lg-1 control-label">تاريخه:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="popupDatepicker2"  name="card_date" class="form-control  " placeholder="تاريخه" required>
                    </div>
                    <label for="inputUser" class="col-lg-1 control-label">مصدره:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="card_source" name="card_source" class="form-control  " placeholder="مصدره" required="">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUser" class="col-lg-1 control-label">الأفراد:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="total" value="1" name="total" class="form-control  " placeholder="" readonly="">
                    </div>
                    <label for="inputUser" class="col-lg-1 control-label">ذكور:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="male_num" name="male_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="ذكور">
                    </div>
                    <label for="inputUser" class="col-lg-1 control-label">إناث:</label>
                    <div class="col-lg-3 input-grup">
                        <input type="text" id="femal_num" name="femal_num" onkeypress="return isNumberKey(event)" onkeyup="return calc($('#male_num').val(),$('#femal_num').val());" class="form-control  " placeholder="إناث">
                    </div>
                </div>
                <div id="optionearea1"></div>
                <div class="form-group">
                    <table id="no-more-tables" style="width:100%;" class="table table-bordered" role="table">
                        <thead>
                            <tr>
                                <th class=" ">نوع الدخل</th>
                                <th class=" ">مقداره</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class=" ">ضمان إجتماعي</th>
                                <td><input type="number" id="society" onkeyup="return summ();" name="society" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">رعاية المعاقين</th>
                                <td><input type="number" id="retard" name="retard" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">مكافحة التسول</th>
                                <td><input type="number" id="begger" name="begger" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">الأوقاف</th>
                                <td><input type="number" id="awqaf" name="awqaf" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">خرجية(عوائد)</th>
                                <td><input type="number" id="3waned" name="3waned" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">تقاعد</th>
                                <td><input type="number" id="retirement" name="retirement" onkeyup="return summ();" value="0" min="0" class="form-control text-center"></td>
                            </tr>
                            <tr>
                                <th class=" ">الراتب الشهري</th>
                                <td><input type="number" id="salary" name="salary" class="form-control text-center" onkeyup="return summ();" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th class=" ">أخرى</th>
                                <td><input type="number" id="other" name="other" class="form-control text-center" onkeyup="return summ();" value="0" min="0"></td>
                            </tr>
                            <tr>
                                <th class=" ">الإجمالــــي</th>
                                <td><input type="number" id="total2" name="total2" class="form-control text-center" readonly=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-xs-10 col-xs-pull-2">
                        <input type="submit" name="add_person" value="حفظ" class="btn btn-primary">
                    </div>
          
    </div>
      <?php echo form_close()?>
</div>
</div>
</section>








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
            url: '<?php echo base_url() ?>/web/add_person',
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
    if(valu == 7)
    {
        var dataString = 'valu=' + valu;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/web/add_person',
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
    if(social == 16)
    {
        var dataString = 'social=' + social;
        $.ajax({
            type:'post',
            url: '<?php echo base_url() ?>/web/add_person',
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

<?php $this->load->view('web/requires/footer_person'); ?>
