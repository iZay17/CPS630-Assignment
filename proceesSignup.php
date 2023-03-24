<?php
    include 'connection.php';
    
    
    ?>
<?php
if(empty($_POST["name"]))
{
	die("We require name");
}

if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
{
	die("This is not valid enmail");
}
if($_POST["password"] !== $_POST["repeatpassword"])
{
	die("No match");
}
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysql = require __DIR__ . "/connection.php";



$sql = "INSERT INTO user (name, email, password_hash)
		VALUES (?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) 
{
	die("SQL error: " . $mysql->error);
}
$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);
					
if ($stmt->execute())
{
	header("Location: signupsuccess.html");
	exit;
} else {
	die($mysqli->error . " " . $mysqli->error);
}

?>