<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>Landlord Page</title>
    
        <nav style="background-color: rgb(212, 113, 8); "  >
            <a word-spacing: 25px; >Home</a>
            <a word-spacing: 25px;>Terms And Conditions</a>
            <a word-spacing: 25px;>Contact Us</a>
            <a word-spacing: 25px;>Landlord</a>
        </nav>
    
    <nav style="text-align: center  ;color:gold;">
    <h1>Rent a place?
        </h1>
    </nav>
</head>
<body>
 <h4>You can upload your space here:</h4>
 <?php
 if(isset($_GET['error'])): ?>
 <p><?php echo $_GET['error']; ?></P>
 <?php endif ?>
 
<form method="post" action="upload.php" enctype="multipart/form-data">
    <input type="file" name="image" >
    <input type="submit" name="submit" value="Upload">

</form>

</body>
</html>