$json_array = [];
$lines = file('eapteka_dataset.csv', FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
$headers = array_shift($lines);
$headers = str_getcsv($headers, ',');

foreach ($lines as $line) {
    $json_array[] = array_combine($headers, str_getcsv($line, ',') );
  }
  
$json = json_encode($json_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
file_put_contents('eapteka.json', $json);
