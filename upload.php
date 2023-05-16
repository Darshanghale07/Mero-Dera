<?php
 if (isset($_POST['submit']) && isset($_FILES['image'])){
    include"img_conn.php";
     echo"<pre>";
     print_r($_FILES['image']);
     echo"</pre>";
     $img_name =$_FILES['image']['name'];
     $img_size=$_FILES['image']['size'];
     $tmp_name=$_FILES['image']['tmp_name'];
     $error=$_FILES['image']['error'];
 if($error== 0){
     if($img_size> 250000){
         $em="File too large.";
         header("Location:Landlord.php?error=$em");
     }
     else{
         $img_ex= pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc =strtolower($img_ex);
         $allowed_exs= array("jpg", "jpeg","png");
         if(in_array($img_ex_lc,$allowed_exs)){
                     $new_img_name=uniqid("IMG_", true).'.'.$img_ex_lc;
                     $img_upload_path = 'foldimages/'.$new_img_name;
                     move_uploaded_file($tmp_name,$img_upload_path);
     $sql = "INSERT INTO images (dbimages) VALUES (:img_data)";
                     header("Location:view.php");
                 }else{
                     $em ="You cannot upload this type of file.";
                     header("Location:Landlord.php?error=$em");
     }
     }
    }
    else {
     $em="unknown error occurred";
    header("Location:Landlord.html");
 }
 else{
     header("Location: Landlord.php");
 }


$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
$img_ex_lc = strtolower($img_ex);
$allowed_exs = array("jpg", "jpeg", "png");

if (in_array($img_ex_lc, $allowed_exs)) {
    // Generate a unique filename for the image
    $new_img_name = uniqid("IMG_", true).'.'.$img_ex_lc;

    // Move the uploaded file to the folder
    $img_upload_path = 'foldimages/' . $new_img_name;
    move_uploaded_file($tmp_name, $img_upload_path);

    // Read the contents of the image file
    $img_data = file_get_contents($img_upload_path);

    // Insert the image file data into the database
    $sql = "INSERT INTO images (dbimages) VALUES (:img_data)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':img_data', $img_data, PDO::PARAM_LOB);
    $stmt->execute();

    // Redirect to the view page
    header("Location: view.php");
} else {
    $em = "You cannot upload this type of file.";
    header("Location: Landlord.php?error=$em");
}


?>