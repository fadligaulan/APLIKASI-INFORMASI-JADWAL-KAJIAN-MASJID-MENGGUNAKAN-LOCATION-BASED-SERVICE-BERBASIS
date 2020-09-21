<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Info Kajian Islami | Registrasi Masjid</title>
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/images/icons/fadli.ico') ?>"/>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
      #target {
        width: 345px;
      }
    </style>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#setLokasi').click(function(){
          var databack = $("#modal-info #lat #lng").val().trim();
            $('#lat').html(databack);
            $('#lng').html(databack);

        });
      });
    </script>
  <!-- HTML5 Shim and Respond.js'); ?> IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js'); ?> doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'); ?>"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); ?>"></script>
  <![endif]-->

  <!-- Google Font -->
 <!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head> -->
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>Info Kajian Islami</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Daftarkan nama masjid</p>

    <form action="" method="post" id="form-data" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" name="nama_masjid" class="form-control" placeholder="Nama Masjid" required="">
        <span class="glyphicon glyphicon-home form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
       <input type="text" name="alamat_masjid" class="form-control" placeholder="Alamat Masjid" required="">
        <span class="glyphicon glyphicon-road form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                Tambahkan lokasi masjid
        </button> 
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="lat" class="form-control" id="lat" readonly="true" required="">
      </div>
      <div class="form-group has-feedback">
         <input type="text" name="lng" class="form-control" id="lng" readonly="true" required="">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="contact_masjid" class="form-control" placeholder="Kontak Masjid" required="">
        <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="file" name="foto_masjid" class="form-control" id="fileUpload" placeholder="Foto Masjid" >
        <span class="glyphicon glyphicon-cloud-upload form-control-feedback"></span><br>
        <span style="color:red"> Note: Please select only image file (eg: .png, .jpeg, .jpg, .gif etc)<br/> Max File size : 1MB allowed </span>
      </div> 
      
      <div class="row">
        <!-- /.col -->

        <div class="col-xs-4">
          <button type="submit" name="submit" value="true" class="btn btn-success">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="modal modal-info fade" id="modal-info">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Info Modal</h4>
          </div>
          <div class="modal-body">
            <div id="map"></div>
              <form method="post">
                  <input type="hidden" name="lat" id="lat" readonly="yes"><br>
                  <input type="hidden" name="lng" id="lng" readonly="yes">
                  
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="setLokasi" class="btn btn-outline pull-right" data-dismiss="modal">Atur Lokasi</button>
            <!-- <button type="button"  class="btn btn-outline" name="submit">Save changes</button> -->
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    
    <style type="text/css">
      #map{ width:580px; height: 500px; }
    </style>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAScZNbPZNhc4DKTAY8MHSSiroe-NcQ5pg&callback=initMap"></script>
    <title>Save Marker Example</title>

    <!-- <div id="map"></div>
    <form method="post">
        <input type="text" id="lat" readonly="yes"><br>
        <input type="text" id="lng" readonly="yes">
        <input type="text" id="alamat" readonly="yes">
    </form> -->
    
    <script type="text/javascript">
      var map; //Will contain map object.
      var marker = false; ////Has the user plotted their location marker? 
              
      //Function called to initialize / create the map.
      //This is called when the page has loaded.
      var map, infoWindow;
      
      var uploadField = document.getElementById("fileUpload");

        uploadField.onchange = function() {
            if(this.files[0].size > 1000000){
               alert("Ukuran file terlalu besar!");
               this.value = "";
            };
        };
      function initMap() {
       
          //The center location of our map.
          var centerOfMap = new google.maps.LatLng(52.357971, -6.516758);
          infoWindow = new google.maps.InfoWindow;
       
          //Map options.
          var options = {
            center: centerOfMap, //Set center.
            zoom: 18 //The zoom value.
          };
       
          //Create the map object.
          map = new google.maps.Map(document.getElementById('map'), options);
       
          //Listen for any clicks on the map.
          google.maps.event.addListener(map, 'click', function(event) {                
              //Get the location that the user clicked.
              var clickedLocation = event.latLng;
              //If the marker hasn't been added.
              if(marker === false){
                  //Create the marker.
                  marker = new google.maps.Marker({
                      position: clickedLocation,
                      map: map,
                      draggable: true //make it draggable
                  });
                  //Listen for drag events!
                  google.maps.event.addListener(marker, 'dragend', function(event){
                      markerLocation();
                  });
              } else{
                  //Marker has already been added, so just change its location.
                  marker.setPosition(clickedLocation);
              }
              //Get the marker's location.
              markerLocation();
          });

          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
              var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
              };

              infoWindow.setPosition(pos);
              infoWindow.setContent('Lokasi Anda Saat Ini');
              infoWindow.open(map);
              map.setCenter(pos);

              document.getElementById('lat').value = position.coords.latitude; //latitude
              document.getElementById('lng').value = position.coords.longitude; //longitude

              // var geocoder  = new google.maps.Geocoder();
              // var location  = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
              // geocoder.geocode({'latLng': location}, function (results, status) {
              //   if(status == google.maps.GeocoderStatus.OK) {
              //     var add=results[0].formatted_address;
              //     document.getElementById('alamat').value = add;
              //   } else {
              //     document.getElementById('alamat').value = 'Not found';
              //   }
              // })

            }, function() {
              handleLocationError(true, infoWindow, map.getCenter());
            });
          } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }
      }
              
      //This function will get the marker's current location and then add the lat/long
      //values to our textfields so that we can save the location.
      function markerLocation(){
          //Get location.
          var currentLocation = marker.getPosition();
          //Add lat and lng values to a field that we can save.
          document.getElementById('lat').value = currentLocation.lat(); //latitude
          document.getElementById('lng').value = currentLocation.lng(); //longitude

          // var geocoder  = new google.maps.Geocoder();
          // var location  = new google.maps.LatLng(currentLocation.lat(), currentLocation.lng());
          // geocoder.geocode({'latLng': location}, function (results, status) {
          //   if(status == google.maps.GeocoderStatus.OK) {
          //     var add=results[0].formatted_address;
          //     document.getElementById('alamat').value = add;
          //   } else {
          //     document.getElementById('alamat').value = 'Not found';
          //   }
          // })
      }
              
              
      //Load the map when the page has finished loading.
      google.maps.event.addDomListener(window, 'load', initMap);
    </script>
    
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>

</body>
</html>
        
