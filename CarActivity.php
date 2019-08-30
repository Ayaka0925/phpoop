<?php

class CarActivity {

    //set the properties
    public $brand;
    public $model;
    public $color;

    //constructor - automatically run once you create an object
    public function __construct($name){
        echo "Hello World! I'm $name";
    }

    //create the method to set the values for the properties
    public function setValues($brand, $model, $color) {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    public function getBrand() {
        return $this->brand;
    }

    public function getModel() {
        return $this->model;
    }
    public function getColor() {
        return $this->color;
    }

}