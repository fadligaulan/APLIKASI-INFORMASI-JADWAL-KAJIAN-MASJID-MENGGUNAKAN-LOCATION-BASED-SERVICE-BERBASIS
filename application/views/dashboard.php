<div class="row">
  <div class="box box-solid">
    <div class="box-header with-border">
      <marquee><h3 class="box-title">SELAMAT DATANG DI WEBSITE INFO KAJIAN ISLAMI</h3></marquee>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <?php foreach($masjid as $row): ?>
            <center><img src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="First slide"></center>

            <div class="carousel-caption">
              First Slide
            </div>
          </div>
          <div class="item">
            <center><img src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="Second slide"></center>

            <div class="carousel-caption">
              Second Slide
            </div>
          </div>
          <div class="item">
            <center><img src="<?php echo base_url('assets/foto/masjid/' .$row->foto_masjid); ?>" alt="Third slide"></center>
            <?php endforeach; ?>
            <div class="carousel-caption">
              Third Slide
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="fa fa-angle-right"></span>
        </a>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3><?php echo $kajian_byid; ?><sup style="font-size: 20px"></sup></h3>

        <p>Jumlah Kajian</p>
      </div>
      <div class="icon">
        <i class="fa fa-book"></i></i>
      </div>
      <a href="<?php echo site_url('kajian'); ?>" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>



  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo $audio_byid; ?><sup style="font-size: 20px"></sup></h3>

        <p>Jumlah Audio Kajian</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?php echo site_url('audio-kajian'); ?>" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>



  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3><?php echo $video_byid; ?><sup style="font-size: 20px"></sup></h3>

        <p>Jumlah Video Kajian</p>
      </div>
      <div class="icon">
        <i class="ion ion-stats-bars"></i>
      </div>
      <a href="<?php echo site_url('video-kajian'); ?>" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>



  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-red">
      <div class="inner">
        <h3><?php echo $streaming_byid; ?><sup style="font-size: 20px"></sup></h3>

        <p>Jumlah Kajian Live Streaming</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="<?php echo site_url('live-streaming'); ?>" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-md-6">
    <div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Jumlah Aktivitas Masjid</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <div class="box-body">
      <canvas id="pieChart" style="height:250px"></canvas>
    </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Lokasi User</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
          <div class="form-group">
              <!-- provider_counter service id  !-->
              <!-- <label for="provider_counter" class="control-label">Closest Providers :</label> -->
              <div class="text-lg-center alert-danger"id="info"></div>
              <!-- display map  !-->
              <div id="map" style="height: 40%; width:100%;"></div>
              <!-- current latituide and longtuide  !-->
              <input id="ProviderId" name="ProviderId" type="hidden" value="" />
              <input id="lat" type="hidden" value="" />
              <input id="lng" type="hidden" value="" /><br>
          </div>
        </form>
      </div>
      <!-- /.box-body -->
    </div>
  </div>
</div>


<script>

    var lat = document.getElementById("lat"); // this will select the input with id = lat 
    var lng = document.getElementById("lng"); // this will select the input with id = lng   
    var info = document.getElementById("info"); // this will select the current div  with id = info 
    var ServiceId = document.getElementById("ServiceId"); // this will select the input with id = ServiceId 
    var locations = [];
    var km = 30; // this kilometers used to specify circle wide when use drawcircle function
    var Crcl ; // circle variable
    var map; // map variable
    var mapOptions = {
        zoom: 18,
        center: {lat:24.774265, lng:46.738586}
    }; // map options
    var markers = []; // markers array ,we will fill it dynamically
    var infoWindow = new google.maps.InfoWindow(); // information window ,we will use for our location and for markers
    // this will initiate when load the page and have all
    function initialize() {
        // set the map to the div with id = map and set the mapOptions as defualt
        map = new google.maps.Map(document.getElementById('map'),
            mapOptions);

        var infoWindow = new google.maps.InfoWindow({map: map});

        // get current location with HTML5 geolocation API.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                lat.value  =  position.coords.latitude ;
                lng.value  =  position.coords.longitude;
                info.nodeValue =  position.coords.longitude;
                // set the current posation to the map and create info window with (Here Is Your Location) sentense
                infoWindow.setPosition(pos);
                infoWindow.setContent('Here Is Your Location.');
                // set this info window in the center of the map 
                map.setCenter(pos);
                // draw circle on the map with parameters
                DrowCircle(mapOptions, map, pos, km);

            }, function() {
                // if user block the geolocatoon API and denied detect his location
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());

        }
    }
    // to handle user denied
    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: User Has Denied Location Detection.' :
            'Error: Your browser doesn\'t support geolocation.');
    }

    // to draw circle around 30 kilometers to current location
    function DrowCircle(mapOptions, map, pos, km ) {
        var populationOptions = {
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: pos,
            radius: Math.sqrt(km*500) * 100
        };
        // Add the circle for this city to the map.
        this.Crcl = new google.maps.Circle(populationOptions);
    }
    // this function to get providers with ajax request
    function RelatedLocationAjax() {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>services/closest_locations",
            dataType: "json",
            data:"data="+ '{ "latitude":"'+ lat.value+'", "longitude": "'+lng.value+'", "ServiceId": "'+ServiceId.value+'" }',
            success:function(data) {
                // when request is successed add markers with results
                add_markers(data);
            }
        });
    }
    // this function to will draw markers with data returned from the ajax request
    function add_markers(data){
        var marker, i;
        var bounds = new google.maps.LatLngBounds();
        var infowindow = new google.maps.InfoWindow();
        // display how many closest providers avialable 
        document.getElementById('info').innerHTML = " Available:" + data.length + " Providers<br>";

        for (i = 0; i < data.length; i++) {
            var coordStr = data[i][2];
            var coords = coordStr.split(",");
            var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
            bounds.extend(pt);
            marker = new google.maps.Marker({
                position: pt,
                map: map,
                icon: data[i][3],
                address: data[i][1],
                title: data[i][0],
                html: data[i][0] + "<br>" + data[i][1]
            });
            markers.push(marker);
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })
            (marker, i));

        }
        // this is important part , because we tell the map to put all markers inside the circle,
        // so all results will display and centered
        map.fitBounds(this.Crcl.getBounds());
    }

    google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY&callback=initialize">
</script>


  
 



