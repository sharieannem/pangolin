<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
    $host = 'localhost';
    $user = 'gviloria_pango';
    $pass = 'teampangolin';
    $db = 'gviloria_ALERT';
	
    $dbConnection = new mysqli($host, $user, $pass, $db);
	
    if (mysqli_connect_errno()) {
        printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
        exit();
    }
	
    if($_POST) {
		
		$warning = "test";
        $disaster = $_POST["Disaster"];
        $alert = $_POST["Alert"];
      
        if($results = $dbConnection->prepare("UPDATE SYSTEMDATA SET Warning = ? WHERE id = 1;")) {
            $results->bind_param("s", $warning);
            $results->execute();
            $results->close();
        } else {
            echo 'Error';
        }
        
        header("location: greendisaster.php");
        mysqli_close($dbConnection);
        exit();
    }
}

?>