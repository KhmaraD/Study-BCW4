<?php
    $a = 0;
    $b = 0;
    
    fscanf(STDIN, "%d%d\n", $a, $b);
    
    echo max($a, $b) . PHP_EOL;
?>

<!-- <?php
    $a = fgets(STDIN);
    $b = fgets(STDIN);
    
    if ( $a >= $b ) {
        echo $a . PHP_EOL;
    } else {
        echo $b . PHP_EOL;
    }
?>
 -->