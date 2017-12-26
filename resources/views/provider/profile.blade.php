@extends('layouts.master')
@section('bodytitle')
User Profile
@endsection
@section('content')

<div class="table-responsive">
  {{Form::open(['route' => 'postProviderProfile'])}}
  {{Form::token()}}
  <center>
  <table class="table" width="50%" align="center">
    <thead>
      <tr>
        <th>Fields</th>
        <th>Input</th>
      </tr>
    </thead>


    <tbody>
      <tr>
        <td class="success">{{Form::label('email', 'E-Mail Address', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('email', $user->email, ['readonly'])}}
        </td>
        <td class="success">{{Form::label('name', 'Name', ['class' => 'awesome'])}}
        </td>
        <td>
        {{Form::text('name', $user->name)}}
        </td>
      </tr>
      <tr>
        <td class="success">{{Form::label('newpassword', 'New Password', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::password('newpassword', '')}}
        </td>
        <td class="success">{{Form::label('cnic', 'CNIC', ['class' => 'awesome'])}}
        </td>
        <td>
          {{Form::text('cnic', $user->cnic, ['readonly'])}}
        </td>
      </tr>
      <tr colspan="4">
        <td class="success">{{Form::label('password', 'Current Password', ['class' => 'awesome'])}}</td>
        <td>{{Form::password('password', '', ['class' => 'awesome'])}}</td>
      </tr>
      <tr>

        <td align="center" class="info" colspan="4">{{Form::submit('Save Profile')}}</td>
      </tr>
    </tbody>
    {{Form::close()}}
  </table>
</div>
</center>

@endsection
