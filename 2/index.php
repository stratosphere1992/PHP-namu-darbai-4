<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post" action="index.php">
        <input type="text" name="name" placeholder="name">
        <input type="password" name="password" placeholder="password">
        <button type="submit" name="press">Login</button>
    </form>
<?php 

$name = $_POST["name"];
$password = $_POST["password"];


if(isset($_POST['name']) && isset($_POST['password'])){

    if($name == "Admin" && $password == "123456")
    {
        header('Location: profile.php');
        setcookie('name', $_POST['name'], time() + (86400 * 30), "/");
    }
    else if($name != "Admin" && $password != "123456")
    {
        header("Location: err.php?e=404");
    }
}

?>
</body>
</html>