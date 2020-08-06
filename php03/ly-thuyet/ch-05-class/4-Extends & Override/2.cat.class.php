<?php
// 1
// final class Cat{
    // Methods
    //Cách 5: __construct() với tham số là mảng
//     public function __construct($arrayInfo){
//         $this->name   = $arrayInfo['name'];
//         $this->color  = $arrayInfo['color'];
//         $this->age    = $arrayInfo['age'];
//         $this->weight = $arrayInfo['weight'];
//     }

    
//     public function showInfo(){
//         echo '<br>Name: ' . $this->name;
//         echo '<br>Color: ' . $this->color;
//         echo '<br>Age: ' . $this->age;
//         echo '<br>Weight: ' . $this->weight;
//         echo '<hr>';
//     }
// }

// 2
// class Cat{
final class Cat{

    // Methods
    //Cách 5: __construct() với tham số là mảng
    public function __construct($arrayInfo){
        $this->name   = $arrayInfo['name'];
        $this->color  = $arrayInfo['color'];
        $this->age    = $arrayInfo['age'];
        $this->weight = $arrayInfo['weight'];
    }

    
    public function showInfo(){
    // final public function showInfo(){

        echo '<br>Name: ' . $this->name;
        echo '<br>Color: ' . $this->color;
        echo '<br>Age: ' . $this->age;
        echo '<br>Weight: ' . $this->weight;
        echo '<hr>';
    }
}

