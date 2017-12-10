<!DOCTYPE html>
<?php
error_reporting(E_ALL);
$app_key = 'c9FLdhZjFCZmpbZZ';
  if (is_numeric($_GET['location'])) {
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&location=%s&date=Future", $app_key, $_GET['location']);
  } else {
    $city = explode(", ", $_GET['location'])[0];
    $state = explode(", ", $_GET['location'])[1];
    $apiUrl = sprintf("http://api.eventful.com/json/events/search?app_key=%s&location=%s,%s&date=Future",$app_key, $city, $state);
  }
  if (isset($_GET['radius']) && is_numeric($_GET['radius'])) {
    $apiUrl .= "&range=" . $_GET['radius'] . "mi";
  }
  if ($_GET['type'] != 'all') {
    $apiUrl .= "&category=" . $_GET['type'];
  }
  $json = json_decode(file_get_contents($apiUrl . "&page_size=5"), true);

?>
<html>
<head>
  <title>Events | Plus App</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans|Montserrat|Montserrat+Alternates" rel="stylesheet">
  <style>
    body {
      color: white;
      font-family: 'Fira Sans', 'sans-serif';
    }

    table {
      width: 100%;
      table-layout: fixed;
    }

    td {
      text-align: center;
    }


    /*
    th, td {
      padding: 30px;
    }
    */

    tr:nth-child(odd) {
      background-color: #212121;
    }

    tr:nth-child(even) {
      background-color: #E91E63;
      z-index: 1;
    }

    #left {
      float: left;
    }

    #right {
      float: right;
    }

    .eventName {
      font-family: 'Montserrat', 'sans-serif';
      font-size: 24px;
      font-weight: bold;
    }

    .small {
      font-style: italic;
    }

    .headerImg {
      background: url('../imgs/chance.jpg') 50% 50% no-repeat;
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
</head>
<body>
  <table>
    <!--
    <tr>
      <th>ID</th>
      <th>Event</th>
      <th>Type</th>
      <th>DateTime</th>
      <th>Location</th>
      <th>Lat, Lon</th>
      <th>Address</th>
    </tr>
    -->
    <?php
    function printPretty($json) {
      $json = json_encode($json, JSON_PRETTY_PRINT);
      return "<pre>" . $json . "</pre>";
    }

    $event_array = $json['events'];
    foreach($event_array['event'] as $event) {
      echo "<tr>";
        echo "<td style=\"background: url('" . $event['image']['medium']['url'] . "') no-repeat; background-size: cover;\"></td>";
      echo sprintf("<td class='right'><span class='eventName'>%s</span><br><span class='small'>Location: %s</span><br><span class='small'>Time: %s</span><br><a class='btn btn-primary btn-large' target='_blank' href='%s'>More Details &raquo;</a><br></td>", $event['title'], $event['venue_name'], $event['start_time'],$event['url']);
      //echo "<td id='middle'>" . $event['short_title'] . "<br>" . $event['venue']['name'] . "</td>";
      //echo "<td id='right'><a class='btn btn-primary btn-large' target='_blank' href='" . $event['url'] . "'>More Details &raquo;</a></td>";
      echo "</tr>";
    }
    /*
      foreach($json['events'] as $key=>$event) {
        $imgStr = 'url("imgs/chance.jpg")';
        echo "<tr style='background-image: " . $imgStr . "'>";
        echo "<td>" . $key . "</td>";
        echo "<td>" . $event['short_title'] . "</td>";
        echo "<td>" . $event['type'] . "</td>";
        echo "<td>" . $event['datetime_local'] . "</td>";
        echo "<td>" . $event['venue']['name'] . "</td>";
        //echo "<td>" . $event['venue']['location']['lat'] . ", " . $event['venue']['location']['lon'] . "</td>";
        echo "<td>" . $event['venue']['address'] . "</td>";
        echo "</tr>";
      }
      */
        /*
        echo "key: " . $key;
        echo ", title: " . $event['short_title'];
        echo ", type: " . $event['type'];
        echo ", datetime_local: " . $event['datetime_local'];
        echo ", location: " . $event['venue']['name'];
        echo ", latitude: " . $event['venue']['location']['lat'];
        echo ", longitude: " . $event['venue']['location']['lon'];
        echo ", address: " . $event['venue']['address'];
        echo "<br><br>";
        //echo "key: ". $key .", value: " . $value['title'] . "<br>";
        */
    ?>
  </table>
  <script>
  var rightSide = screen.width / 1.62;
  var leftSide = screen.width - rightSide;
  console.log(leftSide + " - " + rightSide);
  $('.headerImg').height(leftSide);
  $('.headerImg').width(leftSide);
  $('tr').height(leftSide);
  $('td.left').width(leftSide);
  $('td.right').width(rightSide);
  </script>
</body>
</html>

<?php
  /*
  echo printPretty($json['events'][0]);
  */
  /*
  foreach($json['events'][0] as $key=>$event) {
    echo "key: " . $key;
    echo ", title: " . $event['short_title'];
    echo ", type: " . $event['type'];
    echo ", datetime_local: " . $event['datetime_local'];
    echo ", location: " . $event['venue']['name'];
    echo ", latitude: " . $event['venue']['location']['lat'];
    echo ", longitude: " . $event['venue']['location']['lon'];
    echo ", address: " . $event['venue']['address'];
    echo "<br><br>";
    //echo "key: ". $key .", value: " . $value['title'] . "<br>";
  }
  //print_r($json['meta']);
  //echo "<pre>" . $json.events . "</pre>";
  echo "<hr>";
  echo printPretty($json);
  */
?>
