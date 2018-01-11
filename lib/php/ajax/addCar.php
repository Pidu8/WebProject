<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        View::formattedCar($model->addCar(), $model->getBodyTypes(), $model->getColors());
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }

