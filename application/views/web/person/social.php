<?php

echo '<div class="form-group" >

<label for="inputUser" class="col-lg-2 control-label">إسم الولي الشرعي:</label>
                
                <div class="col-lg-4 input-grup">

               
                    <input type="text" id="orphan_name" name="orphan_name" class="form-control text-right" placeholder="إسم الولي الشرعي" required>
                </div>
                
                <label for="inputUser" class="col-lg-2 control-label">إرفاق الإثبات:</label>
                
                <div class="col-lg-4 input-grup">

                    <input type="file" id="orphan_prove" name="orphan_prove" class="form-control text-right" accept="image/*" required>
                </div>
                
                </div>
                
                <div class="form-group" >
                
                
                <div class="col-lg-1 input-grup text-right" style="padding-top:8px;">

                    <input type="radio" id="orphan_propety" name="orphan_propety" class="" value="6" required>
                </div>
                <label for="inputUser" class="col-lg-3 control-label" style="text-align: right;">مالك</label>
                
                <div class="col-lg-1 input-grup text-right" style="padding-top:8px;">

                    <input type="radio" id="orphan_propety" name="orphan_propety"  class="" value="7" required>
                </div>
                <label for="inputUser" class="col-lg-3 control-label" style="text-align: right;">مستأجر</label>
                
                <label for="inputUser" class="col-lg-1 control-label">الإيجار:</label>
                <div class="col-lg-3 input-grup">
                

                    <input type="text" id="orphan_propety_rent" onkeypress="return isNumberKey(event)" name="orphan_propety_rent" placeholder="الإيجار السنوي" class="form-control " >
                </div>
                </div>
                ';

?>