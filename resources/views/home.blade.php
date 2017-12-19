@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{Form::open(['route' => ['home']])}}
                    Location: {{Form::text('location', 'Town G11 Etc.')}}
                    </br>
                Service: {{Form::select('service', ['L' => 'Mechanic', 'S' => 'Kamran Janjua', 'R' => 'Taimoor Ahmed'])}}
                </br>
                Location: {{Form::select('city', ['L' => 'Islamabad', 'S' => 'Karachi'])}}
                </br>
                </br>
                {{Form::submit('Search!')}}
                {!! Form::close() !!}
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
