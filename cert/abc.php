<?php

function tests() {
	return 4+1;
}

try{
	test();
	throw new exception('fuck');
} catch(Exception $e) {
	echo 'the function did not work';
}
?>