<?php
class Date {
    private $day, $month, $year;

        private function validate($value) {
            if ( is_numeric($value) ) {
                return $value;
            }
            throw new Exception("Invalid param");
        }

    public function __construct($day, $month, $year) {
        $this ->day = $this->validate($day);
        $this ->month = $this->validate($month);
        $this ->year = $this->validate($year);
    }

    public function validateDate($day, $month, $year) {
        $days = array(0, 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    
        if ( $year % 400 == 0 || ($year % 100 != 0 && $year % 4 == 0) ) {
            $days[2] = 29;
        }
    
        if ( $year < 1582 ) {
            throw new Exception ("Invalid Year");
        }
    
        if ( $month < 1 || $month > 12 ) {
            throw new Exception ("Invalid Month");
        }
    
        if ( $day < 1 || $day > $days[$month] ) {
            throw new Exception ("Invalid Day");
        }
    }



    public function __get($name) {
            return $this->$name;
    }
    
    public function __toString() {
        return sprintf(" (day %s, month %s, year %s \n)", $this->day, $this->month, $this->year);
    }
}

?>