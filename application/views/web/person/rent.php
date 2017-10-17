<?php

echo '<div class="form-group" >

<label for="inputUser" class="col-lg-2 control-label">القيمة السنوية:</label>
                
                <div class="col-lg-4 input-grup">

                
                    <input type="text" id="house_rent" name="house_rent" onkeypress="return isNumberKey(event)" class="form-control" placeholder="القيمة السنوية" required>
                </div>
                
                <label for="inputUser" class="col-lg-2 control-label">إسم المالك:</label>
                
                <div class="col-lg-4 input-grup">

               
                    <input type="text" id="house_owner" name="house_owner" class="form-control" placeholder="إسم المالك" required>
                </div>
                
                </div>';

?>