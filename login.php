<?php
 $email = $_POST['email'];
 $pword = $_POST['password'];

 $conn= new mysqli("localhost","root","","test");
 if($conn->connect_error){
    die ("Failed to Connect :" . $conn->connect_error);
 }
 else {
    $stm = $conn ->prepare( "SELECT * FROM  registration WHERE email =?");
    $stm->bind_param("s",$email);
    $stm->execute();
    $stm_result = $stm->get_result();
    if($stm_result->num_rows > 0){
        $data = $stm_result->fetch_assoc();
        if ($data['password'] == $pword) {
            echo "<h2>Login successfully</h2>";

    }else {
        echo "<h2>Login failed</h2>";
    }}
    else {
        echo "<h2>Ivalid Email or password</h2>";
            }
        }

 
?>