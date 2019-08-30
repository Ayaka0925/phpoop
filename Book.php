<?php

class Book{

    public $author;
    public $title;
    public $date;
    public $summary;
    public $price;
    public $quantity;

    public function setValues($author, $title, $date, $summary, $price, $quantity){

    //create the method to set the values for the properties
        $this->author = $author;
        $this->title = $title;
        $this->date = $date;
        $this->summary = $summary;
        $this->price = $price;
        $this->quantity = $quantity;
  
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getDate() {
        //convert the date into a php timestamp
        $myDate = strtotime($this->date);

        //convert the timestamo inte date format that you want
        $date = date("m d, Y",$myDate);
        //大文字使うか小文字使うかで表示変わる
        //M d,y h:i:s:a


        //return the converted date
        return $date;
    }
    public function getSummary() {
        return $this->summary;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getQuantity() {
        return $this->quantity;
    }
    public function getTotalprice() {
        return $this->price*$this->quantity;
    }
}