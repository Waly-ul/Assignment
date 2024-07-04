<?php 
    $num1 = 4;
    $num2 = 5;
    $num3 = 6;

    $max = $num1;

    if($num2>$max){
        $max = $num2;
    }if($num3>$max){
        $max = $num3;
    }

    printf("The Largest Number is = %d\n",$max);

?>