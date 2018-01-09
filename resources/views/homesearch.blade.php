@extends('layouts.master')
@section('bodytitle')
Search for Desired Service in Your Area
@endsection
@section('content')
{{Form::open(['route' => 'postUserCountry'])}}
{{Form::token()}}
<td class="success">
  {{Form::label('country', 'Country', ['class' => 'awesome'])}}
</td>
<td>
  {{ Form::select('country', $countries) }}
</td>
{{Form::submit('Select Country')}}
{{Form::close()}}

{{Form::open(['route' => 'postServicesData'])}}
{{Form::token()}}
<center>
<table class="table" width="50%" align="center">
  <tbody>
    <tr>
      <td class="success">{{Form::label('country', 'Country', ['class' => 'awesome'])}}
      </td>
      <td>
        {{Form::text('country',$selectedcountry,['readonly'])}}
      </td>
      <td class="success">{{Form::label('location', 'Your Location', ['class' => 'awesome'])}}
      </td>
      <td>
        {{Form::text('location')}}
      </td>
      <td class="success">{{Form::label('city', 'City', ['class' => 'awesome'])}}
      </td>
      <td>
        {{Form::select('city', $cities)}}
      </td>
      <td class="success">{{Form::label('name', 'Service Name', ['class' => 'awesome'])}}
      </td>
      <td>
      {{Form::select('name', $services)}}
      </td>
    </tr>
    <tr>
      <td align="center" class="info" colspan="8">
        {{Form::submit('Search Service')}}
      </td>
    </tr>
  </tbody>
        {{Form::close()}}
  </table>
  @if($showservices)
  <h3>My Available Services</h3>
  <table class="table" width="50%" align="center">
    <tbody>
      <thead>
        <tr>
          <th>Name</th>
          <th>Specification</th>
          <th>Address</th>
          <th>City</th>
          <th>Country</th>
          <th>Description</th>
          <th>Ratings/5</th>
          <th>Rating Count</th>
        </tr>
      </thead>
    @foreach($providedservices as $pservice)
    <tr>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->name}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->specification}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->address}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->city}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->country}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->description}}</a>
      </td>
      <td>
        <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->rating}}</a>
      </td>
      <td>
      <a href="{{route('searchServiceProvider', ['service_id' => $pservice->service_id, 'provider_id' => $pservice->provider_id, 'location' => $location.' '.$pservice->city.' '.$pservice->country])}}">{{$pservice->rating_count}}</a>
      </td>
    </tr></a>
    @endforeach
  @endif
@endsection
