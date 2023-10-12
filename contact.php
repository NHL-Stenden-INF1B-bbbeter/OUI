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
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
    <link href='https://fonts.googleapis.com/css?family=Caveat' rel='stylesheet'>
</head>
<body>
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
</body>
</html>