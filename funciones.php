<?php
function seleccTodoBlog(){
    //echo "olassss";
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        //consultamos
        $datos="select * from blog ";
        $results = $conn->query($datos);
        if(!$results){
            $text="Error";
            return $text;
        }else{
            if (mysqli_num_rows($results)==0){ echo "FALLOOOOO\n";} else {
                return $results;
            }
        }

    }
};

?>