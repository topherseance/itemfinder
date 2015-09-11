<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>Google Maps Multiple Markers</title>
  <script src="http://maps.google.com/maps/api/js?sensor=false"
          type="text/javascript"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
      @font-face {
          font-family: "KhmerUI";
          src: url({{url("fonts/KhmerUI.ttf")}});
      }

 html { height: 100% }
 body { height: 100%; margin: 0px; padding: 0px }
  #map {
	/*margin-top: 25px;*/
    height: 100%;
    width: 100%;
  }
      body{
          background: #F3F3F4 none repeat scroll 0% 0%;
      }
      .voucher{
          padding: 5px;
          background-color: #1AB394;
          border-color: #1AB394;
          text-align: center;
          cursor: pointer;
          border-radius: 3px;
          color: #ffffff;
          font-size: 13px;
      }
      .navbar{
          background: #F3F3F4 none repeat scroll 0% 0%;
          margin: 0px;
          font-family: "KhmerUI";
          min-height: 0px;
      }
      .wrapper{
          width: 100%;
          height: 100%;
      }

      .btn-info.focus,.btn-info:focus{
          color:#fff;
          background-color:#188f74;
          border-color: #136a54
      }

      .btn-info:hover{
          color:#fff;
          background-color:#188f74;
          border-color: #136a54
      }
      header{
          background-color: #1AB394;
          color: #fff;
      }
      .form-control{
          border-radius: 0;
          margin-left: 10px;
          width: 100%;
      }
      h1,h3,.h3, .h1{
          margin: 0px;
      }
      .circle{
          border-radius: 50%;
          border: 5px solid #1AB394;
          width: 110px;
          height: 110px;
          background-color: #fff;
          position: absolute;
          right: 10px;
          top: 0px;
          z-index: 1;
      }
      .text-vertical-center{
          min-height: 60px;
          padding-top: 13px;
      }
  </style>
</head>
<body>
    <header id="top" class="header" style="margin-top: 25px">
        <div class="circle"><img src="{{url('img/logo.png')}}" width="100px"></div>
        <div class="text-vertical-center">
            <table>
                <tr>
					<td>
						<h3 style="margin-left: 10px">ITEM FINDER : </h3>
					</td>
					<td style="width: 80%">
						<form id="myForm" action="{{ route('public.find') }}" method="GET">
						<input type="text" id="customForm" name="name" class="custom-form form-control" placeholder="Name of the item" value="{{ $name }}"/>
						</form>
					</td>
                </tr>
            </table>
        </div>
    </header>
    <p class="navbar">
        Searching for <strong>"{{ $name }}"</strong> nearby : {{ count($itemsFound) }} items found in {{ count($shopsFound) }} shops.
    </p>
  <div class="wrapper">
      <div id="directions-panel" class="panel"></div>

      <div id="map"></div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Voucher</h4>
              </div>
              <div class="modal-body">
                  <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>

      </div>
  </div>

  <script type="text/javascript">
    $(function() {
      $(document).keypress(function(e) {
          if (e.which == 13) {
              //window.location = '{{ url("find") }}' + '/' + $('#customForm').val();
			  $('#myForm').submit();
          }
      });
    });
    var locations = [
      @foreach($shopsFound as $key => $shop)
		[ '{{ $shop->name }}'+
            '<br>'+
            'Rp. {{ $itemsFound[$key]->price }}'+
            '<br>'+

            '<button type="button" class="btn btn-info btn-lg btn-block voucher" id="button" onclick="getDirection({{ $shop->latitude }},{{ $shop->longitude }})">Proceed</button>'
            , {{ $shop->latitude }} , {{ $shop->longitude }} , {{ $shop->id }} ],
	  @endforeach
    ];
	
	var center = {lat: -7.9578542, lng: 112.5890962};

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 18,
      center: new google.maps.LatLng(-7.9578542,112.5890962),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      scrollwheel: false,
      fillColor: "#1AB394",
      fillOpacity: 0.1,
    });

    var infowindow = new google.maps.InfoWindow();
    var marker, i;
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(-7.9578542,112.5890962),
        map: map,
        icon: {
            url: "{{url('img/current.png')}}",
            scaledSize: new google.maps.Size(48, 48)
        }
    });

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    var tempLat, tempLng;

    for (i = 0; i < locations.length; i++) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
          icon: {
              url: ( i%2 ? "{{url('img/free.png')}}" : "{{url('img/paid.png')}}"),
              scaledSize: new google.maps.Size(48, 48)
          }
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);

        }
      })(marker, i));
    }
    function calculateAndDisplayRoute(Lat,Lng) {
        var start = {lat: -7.9578542, lng: 112.5890962};
        var end = {lat: Lat, lng: Lng};
        console.log(Lat);
        console.log(Lng);
        directionsService.route({
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

    function getDirection(Lat,Lng) {
        console.log('test');
        calculateAndDisplayRoute(Lat,Lng);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('panel'));
    }

  </script>
</body>
</html>