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
		
		$id = $_POST["id"];
		$warning = $_POST["Warning"];
        $disaster = $_POST["Disaster"];
        $alert_s = $_POST["Alert_Siren"];
        $alert_r = $_POST["Alert_Radio"];
        $alert_t = $_POST["Alert_Text"];
        $alert_tv = $_POST["Alert_TV"];
        
        if(isset($_POST['Alert_Siren'])) { 
            $alert_s = 1; 
        } else { $alert_s = 0; }
        
        if(isset($_POST['Alert_Radio'])) { 
            $alert_r = 1; 
        } else { $alert_r = 0; }
        
        if(isset($_POST['Alert_Text'])) { 
            $alert_t = 1; 
        } else { $alert_t = 0; }
        
        if(isset($_POST['Alert_TV'])) { 
            $alert_tv = 1; 
        } else { $alert_tv = 0; }
      
        if($results = $dbConnection->prepare("UPDATE SYSTEMDATA SET Alert_Siren = ?, Alert_Radio = ?, Alert_Text = ?, Alert_TV = ? WHERE id = $id;")) {
            $results->bind_param("iiii", $alert_s, $alert_r, $alert_t, $alert_tv);
            $results->execute();
            $results->close();
        } else {
            echo $dbConnection->error;
            echo mysqli_error($dbConnection);
            echo 'Error';
        }
        
        header("location: redconfirm.php?id=".$id);
        mysqli_close($dbConnection);
        exit();
    }
}

?>