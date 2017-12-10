
<?php
$app_key = 'c9FLdhZjFCZmpbZZ';
$search_type = $_GET['search_type'];
$event_type = "music";
$page_number = $_GET['offset'];
$apiUrl = "";
if($search_type == "location"){
  $location=$_GET['search'];
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&location=%s&date=Future", $app_key,$event_type, $location);
}
elseif($search_type=="artist"){
  $artist = $_GET['search'];
  $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&keywords=%s&date=Future",$app_key,$event_type,$artist);
}


  $json = json_decode(file_get_contents($apiUrl . "&page_size=10"), true);


    $event_array = $json['events']['event'];
    $json_events = json_encode($event_array);
    echo $json_events;
    ?>
