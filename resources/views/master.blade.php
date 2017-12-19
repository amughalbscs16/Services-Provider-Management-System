@section('content')
@if(auth()->role=='participant')

@endif

@elseif (auth->role=='judge')

@endif
@endsection
