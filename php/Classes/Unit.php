<?php
    class Unit {
        private $damage;
        private $hitPoints;
        private $hitPointsLimit;
        private $name;

        private function ensureIsAlive() {
            if ( $this->hitPoints == 0 ) {
                throw new Exception("Unit is dead");
            }
        }

        private function validate($vulue) {
            if ( is_numeric($vulue) ) {
                return $vulue;
            }
            throw new Exception("Invalid param");
        }

        public function __construct($name, $hp, $dmg) {
            $this->damage = $this->validate($dmg);
            $this->hitPointsLimit = $this->validate($hp);
            $this->hitPoints = $hp;
            $this->name = $name;
        }

        public function __get($name) {
            if ( property_exists($this, $name) ) {
                return $this->$name;
            }
            throw new Exception("Attribute error: attribute $name not found");
        }

        public function addHitPoints($hp) {
            $this->ensureIsAlive();

            $this->hitPoints += validate($hp);

            if ( $this->hitPoints > $this->hitPointsLimit ) {
                $this->hitPoints = $this->hitPointsLimit;
            }
        }
    
        public function takeDamage($dmg) {
            $this->ensureIsAlive();

            $this->hitPoints -= $dmg;
    
            if ( $this->hitPoints <= 0 ) {
                $this->hitPoints == 0;
            }
        }

        public function attack(Unit $enemy) {
            $this->ensureIsAlive();
    
            $enemy->takeDamage($this->damage);
    
            if ( $enemy->hitPoints > 0 ) {
                $enemy->counterAttack($this);
            }
        }

        public function counterAttack(Unit $enemy) {
            $this->ensureIsAlive();
            
            $enemy->takeDamage($this->damage / 2);
        }

        public function __toString() {
            return sprintf("Name: $this->name\nHP: $this->hitPoints/$this->hitPointsLimit\nDamage: $this->damage\n");
        }
    }
    
    
    $unit = new Unit ("Walera", 250, 50 );
    $unit2 = new Unit ("Leon", 300, 100);

    $unit->attack($unit2);

    echo $unit . PHP_EOL;
    echo $unit2 . PHP_EOL;

?>