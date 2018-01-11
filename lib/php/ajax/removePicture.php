<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        $picture = $model->getPictureById($_POST['id']);
        if ($picture != null)
            $model->removePicture($picture, "../../../");
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
?>