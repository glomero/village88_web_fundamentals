<?php 
    class Character{
        public $name;
        public $health = 100;
        public $stamina = 100;
        public $manna = 100;

        public function __construct($name){
            $this->name = $name;
        }

        public function walk(){
            $this->stamina -= 1;
        }

        public function run(){
            $this->stamina -= 3;
        }

        public function showStats(){
            echo "Name: " . $this->name . "<br>";
            echo "Health: " . $this->health . "<br>";
            echo "Stamina: " . $this->stamina . "<br>";
            echo "Manna: " . $this->manna . "<br><br>";

        }

    }
    $character = new Character("Character");

    $character->walk();
    $character->walk();
    $character->walk();
    $character->run();
    $character->run(); 
    $character->showStats();
    //Now for the first instance of Character (instance called 'character '), try calling a method 'heal' or 'slash' and make sure it doesn't work. :)
    // try{
    //     $character->heal();
    // }catch (Exception $error){
    //     echo "Heal is not available for this character class.<br>";

    // }
    // try{
    //     $character->slash()
    // }catch (Exception $error){
    //     echo "Slash is not availble for this character class.<br>";
    // }

    //shaman character
    class Shaman extends Character{
        public $health = 150;

        public function heal(){
            $this->health += 5;
            $this->stamina += 5;
            $this->manna += 5;
        }
    }
    //intanciate the shaman
    $shaman = new Shaman("Shaman");
    $shaman->walk();
    $shaman->walk();
    $shaman->walk();
    $shaman->run();
    $shaman->run();
    $shaman->heal();
    $shaman->showStats();

    class Swordsman extends Character{
        public $health = 170; //default health

        public function slash(){ //slash method
            $this->manna -= 10; //if slash manna will decrease to 10 
            
        }
        public function showStats(){
            echo "I am powerful!<br>";
            parent::showStats();
        }

    }

    $swordsman = new Swordsman("Swordsman");
    $swordsman->walk();
    $swordsman->walk();
    $swordsman->walk();
    $swordsman->run();
    $swordsman->run();
    $swordsman->slash();
    $swordsman->slash();
    $swordsman->showStats();

    
?>