
    @if(isset($guests))
{{dd($guests)}}

<!-- @foreach($guests as $guest) -->
    <div>
        <p>{{$guests->max}}</p>
        <p>{{$guests->adult_guest}}</p>
        <p>{{$guests->child_guest}}</p>
        <p>{{$guests->age_of}}</p>
    </div>
<!-- @endforeach -->
@endif
