<?php
$printings = file("ArtistInfo.txt");
$delimiter = ',';

$selection = $_GET['ArtistName'];

$line = arrary();
foreach ($paintings as $printings){
    $paintingFields = explode($delimiter, $paintings);
    $line[] = $paintingFields;

    $id= $paintingFields[0];
    $artist = $paintingFields[1];
    $title = $paintingFields[2];
    $year = $paintingFields[3];
}

foreach ($line as $painting){
    $artist = $painting[1];

    if ($artist == $line) {
        $output = $id . " " . $artist . " " . $title . " " . $year;
        echo "<b>" . $output . "</b> <br />";
    }   else {
        $temp++;
    }

    if ($temp == count($stack)) {
        echo "No result found!";
    }
}

?>

