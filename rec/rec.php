<?php

 // print_r($_POST);
 // die('asda');
if($_POST) {
	$requestType = $_POST['requestType'];

	if($requestType == 'abc') {
		$format = strtolower($_POST['format']);
		$num = intval($_POST['num']);

		$api = new API();
		$output = $api->getData($format, $num);

		echo $output;
	}
}


class API {

	public $con;
	public function __construct() {
		$this->con = mysql_connect('localhost', 'root', 'root') or die ('MySQL Error.');
			   mysql_select_db('test', $this->con) or die('MySQL Error.');
	}

	public function getData($format, $num) {
		//Run our query
		$result = mysql_query('SELECT * FROM vinny where id = ' . $num, $this->con) or die('MySQL Error.');
		 
		//Preapre our output
		if($format == 'json') {
		  $output = $this->typeJSON($result);
		} elseif($format == 'xml') {
		  $output = $this->typeXML($result);
		} else {
		  die('Improper response format.');
		}
		 
		//Output the output.
		return $output;

	}

	public function typeXML($result) {
		header('Content-type: text/xml');
		$outputÂ  = "<?xml version=\"1.0\"?>\n";
		$output .= "<recipes>\n";
		 
		for($i = 0 ; $i < mysql_num_rows($result) ; $i++){
		$row = mysql_fetch_assoc($result);
		$output .= "<recipe> \n";
		$output .= "<recipe_id>" . $row['recipe_id'] . "</recipe_id> \n";
		$output .= "<recipe_name>" . $row['recipe_name'] . "</recipe_name> \n";
		$output .= "<recipe_poster>" . $row['recipe_poster'] . "</recipe_poster> \n";
		$output .= "<recipe_quick_info>" . $row['recipe_quick_info'] . "</recipe_quick_info> \n";
		$output .= "<recipe_link>" . $row['recipe_link'] . "</recipe_link> \n";
		$output .= "</recipe> \n";
		}
		 
		$output .= "</recipes>";

		return $output;
	}

	public function typeJSON($result) {
		
		$recipes = array();
		while($recipe = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$recipes[] = array('post'=>$recipe);
		}
		 
		return $output = json_encode(array('posts' => $recipes));
	}


 
}
 
?>