<?php
$paintings = file("ArtData.txt");
$delimiter = ',';	// the data is comma-delimited

$aname = $_GET["aName"];

// loop through each line of the file
//$temp = 0;
//foreach ($paintings as $painting)
//{
//    // returns an array of strings where each element in the array
//    // corresponds to each substring between the delimiters
//    $paintingFields = explode($delimiter, $painting);
//
//    $id= $paintingFields[0];
//    $artist = $paintingFields[1];
//    $title = $paintingFields[2];
//    $year = $paintingFields[3];
//
//    if ($artist == $aname) {
//        $output = $id . " " . $artist . " " . $title . " " . $year;
//        echo "<b>" . $output . "</b> <br />";
//    }   else {
//        $temp++;
//    }
//
//    if ($temp == 4) {
//        echo "No result found!";
//    }
//
//}


$stack = array();
foreach ($paintings as $painting) {
    $paintingFields = explode($delimiter, $painting);
    $stack[] = $paintingFields;
}

$temp = 0;
$renameMap = [
    'old1' => 'new1',
    'old2' => 'new2'
];

$stack = array_combine(array_map(function($el) use ($renameMap) {
    return $renameMap[$el];
}, array_keys($stack)), array_values($stack));



foreach ($stack as $painting){
    $artist = $painting[1];

    if ($artist == $aname) {
        $output = $id . " " . $artist . " " . $title . " " . $year;
        echo "<b>" . $output . "</b> <br />";
    }   else {
        $temp++;
    }

    if ($temp == count($stack)) {
        echo "No result found!";
    }
}

function build_table($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
        $html .= '<th>' . htmlspecialchars($key) . '</th>';
    }
    $html .= '</tr>';

    // data rows
    foreach( $array as $key=>$value){
        $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . htmlspecialchars($value2) . '</td>';
        }
        $html .= '</tr>';
    }

    // finish table and return it

    $html .= '</table>';
    return $html;
}

?>
