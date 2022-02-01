<!DOCTYPE html>
<html lang="en">

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
    <div style="padding: 100px;">
        <button id="add_field" class="btn btn-primary">+</button>

        <div id="select_field" style="padding-top: 20px;">
            <br>
        </div>
    </div>
    <script>
        var any = 1;
        var any_1 = 2;

        var array = [];
        // $(document).ready(function() {
            var logic = 0;
            var count = 1;

            var w = 1;
            var w_1 = 2;

            $('#add_field').click(function() {
                addField();
            });

            function addField(t){
                var loop = '';
                var n = 20;

                var p = this.any;
                var p_1 = this.any_1;
                var max = array.reduce(function(a, b) {
                    return Math.max(a, b);
                }, 0);

                console.log(max, 'max1');
                
                loop += '<div><select data-id="' + w + '" class = "to" id="min_' + count + '" value = "0" onclick="ch(this)" >';
                loop += '<option>Select</option>';
                for (i = max; i <= 20; i++) {
                    if(i<t){
                        loop += '<option value="' + i + '" hidden>' + i + '</option>';
                    }
                    else{
                    loop += '<option value="' + i + '">' + i + '</option>';
                    }
                }

                loop += '</select>';

                loop += '</select><select data-id="' + w_1 + '" id="max_' + count + '" value = "0" onclick="ch(this)">';
                loop += '<option>Select</option>';
                for (i = max; i <= 20; i++) {
                    if(i<t){
                        loop += '<option value="' + i + '" hidden>' + i + '</option>';
                    }
                    else{
                    loop += '<option value="' + i + '">' + i + '</option>';
                    }
                }

                loop += '</select><button id = "remove" class = "btn btn-danger">-</button></div>';
                logic += count;
                check(logic);
                count++;

                any++;
                any_1 += 2;
                w += 2;
                w_1 += 2;

                

                $('#select_field').append(loop);
            }

            $(document).on('click', '#remove', function() {
                $(this).parent().remove();
            });

            var ad = 1;

            function check(logic) {
                for (var i = 1; i <= logic; i++) {
                    ad = i;
                    // $('min_'+1).change(function() {
                    // alert(ad);
                    // });
                    // ch(i);
                }
            }



        // });

        function ch(identifier) {
            console.log(any, 'any');
            console.log(any_1, 'any_1');

            // var t = document.getElementById('min_' + 1).value;
            var t = $(identifier).val();
            var max = $(identifier).val();
            var data_id = $(identifier).data('id');
            console.log(t, 't');
            // addField(t);
            console.log(data_id, 'data_id');
            if (t != 'Select') {
                array[data_id] = t;
                array.join();
            }


            console.log(array, 'array');

            var index = array.indexOf(t);
            console.log(index, 'index');

            var max = array.reduce(function(a, b) {
                return Math.max(a, b);
            }, 0);

            console.log(max, 'max');

        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>