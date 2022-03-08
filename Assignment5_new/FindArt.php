<html>
<head>
    <title>Here are the results</title>
        <style>
            table {margin: 12px;}

            th {
                font-family: sans-serif;
                font-size: 10px;
                color: black;
                /*padding: 2px 6px;*/
                border-collapse: separate;
                border: 1px solid #000;
            }

            td {
                font-family: sans-serif;
                font-size: 10px;
                border: 1px solid #DDD;
            }
        </style>
</head>
<body>
<?php
$paintings = file("ArtInfo.txt");
$delimiter = ',';
$artname = $_GET["ArtName"];
$line = array();
$tabel_arr = array();

foreach ($paintings as $painting) {
    $paintingFields = explode($delimiter, $painting);
    $line[] = $paintingFields;
}

$i = 0;

foreach ($line as $painting){
    $paintings = array();
    $paintings['ID']= $painting[0];
    $paintings['Artist'] = $painting[1];
    $paintings['Title'] = $painting[2];
    $paintings['Year'] = $painting[3];


    if ($paintings['Artist'] == $artname) {
        $tabel_arr[] = $paintings;
    }   else {
        $i++;
    }

    if ($i == count($line)) {
        echo "Artist Not Found! Please try it again.";
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

    $html .= '</table>';
    return $html;
}

//function array_to_table($matriz)
//{
//    echo "<table>";
//
//    // Table header
//    foreach ($matriz[0] as $clave=>$fila) {
//        echo "<th>".$clave."</th>";
//    }
//
//    // Table body
//    foreach ($matriz as $fila) {
//        echo "<tr>";
//        foreach ($fila as $elemento) {
//            echo "<td>".$elemento."</td>";
//        }
//        echo "</tr>";
//    }
//    echo "</table>";}



if(!empty($tabel_arr))
    echo build_table($tabel_arr);
?>
</body>
</html>