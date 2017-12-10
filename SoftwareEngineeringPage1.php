<!DOCTYPE html>

<html>
	<head>
		<title>Find Local Artist and Shows</title>
    <style>
        input[type=text] {
        width: 130px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        background-color: white;
        background-image: url('searchicon.png');
        background-position: center;
        background-repeat: no-repeat;
        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
        }

        input[type=text]{
            width: 50%;
        }

        body{
            background-image: url('https://media.giphy.com/media/nYijNcY8PWWrK/giphy.gif');
            background-size: cover;
        }

        div{
            margin-top: 25%;
            margin-left: 33%;
        }

        button{
            padding: 10px;
            margin-left: 20px;
        }


    </style>

    </head>
    <body>

    <div>
			<form action="SoftwareEngineeringPage2.html" method="get">
    <input type="text" name="search" placeholder="Search For Concerts Near You and Local Artists">
		<select name="category">
				<option value="music">By Artist</option>
				<option value="location">By Location</option>
		</select>
    <input value="search" type="submit">
	</form>
    </div>

    </body>
</html>
