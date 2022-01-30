<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
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

            <span id="a_g_message" style="padding-left: 20px;">

            </span>

            <span id="c_g_message" style="padding-left: 20px;">

            </span>

            <span id="max" style="padding-left: 20px;">

            </span>

            <label id="age_of_children" style="padding-left: 20px;">

            </label>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        var a = [];

        $('#a_guest').change(function() {
            var a_guest = $('#a_guest').val();
            $('#max').html('');
            $('#max').append('<label for="">Maximum guest 5</label>');
            $('#a_g_message').html('');
            $('#a_g_message').append('<label for="">Adult Guest = ' + a_guest + '</label>');
        });
        $('#c_guest').change(function() {

            var c_guest = $('#c_guest').val();
            a = [];
            for (var i = 1; i <= c_guest; i++) {
                a.push('0');
            }
            this.a = a;

            age(a);

            $('#max').html('');
            $('#max').append('<label for="">Maximum guest 5</label>');

            $('#c_g_message').html('');
            $('#c_g_message').append('<label for="">Child Guest = ' + c_guest + '</label>');
            $('#a_children').html('');
            if (c_guest != 0) {
                $('#a_children').append(
                    '<div style: "position:absolute; right: 20px;"><label for="">Age of Children</label>'
                );
                for (var i = 0; i < c_guest; i++) {
                    $('#a_children').append('<label>Child ' + (i+1) +
                        '</label><select name="" id="ag_guest_' + i + '"><option value="0" selected>Select Age</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select><br></div>'
                    );
                }
            }
        });
        let c_guest = 0;
        $('#c_guest').change(function() {
            this.c_guest = $('#c_guest').val();
            ageOfGuest(this.c_guest);
        });

        function ageOfGuest(c_guest) {
            for (var i = 0; i < c_guest; i++) {
                $('#ag_guest_' + i).change(function() {
                    var id = this.id;
                    a.splice(id.slice(9), 1, document.getElementById(this.id).value);
                    age(a);
                });
            }
        }

        function age() {
            $('#age_of_children').html('');
            $('#age_of_children').append('Age of Children = [' + a + ']');
        }

    });
</script>

</html>