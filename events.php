<!DOCTYPE html>
<?php
  if (is_numeric($_GET['location'])) {
    $apiSecret = "86d96eae03383a4b475a0d16bac6e6619c6fcae09288f1946d73d7acfac32e7b";
    $clientId = "OTYxMzg3MHwxNTEwNTE5NTE3LjYx";
    $apiUrl = sprintf("https://api.seatgeek.com/2/events?client_secret=%s&client_id=%s&postal_code=%s", $apiSecret, $clientId, $_GET['location']);
  } else {
    $city = explode(", ", $_GET['location'])[0];
    $state = explode(", ", $_GET['location'])[1];
    $apiUrl = sprintf("https://api.seatgeek.com/2/events?venue.city=%s&venue.state=%s", $city, $state);
  }
  if (isset($_GET['radius']) && is_numeric($_GET['radius'])) {
    $apiUrl .= "&range=" . $_GET['radius'] . "mi";
  }
  if ($_GET['type'] != 'all') {
    $apiUrl .= "&taxonomies.name=" . $_GET['type'];
  }
  $json = json_decode(file_get_contents($apiUrl . "&per_page=15"), true);
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

    foreach($json['events'] as $key=>$event) {
      $date = date_format(date_create($event['datetime_local']), 'M d, Y @ g:m A (T)');
      echo "<tr>";
      if($event['performers'][0]['image']) {
        echo "<td style=\"background: url('" . $event['performers'][0]['image'] . "') no-repeat; background-size: cover;\"></td>";
      } else {
        echo "<td><div class='well' style='color:black'>No Image<br>Provided</div></td>";
      }
      echo sprintf("<td class='right'><span class='eventName'>%s</span><br><span class='small'>Location: %s</span><br><span class='small'>Time: %s</span><br><a class='btn btn-primary btn-large' target='_blank' href='%s'>More Details &raquo;</a><br></td>", $event['short_title'], $event['venue']['name'], $date, $event['url']);
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