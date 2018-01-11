<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    try {
        $pictures = $model->getPicturesByIdCar($_POST['id']);
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
    
    foreach($pictures as $picture) {
        View::formattedPicture($picture);
    }
 ?>
<div class="col-md-4 p-3 text-center">
    <label class="btn btn-primary" for="file">
        <input type="file" id="file" style="display:none;">
        Insérer
    </label>
</div>
