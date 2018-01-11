<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        echo $model->getCarById($_POST['id'])->description;
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
 ?>
