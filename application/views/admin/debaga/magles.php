
<style>
    .r-head .container {
        border: 2px solid #333;
        width: 100%;
    }
    
    h2 {
        margin-top: -30px;
    }
    
    .col-xs-1,
    .col-xs-2 {
        padding: 0;
    }
    
    .line,
    .line-two {
        margin-top: 2px;
        border-bottom: 2px dashed black;
        width: 74%;
        margin-right: 120px;
    }
    
    img {
        margin-top: 10px;
    }
</style>

    <div class="r-head col-xs-12">
        <div class="container">
            <!--div class="col-xs-12">
                <div class="col-xs-6">
                    <h6>الجمعية الخيرية بمحافظة سميراء</h6>
                    <h6> تحت اشراف وزارة الشؤون الاجتماعية </h6>
                    <h6> تأسست عام 1424هـ رقم التسجيل (287)</h6>
                </div>
                <div class="col-xs-4"></div>
                <div class="col-xs-2">
                    <img src="img/Saudi-Arabia-State-vector-logo.png" alt="" width="200px" height="70px">
                </div>
            </div-->
            
            <?php 
 $this->load->view('admin/debaga/header');
    ?>
            
            <div   class="hidden-print">
      <button onClick="javascript:window.print()" class="btn btn-sm  btn-success hidden-print" > 
      <span class="glyphicon glyphicon-print"></span> طباعة </button>
      </div>
            
            
            <div class="col-xs-12">
                <div class="col-xs-4"></div>
                <div class="col-xs-5">
                    <h6 class="text-center"><b> <u>نتيجة البحث وقرار مجلس الادارة</u></b></h6></div>
                <div class="col-xs-3"></div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3"></div>
                <div class="col-xs-3">
                    <h6 class="text-center"> اجتماع رقم ( ....... )</h6>
                </div>
                <div class="col-xs-3">
                    <h6 class="text-center">  في  .... / .... / .. 14هـ </h6>
                </div>
                <div class="col-xs-3">
                    <h6 class="text-center">  رقم الملف ( ....... )</h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-1">
                    <h6 class="text-right"> الحالة : </h6>
                </div>
                <div class="col-xs-2">
                    <h6 class="text-right"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span>أسرة فقيرة
                  </h6>
                </div>
                <div class="col-xs-1">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> أيتام
                  </h6>
                </div>
                <div class="col-xs-1">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> أرملة
                  </h6>
                </div>
                <div class="col-xs-1">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> مطلقة
                  </h6>
                </div>
                <div class="col-xs-1">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> معاق
                  </h6>
                </div>
                <div class="col-xs-2">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> مريض نفسي
                  </h6>
                </div>
                <div class="col-xs-1">
                    <h6 class="text-center"><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> أعزب
                  </h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <h6> اسم المستفيد : <span> ........................ </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  رقم السجل المدني : <span> .................. </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  تاريخ الميلاد  : <span> ............. 1 هـ </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6> العمر : <span>( .........)  سنة </span></h6>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <h6> عدد افراد الاسرة : <span> (................) </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6> متوسط دخل الفرد : <span> (..........) ريال</span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  تقرير طبي : <span><i class="fa fa-circle-thin" aria-hidden="true">
                    
                    </i></span>
                  يوجد <span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    لا يوجد </span></h6>
                </div>
                <div class="col-xs-3">
                    <h6>  السكن : <span> ..................... </span></h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-6">
                    <h6>  رأي الباحث الاجتماعي : <span> .........................................................</span> </h6>
                </div>
                <div class="col-xs-3">
                    <h6>  الاسم : حمد عبدالله ناصر الشبرمي</h6>
                </div>
                <div class="col-xs-3">
                    <h6> التوقيع : <span> ...........................</span> </h6>
                </div>

            </div>
            <div class="col-xs-12">
                <div class="line"></div>
                <div class="line-two"></div>
            </div>
            <div class="col-xs-12">
                <h6> <b>بعد الاطلاع والمناقشة والدراسة لكامل ملف المذكور أعلاه فان مجلس الادارة قرر ما يلي </b></h6>
                <div class="col-xs-12 ">
                    <div class="col-xs-12">
                        <h6><span><i class="fa fa-square-o" aria-hidden="true"></i>
                        </span> يستحق الدعم النقدي والعيني من الفئة</h6>
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="col-xs-4">
                        <h6><span><i class="fa fa-square-o" aria-hidden="true"></i>
                        </span> يستحق الدعم العيني فقط من الفئه </h6>
                    </div>
                    <div class="col-xs-8">
                        <div class="col-xs-1">
                            <h6><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> أ
                  </h6>
                        </div>
                        <div class="col-xs-1">
                            <h6><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> ب
                  </h6>
                        </div>
                        <div class="col-xs-1">
                            <h6><span><i class="fa fa-circle-thin" aria-hidden="true"></i>
                    </span> ج 
                  </h6>
                        </div>



                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="col-xs-12">
                        <h6><span><i class="fa fa-square-o" aria-hidden="true"></i>
                        </span> يستحق الدعم النقدي والعيني من الفئة</h6>
                        <h6>........................................................................
                        <br>........................................................................</h6>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-1 text-center">
                    <h6> رئيس المجلس </h6>
                    <h6> ................ </h6>
                    <h6> محمد سالم الشبرمي </h6>
                </div>
                <div class="col-xs-2 text-center">
                    <h6> النائب </h6>
                    <h6> ................ </h6>
                    <h6> حسين جارالله الشبرمي </h6>
                </div>
                <div class="col-xs-1 text-center">
                    <h6> الامين العام</h6>
                    <h6> ................ </h6>
                    <h6> مجزع خليفة الصقية </h6>
                </div>
                <div class="col-xs-2 text-center">
                    <h6> أمين الصندوق </h6>
                    <h6> ................ </h6>
                    <h6> إبراهيم عبدالمحسن الجلعود  </h6>
                </div>
                <div class="col-xs-1 text-center">
                    <h6>  عضو </h6>
                    <h6> ................ </h6>
                    <h6> رشيد عبدالرحمن الشبرمي </h6>
                </div>
                <div class="col-xs-1 text-center">
                    <h6>  عضو </h6>
                    <h6> ................ </h6>
                    <h6> مانع سالم الشبرمي </h6>
                </div>
                <div class="col-xs-1 text-center">
                    <h6>  عضو </h6>
                    <h6> ................ </h6>
                    <h6> رشيد راشد الشبرمي </h6>
                </div>
                <div class="col-xs-1 text-center">
                    <h6>  عضو </h6>
                    <h6> ................ </h6>
                    <h6> سلمان عيسي الحربي </h6>
                </div>
                <div class="col-xs-2 text-center">
                    <h6>  عضو </h6>
                    <h6> ................ </h6>
                    <h6> عبدالعزيز عبدالمحسن الجلعود </h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-7"></div>
                <div class="col-xs-5">
                    <h6> سجل في الحاسب الالي بتاريخ : <span> .... / ..... / .. 14هـ </span></h6>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="col-xs-7"></div>
                <div class="col-xs-3">
                    <h6 class="r-h6"> الاسم : <span> ............... </span></h6>
                </div>
                <div class="col-xs-2">
                    <h6 class="r-h6"> التوقيع : <span> ............... </span></h6>
                </div>
            </div>
        </div>
    </div>
