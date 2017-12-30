@extends('layouts.master')
@section('bodytitle')
Manage Services
@endsection
@section('content')
@if($message)
{{$message}}
@endif
<div class="table-responsive">
  {{Form::open(['route' => 'postServiceProvider'])}}
  {{Form::token()}}
  <center>
  <table class="table" width="50%" align="center">
    <thead>
      <tr>
        <th colspan="2">Fields</th>
        <th colspan="2">Input</th>
      </tr>
    </thead>


    <tbody>
      <tr>
        <td class="success">{{Form::label('pid', 'Your Provider ID', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('pid',$provider->id,['readonly'])}}
        </td>
        <td class="success">{{Form::label('sid', 'Service ID', ['class' => 'awesome'])}}
        </td>
        <td>
        {{Form::text('sid')}}
        </td>
      </tr>
      <tr>
        <td class="success">{{Form::label('city', 'City', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('city')}}
        </td>
        <td class="success">{{Form::label('country', 'Country', ['class' => 'awesome'])}}</td>
        <td>{{Form::text('country')}}</td>
      </tr>
      <tr colspan="4">

        <td class="success">{{Form::label('address', 'Service Address', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('address', '')}}
        </td>
        <td>{{Form::label('addedit', 'Add/Edit', ['class' => 'awesome'])}}</td>
        <td>
        Add:
        {{Form::radio('addedit', 'add')}}
        Edit:
        {{Form::radio('addedit', 'edit')}}
      </td>
      </tr>
      <tr>
        <td class="success" colspan="1">{{Form::label('description', 'Description', ['class' => 'awesome'])}}
        </td>
        <td colspan="3">
          {{Form::textarea('description', '')}}
        </td>
      </tr>
      <tr colspan="4">
        <td align="center" class="info" colspan="4">{{Form::submit('Add Service Provider')}}</td>
      </tr>
    </tbody>
    {{Form::close()}}
  </table>
  <h3>My Available Services</h3>
  <table class="table" width="50%" align="center">
    <tbody>
      <thead>
        <tr>
          <th>Service id</th>
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
      <td>{{$pservice->service_id}}
      </td>
      <td>
        {{$pservice->name}}
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
    </tr>
    @endforeach
  </tbody>
</table>
</div>

  <h3>All Available Services</h3>
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
