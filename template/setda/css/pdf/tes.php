<?php
/*
 * usage: csv-to-json.php?key=<GOOGLEKEY>&callback=<CALLBACK>
 */

header('Content-type: script/javascript');

// Set your CSV feed
// $feed = 'https://docs.google.com/spreadsheet/pub?key=' . $_GET["key"] . '&output=csv';
// https://docs.google.com/spreadsheets/d/e/2PACX-1vT3s3xUrZaaHEWTU6yk-7HsBfz0IIqCGy7oeYoO89mMU_UUGEB3Qd1qcyTRxwOMFsfsXdWPaLs7-Oox/pub?gid=2110415533&single=true&output=csv
$feed = 'https://docs.google.com/spreadsheets/d/e/2PACX-1vT3s3xUrZaaHEWTU6yk-7HsBfz0IIqCGy7oeYoO89mMU_UUGEB3Qd1qcyTRxwOMFsfsXdWPaLs7-Oox/pub?gid=2110415533&single=true&output=csv';
// Arrays we'll use later
$keys = array();
$newArray = array();

// Function to convert CSV into associative array
function csvToArray($file, $delimiter) { 
  if (($handle = fopen($file, 'r')) !== FALSE) { 
    $i = 0; 
    while (($lineArray = fgetcsv($handle, 4000, $delimiter, '"')) !== FALSE) { 
      for ($j = 0; $j < count($lineArray); $j++) { 
        $arr[$i][$j] = $lineArray[$j]; 
      } 
      $i++; 
    } 
    fclose($handle); 
  } 
  return $arr; 
} 

// Do it
$data = csvToArray($feed, ',');

// Set number of elements (minus 1 because we shift off the first row)
$count = count($data) - 1;
  
//Use first row for names  
$labels = array_shift($data);  

foreach ($labels as $label) {
  $keys[] = $label;
}

// Add Ids, just in case we want them later
$keys[] = 'id';

for ($i = 0; $i < $count; $i++) {
  $data[$i][] = $i;
}
  
// Bring it all together
for ($j = 0; $j < $count; $j++) {
  $d = @array_combine($keys, $data[$j]); //Æ -- add "@" in from of array combine to surpress warnings.
  $newArray[$j] = $d;
}

// Print it out as JSON
echo $_GET['callback']. '(' . json_encode($newArray) . ');'; //Æ -- return as a callback for JSONP.

?>