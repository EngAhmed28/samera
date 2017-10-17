<?php

echo '<div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <label>القيمة السنوية</label>
                <input type="text" id="house_rent" name="house_rent" onkeypress="return isNumberKey(event)" class="form-control" placeholder="القيمة السنوية" required>
            </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <label>إسم المالك</label>
                <input type="text" id="house_owner" name="house_owner" class="form-control" placeholder="إسم المالك" required>
            </div>
        </div>
      </div>';

?>