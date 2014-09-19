<?php

if($_POST) {
	$command = $_POST['command'];
	$data = test($command);
	echo $data;
}




public function hello($cmd) {

	$connection = ssh2_connect('81.4.106.67', 22);

ssh2_auth_password($connection, 'vineshprajapati', 'nqyvgmcgdb');

		$stream = ssh2_exec($connection, '');

		stream_set_blocking($stream, true); 
		        $data = ""; 
		        while ($buf = fread($stream, 4096)) { 
		            $data .= $buf; 
		        } 
		        fclose($stream); 
		        return $data;

    }

?>


<form action="test.php" method="post">
  command: <input type="command" name="command"><br>
  <input type="submit" value="Submit">
</form>