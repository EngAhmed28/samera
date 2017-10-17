<?php

echo '<div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <label>إسم الولي الشرعي</label>
                <input type="text" id="orphan_name" name="orphan_name" class="form-control" placeholder="إسم الولي الشرعي" required>
            </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <label>إرفاق الإثبات</label>
                <input type="file" id="orphan_prove" name="orphan_prove" class="form-control" accept="image/*" required>
            </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <br />
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="radio" id="orphan_propety" name="orphan_propety" value="6" required><label>مالك</label>
                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                <input type="radio" id="orphan_propety" name="orphan_propety" value="7" required><label>مستأجر</label>
                
            </div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="layout">
            <div class="form-group">
                <label>الإيجار</label>
                <input type="text" id="orphan_propety_rent" onkeypress="return isNumberKey(event)" name="orphan_propety_rent" placeholder="الإيجار السنوي" class="form-control" >
            </div>
        </div>
      </div>';

?>