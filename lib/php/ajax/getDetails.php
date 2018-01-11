<?php
    require '../requirements.php';
    
    try {
        View::formattedDetails($model->getCarById($_POST['id']));
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
 ?>
