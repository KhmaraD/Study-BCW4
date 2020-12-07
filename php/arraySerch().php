<?php
    function arraySerch($array, $needle) {
        $key = array_search($needle, $array);
        if ($key == null) {
            return -1;
        }
        return $key;
    }
?>