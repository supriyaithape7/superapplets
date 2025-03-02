<?php
error_reporting(E_ALL);

 $url = 'https://simpletheme-light.myshopify.com/collections/denim/products.json?limit=10';

$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $url);
$result = curl_exec($ch);

curl_close($ch);
if (! $result) {
    return false;
}
echo 'yes here';
print_r($result);

$csvFile = 'products.csv';

function convertInfoToCSV($result, $csvFile)
{
    $jsonArray = json_decode($json, true);

    // Download images 


    // insert to CSV
    $fp = fopen($csvFile, 'w');
    $header = false;

    foreach ($jsonArray as $line) {

        if (empty($header)) {
            $header = array_keys($line);
            fputcsv($fp, $header);
            $header = array_flip($header);
        }
        fputcsv($fp, array_merge($header, $line));
    }
    fclose($fp);
    return;
}

?>