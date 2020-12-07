<?php
    class Foo implements Countable {
        private static $count = 0;

        public function __construct() {
            self::$count += 1;
        }

        public function count() {
            return self::$count;
        }

        public static function getCount() {
            return self::$count;
        }

        public function __clone() {
            self::$count += 1;
        }
    }
?>