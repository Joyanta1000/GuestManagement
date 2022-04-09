<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        .row {
            margin-top: 20px;
        }

    </style>
</head>

<body>
    <h1>Time Management</h1>
    <div class="container">
        <form action="{{ route('time_management.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="hours">Check In Time</label>
                    <input type="text" name="time" id="timeInput" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="hours">Meridiem</label>
                    <input type="text" name="meridiem" id="timeInput" class="form-control">
                </div>
            </div>

            <div class="row g-4">
                <div class="col">
                    <input type="text" name="to_back" id="to_back" class="form-control" placeholder="To Back">
                </div>
                <div class="col">
                    <div class="col">
                        <select name="timing" id="timing" class="form-control">
                            <option value="">Select Format</option>
                            <option value="min">Min</option>
                            <option value="hr">Hour</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('#timing').change(function(e) {
                callback(e);
            });

            $('#to_back').keyup(function(e) {
                callback(e);
            });

            function callback(e) {
                if ($('#timing').val() == 'min') {
                    var shot = $('#to_back').val();
                    var index = shot.indexOf(":");
                    var result;
                    if (index < 0) {
                        result = shot;
                    } else {
                        result = shot.substr(0, index);
                    }
                    document.querySelector('#to_back').value = result;
                } else {
                    document.querySelector('#to_back').value = $('#to_back').val();
                }
            }
        });
    </script>
</body>

</html>
