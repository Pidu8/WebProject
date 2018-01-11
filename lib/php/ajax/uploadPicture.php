<?php
    require '../requirements.php';
    beAdmin("../../../admin/");

    if(isset($_FILES["file"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png");
        $file_extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg"))
        && in_array($file_extension, $validextensions)) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Return Code: ". $_FILES["file"]["error"];
            }
            else {
                try {
                    View::formattedPicture(
                        $model->uploadPicture(
                            $_POST['idCar'], 
                            $file_extension, 
                            $_FILES['file']['tmp_name'], 
                            "../../img/cars/"
                        )
                    );
                } 
                catch (Exception $e) {
                    print $e->getMessage();
                }
            }
        }
        else {
            echo "Invalid file Size or Type";
        }
    }
    
?>