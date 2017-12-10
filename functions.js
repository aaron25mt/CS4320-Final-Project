function getParameter(theParameter) {
  var params = window.location.search.substr(1).split('&');

  for (var i = 0; i < params.length; i++) {
    var p=params[i].split('=');
	if (p[0] == theParameter) {
	  return decodeURIComponent(p[1]);
	}
  }
  return false;
}

function fill_table(json){
  var events = JSON.parse(json);
  for(event in events){

    var title = "<h1 class='w3-center'>" + event.title + "</h1>";
    var venue = "<h2 class='w3-center'>" + event.venue_name + "</h2>";
    var date = "<h2 class='w3-center'>" +  event.start_time + "</h2>";
    var description= "<p>" + event.description + "</p>";
    var image = "<img src='" + event.image.medium.url + "'>";

    var content = "<tr><td>" + title + image + venue + date + description + "</td></tr>";
    $("#events").append(content);
  }

}
