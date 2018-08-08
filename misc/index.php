<html>
<head>
	<title>Hello goorm</title>
</head>
<body>
	<h1>Hello goorm</h1>

	<?php
	// show debug errors
ini_set('display_errors', 'On');
error_reporting(E_ALL);
	
$link = mysqli_connect("127.0.0.1", "root", "491001", "mysql");
	

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
	// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Create database
$sql = "CREATE DATABASE myDB";
if (mysqli_query($link, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($link);
}
	
mysqli_close($link);
?>
	
</body>
</html>