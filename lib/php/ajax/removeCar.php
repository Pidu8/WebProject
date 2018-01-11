<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        $model->removeCar($_POST['id']);
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
?>