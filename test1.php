<html>
<head>
    <title>Sample</title>
</head>
<body>
    <form action="test1.php" method="post">
        Please enter a number <input type="number" name="userNumber"><br>
        <input type="submit">
    </form>
    <?php
    if(isset($_POST["userNumber"])) { 
        $user_number = $_POST["userNumber"];
        echo "You have chosen $user_number";
    }
    ?>
</body>
</html>