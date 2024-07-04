<?php 
    $temperature_in_celsius = 32;

    $temperature_in_fahrenheit = ($temperature_in_celsius * 9/5) + 32;
    
    printf("{$temperature_in_celsius} degree celsius is equal to = %.2f Fahrenheit",$temperature_in_fahrenheit);
?>