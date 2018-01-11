<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        $model->updateCar($_POST['attribute'], $_POST['value'], $_POST['id']);
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }

