@if(count($errors->all()) > 0 )
    <ul class="bg-danger">
        @foreach($errors->all() as $error)
            <li class="text-white">{{$error}}</li>
        @endforeach
    </ul>
@endif
