<?php
    $username = "testuser"; 
    $password = "password";   
    $host = "localhost:3306";
    $database="homedb";
    
    $server = mysqli($host, $username, $password);
    $connection = mysql_select_db($database, $server);

    $myquery = "
SELECT  `date`, `close` FROM  `data2`
";
    $query = mysql_query($myquery);
    
    if ( ! $query ) {
        echo mysql_error();
        die('could not connect: ' . mysql_error());
    }
    
    $data = array();
    
    for ($x = 0; $x < mysql_num_rows($query); $x++) {
        $data[] = mysql_fetch_assoc($query);
    }
    
    echo json_encode($data);     
    echo 'Connected successfully' ;
    mysql_close($server);
?>