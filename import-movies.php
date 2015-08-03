<?php
function strtotitle($title)
{
    

    $exceptions = array(
        'of', 'a', 'the', 'and', 'an', 'or', 'nor', 'but', 'is', 'if', 'then', 'else', 'when', 'at', 'from', 'by', 'on', 'off', 'for', 'in', 'out', 'over', 'to', 'into', 'with','either','neither'
    );
    //make lowercase
    $title      = strtolower($title);
    // Split the string into separate words
    $words      = explode(' ', $title);
    //iterate over each word and make the first letter uppercase except for our exceptions
    foreach ($words as $key => $word) {
        if ($key == 0 or !in_array($word, $exceptions))
            $words[$key] = ucwords($word);
    }
    // Join the words back into a string
    $newtitle = implode(' ', $words);
    return $newtitle;
}


//test it
// echo strtotitle("this is a title lowercase should be changed NOW ALL CAPS SHOULD BE CHANGED SoMe FUnkY UsEr iNpUt");

// Connect to database
// location, username, password, database name
try {
    $dbc = new PDO('mysql:host=localhost;dbname=schlocktoberfest;charset=utf8', 'root', '');
    $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Whoops! ", $e->getMessage();
    die();
}

try {
	$dbc->query("TRUNCATE TABLE movies;");
} catch (Exception $e) {
	echo $e->getMessage();
	die();
}

$statement = $dbc->prepare(
	"INSERT INTO movies (title, year, description)
	VALUES (:title, :year, :description);"
);

try {
    if ($handle = fopen("movies.csv", "r")) {
        while ($row = fgetcsv($handle, 1000, ",")) {
            $statement->bindValue(":title", strtotitle($row[0]));
            $statement->bindValue(":year", $row[1]);
            $statement->bindValue(":description", $row[2]);
            $statement->execute();
        }
        fclose($handle);
    }
} catch (Exception $e) {
    die($e->getMessage);
}