<?php

$ii = array(
		'section' => 1,
		'soi' => array(
				'address_id' => 123
			),
		'ae' => array(
				'address_id' => 321
			),
	);

echo '<pre>';
	print_r($ii);
echo '<pre>';

$addresses = array(
		'123' => array(
			'uprn' => 'abc',
			'property' => 'abc'
			),
		'321' => array(
			'uprn' => 'cba',
			'property' => 'cba'
		)
			
	);

echo '<pre>';
	print_r($addresses);
echo '<pre>';


$pid = shell_exec('pwd');
print_r($pid);

foreach($ii as $k_ii => $v_ii) {

	$test = $addresses[$v_ii['address_id']]['uprn'];

	if($k_ii == 'soi') {
		$ii[$k_ii]['uprn'] = $test;
		
	}
	if($k_ii == 'ae') {
		$ii[$k_ii]['uprn'] = $addresses[$v_ii['address_id']]['uprn'];
		
	}
}

echo '<pre>';
	print_r($ii);
echo '<pre>';

?>


