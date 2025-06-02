<?php
class myCalculator
{
    private $num1, $num2;
    public function sumOf($num1, $num2){
        $this->$num1 = $num1;
        $this->$num2 = $num2;
        $sum = $num1 + $num2;
        return $sum;
    }

    public function diffOf($num1,$num2){
        $this->$num1 = $num1;
        $this->$num2 = $num2;
        $diff = $num1 - $num2;
        return $diff;
    }

    public function prodOf($num1,$num2){
        $this->$num1 = $num1;
        $this->$num2 = $num2;
        $prod = $num1 * $num2;
        return $prod;
    }

    public function division($num1,$num2){
        $this->$num1 = $num1;
        $this->$num2 = $num2;
        $quot = $num1 / $num2;
        return $quot;
    }

    
}
?>