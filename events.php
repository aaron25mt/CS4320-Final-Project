
<?php
$app_key = 'c9FLdhZjFCZmpbZZ';
$search_type = $_GET['search_type'];
$event_type = "music";
$offset = $_GET['offset'];
$apiUrl = "";
if($search_type == "location"){
  $location=$_GET['search'];
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&location=%s&date=Future&sort_order=date", $app_key,$event_type, $location);
}
elseif($search_type=="artist"){
  $artist = $_GET['search'];
  $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&category=%s&keywords=%s&date=Future&sort_order=relevance",$app_key,$event_type,$artist);
}

 $results_per_page = 10;
 $page_size= sprintf("&page_size=%s",$results_per_page);


 $page_number= sprintf("&page_number=%s",$offset);

$apiUrl.=$page_size.$page_number;
  $json = json_decode(file_get_contents($apiUrl), true);


    $event_array = $json['events']['event'];
    $json_events = json_encode($event_array);
    echo $json_events;
    ?>
