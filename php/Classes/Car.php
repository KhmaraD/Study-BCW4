<?php
require_once 'Point.php';
    class Car {
        private $fuelAmount;
        private $fuelCapacity;
        private $fuelConsumption;
        private $location;
        private $model;

        private function validate($value) {
            if ( is_numeric($value) ) {
                return $value;
            }
            throw new Exception("Invalid param");
        }

        public function __construct($fuelCapacity, $fuelConsumption, $location, $model, $fuelAmount) {
            $this->fuelCapacity = $this->validate($fuelCapacity);
            $this->fuelConsumption = $this->validate($fuelConsumption);
            $this->location = $location;
            $this->model = $model;
            $this->fuelAmount = $this->validate($fuelAmount);
        }

        public function __get($name) {
                return $this->$name;
        }

        public function drive(Point $destination) {
            $fuelNeed = $this->location->distance($destination) * $this->fuelConsumption;
            
            if ( $fuelNeed > $this->fuelAmount ) {
                throw new Exception ("Need more fuel");
            }

            $this->fuelAmount-=$fuelNeed;
            $this->location = $destination;
        }
        
        public function refill($fuel) {
            $newFuel = $this->fuelAmount + validate($fuel);
            
            if ( $newFuel > $this->fuelCapacity ) {
                throw new Exception ("ToMuchFuel");
            }
            
            $this->fuelAmount = $newFuel;
        }

        public function __toString() {
            return sprintf("(fuel Capacity = %s, consumption = %s, location = %s, model = %s, fuel Amount = %s)", 
                $this->fuelCapacity, $this->fuelConsumption, $this->location, $this->model, $this->fuelAmount);
        }
    }
    
        // $point = new Point(3,4);
        // $point1 = new Point(2,5);
        // $car = new Car(100, 2, $point, "Audi", 50);

        // echo $car . PHP_EOL;
        // $car->drive($point1);
        // echo $car . PHP_EOL;
?>
