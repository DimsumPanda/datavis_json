<?php
    $username = "testuser"; 
    $password = "password";   
    $host = "localhost";
    $database="homedb";
    
	$con = mysqli_connect($host, $username, $password, $database);
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
   $sql = "SELECT  `date`, `close` FROM  `data2`";
   $result=mysqli_query($con,$sql);
    $data = array();
    
    for ($x = 0; $x < mysqli_num_rows($result); $x++) {
        $data[] = mysqli_fetch_assoc($result);
    }
    
    // echo json_encode($data);
    $fp = fopen('empdata.json', 'w');
    fwrite($fp, json_encode($data));
    fclose($fp);     
    echo 'Connected successfully' ;w'
?>