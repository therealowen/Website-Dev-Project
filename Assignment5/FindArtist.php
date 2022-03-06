<?php
$paintings = file("ArtistInfo.txt");
$delimiter = ',';	// the data is comma-delimited

// loop through each line of the file
if (in_array($row['name'],)
{
    // returns an array of strings where each element in the array
    // corresponds to each substring between the delimiters
    $paintingFields = explode($delimiter, $painting);

    $id= $paintingFields[0];
    $artist = $paintingFields[1];
    $title = $paintingFields[2];
    $year = $paintingFields[3];

    $output = $id . " " . $artist . " " . $title . " " . $year;
    echo "<b>" . $output . "</b> <br />";
}

?>
