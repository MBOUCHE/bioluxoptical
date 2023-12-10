<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title><?= $title; ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/');?>img/icon.png" type="image/x-icon">

    <!-- Font awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/menu/style.css" type="text/css" media="screen" />
    <link href="<?= base_url('assets/admin/lib/font-awesome/');?>css/font-awesome.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/');?>css/bootstrap.css" rel="stylesheet">   
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/slick.css">          
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/jquery.fancybox.css" type="text/css" media="screen" /> 
    <!-- Theme color -->
    <link id="switcher" href="<?= base_url('assets/');?>css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet">
    
    <!-- chargement des scripts --> 
    <script src="<?= base_url('assets/');?>scr/jquery.js" type="text/javascript"></script>
    <script src="<?= base_url('assets/');?>scr/jquery.validate.js" type="text/javascript"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/login/css/style.css" />

    <script src="<?= base_url('assets/');?>js/modernizr.custom.63321.js"></script>

    <script type="text/javascript">
        
        $(function(){
          $("#nav .dropdown").hover(
            function() {
              $('#products-menu.dropdown-menu', this).stop( true, true ).fadeIn("fast");
              $(this).toggleClass('open');
            },
            function() {
              $('#products-menu.dropdown-menu', this).stop( true, true ).fadeOut("fast");
              $(this).toggleClass('open');
            });
        });
    </script>

    <script src="<?= base_url('assets/');?>js/classie.js"></script>
    <script src="<?= base_url('assets/');?>js/uisearch.js"></script>

    <script>
        new UISearch( document.getElementById( 'sb-search' ) );
    </script>
    
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/');?>css/component.css" />

    <script type="text/javascript"> 
        if (navigator.geolocation) { 
            navigator.geolocation.getCurrentPosition(function(position) { 
                var latitude = position.coords.latitude; 
                var longitude = position.coords.longitude; 
                document.getElementById("latitude").innerHTML = latitude; 
                document.getElementById("longitude").innerHTML = longitude; 
            });  
        } 
        else { 
            alert("Votre navigateur ne supporte pas la géolocalisation"); 
        }   
    </script>
<!-- MORRIS CHART STYLES-->
<!-- TABLE STYLES-->

<link href="<?= base_url('assets/customer/'); ?>js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />    

  <script src="<?= base_url('assets/admin/'); ?>lib/bootstrap-wysihtml5/bootstrap-wysihtml5.css"></script>

  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script>
        function writeAddressName(latLng) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
            "location": latLng
            },
            function(results, status) {
                if (status == google.maps.GeocoderStatus.OK)
                    document.getElementById("address").innerHTML = results[0].formatted_address;
                else
                    document.getElementById("error").innerHTML += "Impossible de récupérer votre adresse" + "<br />";
                }
            );
        }

        function geolocationSuccess(position) {
            var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            // Write the formatted address
            writeAddressName(userLatLng);

            var myOptions = {
                zoom : 17,
                center : userLatLng,
                mapTypeId : google.maps.MapTypeId.ROADMAP
            };
            // Draw the map
            var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
            // Place the marker
            new google.maps.Marker({
                map: mapObject,
                position: userLatLng
            });
            // Draw a circle around the user position to have an idea of the current localization accuracy
            var circle = new google.maps.Circle({
                center: userLatLng,
                radius: position.coords.accuracy,
                map: mapObject,
                fillColor: '#0000FF',
                fillOpacity: 0.2,
                strokeColor: '#0000FF',
                strokeOpacity: 0.1
            });

            mapObject.fitBounds(circle.getBounds());
        }

        function geolocationError(positionError) {
            document.getElementById("error").innerHTML += "Erreur: " + positionError.message + "<br />";
        }

        function geolocateUser() {
            // If the browser supports the Geolocation API
            if (navigator.geolocation){
                var positionOptions = {
                enableHighAccuracy: true,
                timeout: 10 * 1000 // 10 seconds
            };
            
            navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
            }
            else
                document.getElementById("error").innerHTML += "Votre navigateur ne supporte pas l'API de géolocalisation.";
            }

    window.onload = geolocateUser;
    
    </script>
    <style type="text/css">
        #map {
        width: 100%;
        height: 404px;
        }
    </style>

  </head>

