@extends('layouts.master')
@section('bodytitle')
Add Services
@endsection
@section('content')
@if($message)
{{$message}}
@endif
<div class="table-responsive">
  {{Form::open(['route' => 'postServiceAdmin'])}}
  {{Form::token()}}
  <center>
  <table class="table" width="50%" align="center">
    <tbody>
      <tr>
        <td class="success">{{Form::label('name', 'Service Name', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('name')}}
        </td>
        <td class="success">{{Form::label('specification', 'Specification', ['class' => 'awesome'])}}
        </td>
        <td>
        {{Form::text('specification')}}
        </td>
      </tr>
      <tr>
        <td align="center" class="info" colspan="4">
          {{Form::submit('Add Service')}}
        </td>
      </tr>
    </tbody>
          {{Form::close()}}
    </table>

    <h3>Edit Service</h3>
    <table class="table" width="50%" align="center">
            {{Form::open(['route' => 'editServiceAdmin'])}}
            {{Form::token()}}
        <tbody>
        <tr>
          <td class="success">
            {{Form::label('id', 'Enter Service ID', ['class' => 'awesome'])}}
          </td>
          <td>
            {{Form::text('id')}}
          </td>
          <td class="success">{{Form::label('name', 'Service Name', ['class' => 'awesome'])}}
          </td>
          <td>
            {{Form::text('name')}}
          </td>
          <td class="success">{{Form::label('specification', 'Specification', ['class' => 'awesome'])}}
          </td>
          <td>
          {{Form::text('specification')}}
          </td>
        <tr>
          <td align="center" class="info" colspan="6">
            {{Form::submit('Edit Service')}}
          </td>
        </tr>
      </tbody>
            {{Form::close()}}
      </table>
    <table class="table" width="50%" align="center">
      <tbody>
        <thead>
          <tr>
            <th>Service id</th>
            <th>Service Name</th>
            <th>Specification</th>
          </tr>
        </thead>
      @foreach($services as $service)
      <tr>
        <td>{{$service->id}}
        </td>
        <td>{{$service->name}}
        </td>
        <td>{{$service->specification}}
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</center>

@endsection
