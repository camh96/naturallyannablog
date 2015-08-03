<?php
// header("refresh: 300");  //refresh every 5 mins
session_start();
date_default_timezone_set("Pacific/Auckland");
$initvars = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?origins=Willis+St+NZ&destinations=Tawa+Wellington&key=AIzaSyD7shuOovfRpwCjPKq3TMwticEhDALRxcI"), true);
echo "<pre>";
$vals = $initvars["rows"][0]["elements"][0]["duration"]["text"];
$output = preg_replace('/[^0-9]/', '', $vals);
echo $output . " minutes to get to Willis St from Tawa as at " . date("H:i:s", time());
echo "<br>";
 ///
try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=driving', 'root', '');
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Error!: " . $e->getMessage();
    die();
}
 
// GET THE RECORDS
try {
    $sql = "SELECT * FROM time";
    $statement = $dbh->prepare($sql);
    $statement->execute();
 
} catch (PDOException $e) {
    echo "<hr>";
    echo "Query Error!: " . $e->getMessage();
    echo "<hr><pre>";
    print_r($e);
    die();
}



$x = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	echo "[" . $x++. "] => " . $row['duration'];
	echo "<br />";

}	

try {
    $dbh = new PDO('mysql:host=127.0.0.1;dbname=driving', 'root', '');
    // set the PDO error mode to exception
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // begin the transaction
    $dbh->beginTransaction();
    // our SQL statememtns
    $dbh->exec("INSERT INTO time VALUES ($output)");

    // commit the transaction
    $dbh->commit();
    echo "New records created successfully";
    }
catch(PDOException $e)
    {
    // roll back the transaction if something failed
    $dbh->rollback();
    echo "Error: " . $e->getMessage();
    }

$dbh = null;

$x = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	echo "[" . $x++. "] => " . $row['duration'];
	echo "<br />";

}	


?>