<?php

    class Model {

        private $_database;

        function __construct($_database) {
            $this->_database = $_database;
        }

        function adminExist($username, $password) {
            try {
                $resultset = $this->_database->prepare("SELECT password FROM admin WHERE username = :username");
                $resultset->execute(array("username" => $username));
                if ($resultset->rowCount() > 0)
                    return password_verify($password, $resultset->fetch(PDO::FETCH_ASSOC)["password"]);
                else
                    return 0;
            }
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getCars($all) {
            try {
                $cars = $this->_database
                    ->query(($all ? "SELECT * FROM car" : "SELECT * FROM car WHERE isVisible = 1"))
                    ->fetchAll(PDO::FETCH_CLASS, "Car");
                $pictures = $this->_database
                    ->query("SELECT * FROM picture")
                    ->fetchAll(PDO::FETCH_CLASS, "Picture");
                foreach($pictures as &$picture) {
                    foreach($cars as &$car) {
                        if ($car->id == $picture->idCar) {
                            $car->pictures[] = $picture;
                            break;
                        }
                    }
                }
                return $cars;
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getCarById($id) {
            try {
                $resultset = $this->_database->prepare("SELECT * FROM car WHERE id = :id");
                $resultset->setFetchMode( PDO::FETCH_CLASS, 'Car');
                $resultset->execute(array("id" => $id));
                $car = $resultset->fetch();
                $car->pictures = $this->getPicturesByIdCar($id);
                return $car;
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function addCar() {
            try {
                $this->_database->query("INSERT INTO `car` VALUES ()");
                return $this->getCarById($this->_database->lastInsertId());
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function updateCar($attribute, $value, $id) {
            if (in_array($attribute, array('brand', 'model', 'year', 'mileage', 'idBodyType', 'idColor', 'price', 'description', 'isVisible'))) {
                try {
                    $this->_database
                        ->prepare("UPDATE car SET $attribute = :value WHERE id = :id")
                        ->execute(array('value' => $value, 'id' => $id));
                } 
                catch (PDOException $e) {
                    print $e->getMessage();
                }
            }
        }

        function removeCar($id) {
            try {
                $this->_database
                    ->prepare("DELETE FROM picture WHERE idCar = :idCar")
                    ->execute(array('idCar' => $id));
                $this->_database
                    ->prepare("DELETE FROM car WHERE id = :id")
                    ->execute(array( 'id' => $id));
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getPicturesByIdCar($id) {
            try {
                $resultset = $this->_database->prepare("SELECT * FROM picture WHERE idCar = :id");
                $resultset->execute(array('id'=>$id));
                return $resultset->fetchAll(PDO::FETCH_CLASS, "Picture");
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getPictureById($id) {
            try {
                $resultset = $this->_database->prepare("SELECT * FROM picture WHERE id = :id");
                $resultset->setFetchMode( PDO::FETCH_CLASS, 'Picture');
                $resultset->execute(array("id" => $id));
                return $resultset->fetch();
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function uploadPicture($idCar, $file_extension, $tempPath, $relativePath){
            try {
                $this->_database->query("   INSERT INTO `picture`(`id`, `idCar`, `isHeader`, `filename`) 
                                                SELECT 
                                                    id, 
                                                    idCar,
                                                    (SELECT NOT COUNT(id) FROM `picture` WHERE `idCar` = p.idCar AND isHeader = 1), 
                                                    CONCAT('c', idCar, '-',id,'.$file_extension')
                                                    FROM 
                                                        (SELECT IFNULL(MAX(id), 0)+1 'id', $idCar 'idCar' FROM `picture`) p");
                $picture = $this->getPictureById($this->_database->lastInsertId());
                move_uploaded_file(
                    $tempPath,
                    $relativePath."c$idCar-$picture->id.$file_extension"
                );
                return $picture;
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function removePicture($picture, $relativePath){
            try {
                $this->_database
                    ->prepare("DELETE FROM picture WHERE id = :id")
                    ->execute(array("id" => $picture->id));
                unlink($relativePath.$picture->filename);
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getBodyTypes() {
            try {
                $bodyTypes = $this->_database
                    ->query("SELECT * FROM bodytype")
                    ->fetchAll(PDO::FETCH_CLASS, "BodyType");
                return $bodyTypes;
            } 
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function getColors() {
            try {
                $colors = $this->_database
                    ->query("SELECT * FROM color")
                    ->fetchAll(PDO::FETCH_CLASS, "Color");
                return $colors;
            }
            catch (PDOException $e) {
                print $e->getMessage();
            }
        }
    }
?>
