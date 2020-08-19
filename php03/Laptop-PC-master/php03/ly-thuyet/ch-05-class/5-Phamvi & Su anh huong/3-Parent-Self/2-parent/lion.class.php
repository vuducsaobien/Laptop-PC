<?php
require_once 'cat.class.php';
// 1
// class Lion extends Cat{
// }

// 2 Đổi maxSpeed từ 20km/h áng 50km/h !!! FIRST
// // Properties
// class Lion extends Cat{
//     public $maxSpeed = '50km/h';
// }


// 3 FIRST Override (Ghi đè) public function showInfo(){ của Lion Lên Cat
    //Properties
    class Lion extends Cat{
    public $maxSpeed = '50km/h';



// 3 Cách 1

// public function showInfo(){
//     echo '<br>Name: ' . $this->name;
//     echo '<br>Color: ' . $this->color;
//     echo '<br>Age: ' . $this->age;
//     echo '<br>Weight: ' . $this->weight;
//     echo '<br>max Speed $this: ' . $this->maxSpeed;
//     echo '<br>Con Sư Tử';
// }



// 3 Cách 2

//    public function showInfo(){
//     parent::showInfo();
//     echo '<br>Con Sư Tử';
// }



//  3 Cách 3

public function showInfo(){
    echo '<br>Name: ' . parent::getName();
    echo '<br>Color: ' . parent::getColor();
    echo '<br>Age: ' . parent::getAge();
    echo '<br>Weight: ' . parent::getWeight();
    echo '<br>max Speed parent: ' . $this->maxSpeed;
    echo '<br>Con Sư Tử';
    }
        

}


