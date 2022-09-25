<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superglobalus kintamieji FILES, SESSION, COOKIES</title>
</head>
<body>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="text" name="file_name">
        <button type="submit" name="upload">Įkelti</button>
    </form>    
</body>
</html>

<?php 
        
    $uploadOk = 0;
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    
    if ($file_size > 1000000) {
        echo "Failas yra didesnis nei 1 mb";
        $uploadOk = 1;
      }

    if ($file_type != 'application/pdf') {
        echo "Blogas failo tipas";
        $uploadOk = 1;
      }

    if (isset($_POST["upload"]) && $uploadOk == 0) {
        $file_name = $_POST["file_name"];
        $file = $_FILES["file"];
        
        $file_dir = "uploads/";
        $file_name_array = explode(".", $file["name"]);
        $file_extension =  $file_name_array[1];
        $time = time();
        $random_string = $file_name_array[0].$time;
        $file_name_generated = $file_name_array[0] .".".$file_extension;
        $file_path = $file_dir . $file_name_generated;

         if(move_uploaded_file($file["tmp_name"],$file_path)) {
            echo "Failas sekmingai ikeltas";
         } else {
            echo "Failo ikelti nepavyko";
         }
    }
?>