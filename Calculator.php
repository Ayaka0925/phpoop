<?php

class Calculator{
    public $value1;
    public $value2;
    public $operator;

    public function setValues($value1, $value2, $operator){
        $this->value1 = $value1;
        $this->value2 = $value2;
        $this->operator = $operator; 
    }

    public function getValue1() {
        return $this->value1;
    }

    public function getValue2() {
        return $this->value2;
    }

    public function getOperator() {
        return $this->operator;
    }

    public function getAnswer() {
        if ($this->operator=="-") {
            return $this->value1 - $this->value2;
        } else if ($this->operator=="+") {
            return $this->value1 + $this->value2;
        } else if ($this->operator=="*") {
            return $this->value1 * $this->value2;
        } else {
            return $this->value1 / $this->value2;
        }
    }
}

?>