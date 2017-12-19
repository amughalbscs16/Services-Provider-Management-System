<form method="post" action="{{ action('JudgeTeamController@postData') }}" accept-charset="UTF-8">
<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
  <input type="text" name="firstname" value="Ali Hassaan"><br>
    <input type="text" name="LastName" value="Ali Mughal"><br>
    <input type="submit" value="Submit">
</form>