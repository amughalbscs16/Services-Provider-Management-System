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
      <td class="success">{{Form::label('country', 'Your Location', ['class' => 'awesome'])}}
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
        </tr>
      </thead>
    @foreach($providedservices as $pservice)
    <tr>
      <td>
        <a href="{{route('searchServiceProvider',
        ['sid' => $pservice->service_id, 'pid' => $pservice->provider_id , 'location' => $location])}}">{{$pservice->name}}</a>
      </td>
      <td>
        {{$pservice->specification}}
      </td>
      <td>
        {{$pservice->address}}
      </td>
      <td>
        {{$pservice->city}}
      </td>
      <td>
        {{$pservice->country}}
      </td>
      <td>
        {{$pservice->description}}
      </td>
    </tr></a>
    @endforeach
  @endif
@endsection
