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
        <th>Ratings/5</th>
        @auth
        @if(auth()->user()->role=="user")
        <th>
        ☆&nbsp;☆&nbsp;☆&nbsp;☆&nbsp;☆
        </th>
        @endif
        @endauth
        <th>Rating Count</th>
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
    <td>
      {{$serviceprovider->rating}}
    </td>
    @auth
    @if(auth()->user()->role=="user")
    <td>
    {{Form::open(['route' => 'postServiceRatings'])}}
    {{Form::token()}}
    {{Form::hidden('service_id',$serviceprovider->service_id)}}
    {{Form::hidden('provider_id',$serviceprovider->provider_id)}}
    {{Form::hidden('user_id',auth()->user()->id)}}
    {{Form::radio('rating','1')}}
    {{Form::radio('rating','2')}}
    {{Form::radio('rating','3')}}
    {{Form::radio('rating','4')}}
    {{Form::radio('rating','5')}}
    {{Form::submit('Rate')}}
    {{Form::close()}}
    </td>
    @endif
    @endauth
    <td>{{$serviceprovider->rating_count}}</td>
</tr>
<tr>
  @auth
  @if(auth()->user()->role=="user")
  <td colspan="7">
  @else
  <td colspan="6">
  @endif
  @endauth

    <iframe
  width="1000"
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
