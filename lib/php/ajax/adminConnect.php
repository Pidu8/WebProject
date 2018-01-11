<?php
    require '../requirements.php';

    try {
        if($model->adminExist($_POST["username"], $_POST['password']) == 1)
            $_SESSION['admin'] = 1;
    } 
    catch (Exception $e) {
        print $e->getMessage();
    }
    echo isset($_SESSION['admin']);

