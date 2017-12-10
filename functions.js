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
  console.log(json);
  var events = JSON.parse(json);
  for(var i=0;i<events.length;i++){
    event = events[i];
    var row_class = "";
    if(i%2==0){
        row_class = "even";
    }
    else{
      row_class = "odd";
    }
    var title = "<h1 class='w3-center'>" + event.title + "</h1>";
    var venue = "<h2 class='w3-center'>" + event.venue_name + "</h2>";
    var date = "<h2 class='w3-center'>" +  event.start_time + "</h2>";
    var description="";
    var image = "";
    if(event.description!=null){
      description= "<p class='description'>" + event.description + "</p>";
    }
    else{
      description="<p class='description'> No description available.</p>";
    }
    if(event.image!=null){
      image = "<img class='w3-center' src='" + event.image.medium.url + "'>";
    }


    var content = "<tr class='"+row_class+"'><td>" + title + image + venue + date + description + "</td></tr>";
    $("#events").append(content);
  }

}

//to Do: Check if variables are actual values or are null, as they are not guaranteed by the server to have values
