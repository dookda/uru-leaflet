<?php
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

pg_connect("host=localhost user=postgres password=1234 dbname=addfeature") or die("Can't Connect Server");

$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $name_t = $_POST['name_t'];
    $geom = $_POST['geom'];

    //echo $name_t;

    $sql = "UPDATE feature SET name_t = '$name_t', geom = ST_SetSRID(st_geomfromgeojson('$geom'), 4326) WHERE name_t = '$name_t'";
    
    pg_query($sql);

    //echo $sql;
?>