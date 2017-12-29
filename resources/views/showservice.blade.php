@extends('layouts.master')
@section('bodytitle')
Welcome to Service Information Page
@endsection
@section('content')
<table class="table" width="50%" align="center">
  <tbody>
    <thead>
      <tr>
        <th>Provider Name</th>
        <th>Provider Location</th>
        <th>Your Location</th>
        <th>Description</th>
      </tr>
    </thead>
  <tr>
    <td>{{$provider->name}}
    </td>
    <td>
      {{$providerlocation = $serviceprovider->address." ".$serviceprovider->city." ".$serviceprovider->country}}
    </td>
    <td>
      {{$location}}
    </td>
    <td>
      {{$serviceprovider->description}}
    </td>
</tr>
<tr><td colspan="4">
  <div id="map"></div>
  <script>
      function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMb5TqwQsy_58xGWpj1iO1XE4utDeB67w&callback=initMap">
    </script>
    <iframe
  width="900"
  height="600"
  frameborder="0" style="border:0"
  src="{{"https://www.google.com/maps/embed/v1/directions
?key=AIzaSyCMb5TqwQsy_58xGWpj1iO1XE4utDeB67w
&origin=".$location."
&destination=".$providerlocation."
&avoid=tolls|highways"}}" allowfullscreen></iframe>
</td>  </tr>
</tbody>
</table>
@endsection
