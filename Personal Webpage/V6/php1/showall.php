<?php

include_once("config.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());;
$sql = 'select * from test';

$return = mysqli_query($conn, $sql) or die("Could not execute query: " .mysqli_error($conn));



while ($row = mysqli_fetch_assoc($return))
{
    echo '<br>' . '| ' . $row['id'] . ' | ' .  $row['c1'] . ' , ' . $row['c2'];
}


?>

<hr>
<br> Add to Database:
<form method = 'GET' action="add.php">
    Column 1 <input name = 'a'>
    Column 2 <input name = 'b'>
    <button type = 'submit'> Add </button>
</form>

<br>
Delete Row with ID:
<form method = 'GET' action="remove.php">
    <input name = 'id'>
    <button type = 'submit'> Remove </button>
</form>

