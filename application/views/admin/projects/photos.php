<?php
$numtel = $_POST['num'];
if($numtel>10){
    echo '<div class="alert alert-danger" >
              أقصى عدد 10
              </div>';
}
elseif($numtel<=10)
{
    for($i=1;$i<=$numtel;$i++){
        echo'<div class="col-md-4"><input type="file" name="img'.$i.'" class="form-control"   required="required" placeholder="الصورة  '.$i.'"/></div>';
    }
}
?>
