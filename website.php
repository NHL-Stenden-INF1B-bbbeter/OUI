<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type='text/javascript'>
    var map, searchManager;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {
            credentials: 'AmGg7bKbDv096VFC3dt8jfHaGgbY3WZrS6y6KV9kKM3_RCdcRV-mAUKo-1LRKcNT'
        });

        //Make a request to geocode New York, NY.
        geocodeQuery("Raadshuisplein 28, Emmen");
    }

    function geocodeQuery(query) {
        //If search manager is not defined, load the search module.
        if (!searchManager) {
            //Create an instance of the search manager and call the geocodeQuery function again.
            Microsoft.Maps.loadModule('Microsoft.Maps.Search', function () {
                searchManager = new Microsoft.Maps.Search.SearchManager(map);
                geocodeQuery(query);
            });
        } else {
            var searchRequest = {
                where: query,
                callback: function (r) {
                    //Add the first result to the map and zoom into it.
                    if (r && r.results && r.results.length > 0) {
                        var pin = new Microsoft.Maps.Pushpin(r.results[0].location);
                        map.entities.push(pin);

                        map.setView({ bounds: r.results[0].bestView });
                    }
                },
                errorCallback: function (e) {
                    //If there is an error, alert the user about it.
                    alert("No results found.");
                }
            };

            //Make the geocode request.
            searchManager.geocode(searchRequest);
        }
    }
    </script>
    <script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?callback=GetMap' async defer></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact/css/contact.css">
    <link rel="stylesheet" href="css/website.css">
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
    <title>OUI Website</title>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="header-logo">
                <a href="#home"><img class="logo" src="Logos/Logo-01.png" alt="OUI"></a>
            </div>
            <div class="header-links">
                <ul>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#about us">About us</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="home" id="home">
        <div class="home-content">OUI</div>
    </div>

    <!-- slideshow van de fotos -->

    <div id="container-slider">
        <div id="slider1">
            <figure>
                <img class="center-img" src="photos/pexels-chevanon-photography-302894.jpg" alt="koffie">
                <img class="center-img" src="photos/pexels-lilartsy-1793035.jpg" alt="thee">
                <img class="center-img" src="photos/pexels-maria-tyutina-814264.jpg" alt="thee 2">
                <img class="center-img" src="photos/pexels-christina-polupanova-10281101-2.jpg" alt="thee 2">
            </figure>
        </div>
        <div id="slider2">
            <figure>
                <img class="center-img" src="photos/pexels-chevanon-photography-302902.jpg" alt="koffie">
                <img class="center-img" src="photos/pexels-marta-dzedyshko-7597263-2.jpg" alt="thee">
                <img class="center-img" src="photos/pexels-chevanon-photography-302896-2.jpg" alt="thee 2">
                <img class="center-img" src="photos/pexels-chevanon-photography-302904-2.jpg" alt="thee 2">
            </figure>
        </div>
    </div>
    <div class="review-container">
        <div class="review1">
            <h1>PIET</h1>
            <h1>&starf; &starf; &starf; &starf; &starf;</h1>
            <p>“Ik was voor het eerst in Emmen en kwam hier terecht. Wat een fantastische koffie, 
                en het personeel is erg vriendelijk. Vandaar vijf sterren!”</p>
        </div>
        <div class="review2">
            <h1>KLAAS</h1>
            <h1>&starf; &starf; &starf; &starf; &starf;</h1>
            <p>“Ik studeer in Emmen, en had zin in een kopje koffie. Toen ik bij OUI kwam voelde het helemaal goed. 
                De koffie is lekker en het personeel is vriendelijk. Vijf sterren!”</p>
        </div>
    </div>
    <div class=contact-container>
        <div class=contact-header>Contact</div>
        <div class=contact-information>
            <p>
                <b>Our Location:</b><br>
                Raadshuisplein 28<br>
                Emmen<br><br>
                <b>Contact:</b><br>
                Mail: oui@mail.com<br>
                Phone: 050-226435<br><br><br><br><br>
                <b>Opening times:</b><br>
                Monday:&emsp;&emsp;&nbsp;12:00-18:00<br>
                Tuesday:&emsp;&ensp;&nbsp; 12:00-18:00<br>
                Wednesday:&ensp; 12:00-18:00<br>
                Thursday: &emsp;&nbsp; 12:00-18:00<br>
                Friday:&emsp;&emsp;&emsp; 12:00-18:00<br>
                Saturday:&emsp;&ensp;&nbsp; 12:00-18:00<br>
                Sunday: &emsp;&emsp; 12:00-18:00<br>
            </p>
        </div>
        <div id="myMap" class="maps-area" style="position:relative;width:600px;height:400px;"></div>
    </div>

    <!-- einde slideshow html -->
    
</body>
</html>