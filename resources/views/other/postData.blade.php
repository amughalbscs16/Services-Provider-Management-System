
Form::open(['route' => 'JudgeTeamController@postData'])
@Form::token()
@Form::label('email', 'E-Mail Address', ['class' => 'awesome'])
@Form::text('username')
@Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...'])
@Form::submit('Click Me!')