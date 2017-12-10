<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Home | NearMe</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script>
      function setCurrentLoc() {
        $('#location').attr('placeholder', '');
        $('#location').val('Current Location');
        //document.getElementById('location').value = "Current Location";
      }
    </script>
  </head>

  <body>
    <div class="container">
      <form class="form-horizontal" action="events.php" method="GET">
        <h2 class="form-signin-heading">NearMe</h2>
        <input type="hidden" name="currentPage" value="1">
        <input type="text" name="location" id="location" class="form-control" placeholder="Location (city, state abbr or zip code)" required>
        <input type="text" name="radius" id="radius" class="form-control" placeholder="Radius (in miles)">
        <br>
        <label>Event Type</label>
        <select class="form-control" name="type" required>
          <option value='all'>All Types</option>
          <option value='music'>Concert</option>
          <option value='sports'>Sports</option>
        </select>
        <br>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">View Events</button>
      </form>

    </div> <!-- /container -->
  </body>
</html>
