<?php
$query = "test";
$jsrc = "https://ajax.googleapis.com/ajax/services/search/images?v=1.0&q=".$query;
$json = file_get_contents($jsrc);
$jset = json_decode($json, true);
// print_r($jset["responseData"]["results"][0]["url"]);
?>

<img src="<?php print_r($jset["responseData"]["results"][0]["url"]) ?>">