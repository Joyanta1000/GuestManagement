<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div>
        <div class="container" style="position: relative; padding: 100px;">
            <label for="">Adult Guest</label>
            <select name="" id="a_guest">
                <option value="0" selected>Select Number</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <label for="">Children Guest</label>
            <select name="" id="c_guest">
                <option value="0" selected>Select Number</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>


            <span id="a_children">

            </span>
            <br>
            <label id="max">
                
            </label>

            <span id="a_g_message" style="padding-left: 20px;">

            </span>

            <span id="c_g_message" style="padding-left: 20px;">

            </span>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#a_guest').change(function() {
            var a_guest = $('#a_guest').val();
            $('#max').html('');
            $('#max').append('Maximum guest 5');
            $('#a_g_message').html('');
            $('#a_g_message').append('<label for="">Adult Guest = ' + a_guest + '</label>');
        });
        $('#c_guest').change(function() {
            $('#max').html('');
            $('#max').append('Maximum guest 5');
            var c_guest = $('#c_guest').val();
            $('#c_g_message').html('');
            $('#c_g_message').append('<label for="">Child Guest = ' + c_guest + '</label>');
            $('#a_children').html('');
            if (c_guest != 0) {
                $('#a_children').append(
                    '<div style: "position:absolute; right: 20px;"><label for="">Age of Children</label>'
                    );
                for (var i = 1; i <= c_guest; i++) {
                    $('#a_children').append('<label>Child ' + i +
                        '</label><select name="" id="c_guest' +
                        i +
                        '"><option value="0" selected>Select Age</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><br></div>'
                    );
                }
            }
        });
    });
</script>

</html>
