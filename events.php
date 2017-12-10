
<?php
error_reporting(E_ALL);
$app_key = 'c9FLdhZjFCZmpbZZ';
$search_type = $_GET['search_type'];
$event_type = "music";
$apiUrl = "";
if($search_type == "location"){
  if (is_numeric($_GET['search'])) {
    $zip_code = $_GET['search'];
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&location=%s&date=Future", $app_key,$event_type, $zip_code);
  } else {
    $city = explode(", ", $_GET['search'])[0];
    $state = explode(", ", $_GET['search'])[1];
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&location=%s,%s&date=Future",$app_key,$event_type, $city, $state);
  }
}
elseif($search_type=="artist"){
  $artist = $_GET['search'];
  $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&keywords=%s&date=Future",$app_key,$event_type,$artist);
}


  $json = json_decode(file_get_contents($apiUrl . "&page_size=5"), true);


    $event_array = $json['events']['event'];
    $json_events = json_encode($event_array);
    echo $json_events;
    ?>
