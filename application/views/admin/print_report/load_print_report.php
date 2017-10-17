<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 8px;
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asisst/layout' ?>/bootstrap-arabic.min.css">
<?php

if((isset($records)&&$records!=null)){
    echo '<div class="head" id="printdiv">
        <div class="container">
            <div class="col-xs-12">
                <h5 class="text-center" style="margin-top:25px; margin-right: 86px;"><b> بسم الله الرحمن الرحيم </b></h5>
                <div class="col-xs-4">
                    <h5 class="text-center" style="margin-top:0px; margin-bottom:5px;"> المملكة العربية السعودية </h5>
                    <h5 class="text-center" style="margin-top:0px; margin-bottom:5px;"> حائل مدينة سميراء   </h5>
                    <h4 class="text-center" style="margin-top:0px; margin-bottom:5px;"><b> الجمعية الخيرية بمحافظة سميراء   </b> </h4>
                    <h5 class="text-center" style="margin-top:0px; margin-bottom:5px;">تحت اشراف وزارة الشؤون الاجتماعية  </h5>
                </div>
                <div class="col-xs-5">
                    <h4 class="text-center"><b>'.$address.'</b></h4>
                </div>
                <div class="col-xs-3">
                    <img src="'.base_url('uploads/images/'.$debaga[0]->logo.'').'" alt="" width="50%" height="70px;" class="pull-right">
                </div>
            </div>
            <div class="col-xs-12">
                <table style="width:100%">
                    <tr>
                        <th class="text-center"> م </th>
                        <th class="text-center"> الاسم </th>
                        <th class="text-center"> الفئة </th>
                        <th class="text-center"> السكن </th>
                        <th class="text-center" colspan="3" style="padding:0;"> عددالافراد
                            <table style="width:100%;  margin:0; border:none; border-top:1px solid #000">
                                <td style="width:33%; border:none ; border-left:1px solid #000;">ذكر </td>
                                <td style="width:34%; border:none;  border-left:1px solid #000;">انثي </td>
                                <td style="border:none">مجموع</td>
                            </table>
                        </th>
                        <th class="text-center"> ملاحظات </th>
                        <th class="text-center"> الاسم </th>
                        <th class="text-center"> توقيع الاستلام </th>
                    </tr>';

    for($x = 0 ; $x < count($records) ; $x++){
        if($records[$x]->gender == 1){
            $male = $records[$x]->male_num+1;
            $female = $records[$x]->femal_num;
        }
        else{
            $male = $records[$x]->male_num;
            $female = $records[$x]->femal_num+1;
        }
        echo '<tr>
                        <td class="text-center">'.($x+1).'</td>
                        <td class="text-center">'.$records[$x]->name.'</td>
                        <td class="text-center">'.$define[$records[$x]->benefit]->title.'</td>
                        <td class="text-center"> '.$define[$records[$x]->place]->title.' </td>
                        <td class="text-center">'.$male.'</td>
                        <td class="text-center">'.$female.'</td>
                        <td class="text-center">'.($female+$male).'</td>
                        <td class="text-center"> </td>
                        <td class="text-center"> </td>
                        <td class="text-center"> </td>
                    </tr>';
    }

    echo '</table>
            </div>
            <div class="col-xs-12" style="border-top:1px solid #666; margin-top:50px;">
                <div class="col-xs-8">
                    <h5 class="text-center"><b> اعضاء اللجنة </b></h5>
                    <div class="col-xs-6">
                        <h5 class="text-center"> مجزع بن خليفة الصفيه </h5>
                        <h5 class="text-center"> .......................................... </h5>
                    </div>
                    <div class="col-xs-6">
                        <h5 class="text-center"> مانع  سالم الشبرمي  </h5>
                        <h5 class="text-center"> .......................................... </h5>
                    </div>
                </div>
                <div class="col-xs-4">
                    <h5 class="text-center"><b> رئيس اللجنة </b></h5>
                    <h5 class="text-center">    حسين جار الله الشبرمي  </h5>
                    <h5 class="text-center"> .......................................... </h5>
                </div>
            </div>
        </div>
    </div>';
}
else//{
    //$this->load->view('admin/requires/header');
    echo '<br><br><br><br><div id="printdiv" class="alert alert-warning alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>تنبية!</strong> لا توجد نتائج للبحث
          </div>';
//$this->load->view('admin/requires/sidebar');
//$this->load->view('admin/requires/footer');
//}

?>



<script>
    //Get the HTML of div
    var divElements = document.getElementById("printdiv").innerHTML;
    //Get the HTML of whole page
    var oldPage = document.body.innerHTML;
    //Reset the page's HTML with div's HTML only
    document.body.innerHTML =
        "<html><head><title></title></head><body><div id='printdiv'>" +
        divElements + "</div></body>";
    //Print Page
    window.print();
    //Restore orignal HTML
    // document.body.innerHTML = oldPage;
    setTimeout(function () {location.replace("<?php echo base_url('dashboard/print_report')?>");}, 500);
</script>
