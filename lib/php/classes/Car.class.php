<?php

class Car {
    public $id;
    public $brand;
    public $model;
    public $year;
    public $mileage;
    public $idBodyType;
    public $idColor;
    public $price;
    public $description;
    public $isVisible;
    public $pictures = array();

    function getHeaderPicture () {
        foreach ($this->pictures as $picture) {
            if ($picture->isHeader)
                return $picture;
        }
    }
}
