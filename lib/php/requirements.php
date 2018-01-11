<?php
    session_start();

    function findFile($filename, $possiblePaths) {
        foreach($possiblePaths as $path){
            $fullpath = $path.$filename;
            if(file_exists($fullpath))
                return $fullpath;
        }
    }

    function findPhpFile($relativePath) {
        return findFile($relativePath.".php", array('lib/php/', '../lib/php/', '../'));
    }

    function autoload($className) {
        require findPhpFile('classes/'.$className.".class");
    }

    function beAdmin(){
        if (!isset($_SESSION['admin'])) {
            header('Location:'.findFile("connexion.php", array('admin', '../../../admin/', '')));
            exit();
        }
    }

    spl_autoload_register('autoload');

    require findPhpFile('credentials/database.credential');

    try {
        $model = new Model(Database::getInstance($dsn, $user, $pass));
    }
    catch (Exception $e) {
        print $e->getMessage();
    }
?>