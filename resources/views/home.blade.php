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
{{Form::open(['route' => 'postServiceAdmin'])}}
{{Form::token()}}
<center>
@endsection
