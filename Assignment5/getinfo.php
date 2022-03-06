<html>
<head>
    <title>Here are the results</title>
    <style>
        table {
            margin: 8px;
        }

        th {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.5em;
            background: #666;
            color: #FFF;
            padding: 2px 6px;
            border-collapse: separate;
            border: 1px solid #000;
        }

        td {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 1.5em;
            border: 1px solid #DDD;
        }
    </style>
</head>
<body>
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
$tabel_arr = array();
foreach ($paintings as $painting) {
    $paintingFields = explode($delimiter, $painting);
    $stack[] = $paintingFields;
}

$temp = 0;

foreach ($stack as $painting){
    $paintings = array();
    $paintings['ID']= $painting[0];
    $paintings['Artist'] = $painting[1];
    $paintings['Title'] = $painting[2];
    $paintings['Year'] = $painting[3];


    if ($paintings['Artist'] == $aname) {
        $tabel_arr[] = $paintings;
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
echo build_table($tabel_arr);
?>
</body>
</html>