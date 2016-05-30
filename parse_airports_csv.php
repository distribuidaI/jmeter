<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new PDO('mysql:host=localhost;dbname=airports', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

$filename = "/home/juancho/distribuida/jmeter/airports_states_codes_commas.csv";
$query = <<<eof
    LOAD DATA INFILE '$filename'
     INTO TABLE airport
     FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"'
     LINES TERMINATED BY '\n'
    (city,state,code)
eof;

$db->exec($query);

?>