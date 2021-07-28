<?php

echo '<br>This is the test page<br>';

$host = "ubplc-mysql.mysql.database.azure.com"; 

$username = "ubplcuser@ubplc-mysql";

//$host = "127.0.0.1";
//$username = "azure_superuser"; 
$password = "%ubplc$123"; 

$dbname = "unitydb";

$options=[];

$conn = mysqli_connect($host, $username, $password, $dbname);


if(!$conn) {
	die("Could not connect to database: " . mysqli_error());
}
else {
	echo 'Database connected successfully<br/>';
}

$sql = "SELECT * FROM home_page_sliders";

if ($result = mysqli_query($conn, $sql)) {
  // Fetch one and one row
  while ($row = mysqli_fetch_row($result)) {
    echo $row[1] .'<br>';
  }
  mysqli_free_result($result);
}


try {
	$datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);

	$datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	echo 'Connected to Database<br/>';

	$sql = "SELECT * FROM home_page_sliders";
	foreach ($datab->query($sql) as $row)
    {
    	echo $row["banner_image"] ."<br/>";
    }
} catch (PDOException $e) {
	throw new Exception($e->getMessage());
}


