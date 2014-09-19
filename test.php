<?php
$states = array ( "AK" => "Arkansas", "AL" => "Alabama", "AR" => "Arkansas", 
       "AZ" => "Arizona", "CA" => "California",
    // ... and so on
    "WY" => "Wyoming" );

$test = array();
$count = 0;
foreach($states as $key=> $v) {
	$states['s'][$count[$count++]][] = $count++;

}
echo '<pre>';
print_r($states);
echo '</pre>';


$color = array('blue', 'pink');

function print_option($value, $key, $color)
{

   echo '<option style="color:'.$color.'" value='.$key.'>'.$value.'</option>';

}
 
echo '<form><table><tr><td>State: <select name="state">'."\n";
 
array_walk($states, 'print_option', $color);