<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div id="output"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    $.ajax({
                    url: "{{route('pass_guests_info')}}",
                    method: "get",
                    // data: {
                    //     max: max,
                    //     adult_guest: adult_guest,
                    //     child_guest: child_guest,
                    //     age_of: age_of
                    // },
                    success: function(result) {
                        // $('.select-area').append('<option selected>Open this select menu</option>');
                        // $.each(result, function(key, value) {
                        //     $('.select-area').append('<option value="' + value.id + '">' + value.AreaName + '</option>');
                        // });
                        $('#output').html(result);
                        console.log(result, "result");
                    }
                });
</script>
</body>
</html> -->

<!-- @if(isset($guests))
{{dd($guests)}} -->

<!-- @foreach($guests as $guest) -->
    <!-- <div>
        <p>{{$guests->max}}</p>
        <p>{{$guests->adult_guest}}</p>
        <p>{{$guests->child_guest}}</p>
        <p>{{$guests->age_of}}</p>
    </div> -->
<!-- @endforeach -->
<!-- @endif -->

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div> -->
    <!-- session()->put('max', request()->get('max'));
        session()->put('adult_guest', request()->get('adult_guest'));
        session()->put('child_guest', request()->get('child_guest'));
        session()->put('age_of', request()->get('age_of')); -->
        {{dd(Session::get('max'))}}
        {{dd(Session::get('adult_guest'))}}
    <!-- </div>
</body>
</html> -->