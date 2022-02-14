<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #snackbar {
            visibility: hidden;
            min-width: 250px;
            margin-left: -125px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 2px;
            padding: 16px;
            position: fixed;
            z-index: 1;
            left: 50%;
            bottom: 30px;
            font-size: 17px;
        }

        #snackbar.show {
            visibility: visible;
            -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
            animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        @-webkit-keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @keyframes fadein {
            from {
                bottom: 0;
                opacity: 0;
            }

            to {
                bottom: 30px;
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }

        @keyframes fadeout {
            from {
                bottom: 30px;
                opacity: 1;
            }

            to {
                bottom: 0;
                opacity: 0;
            }
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div style="padding: 100px;">

        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

      
        <form action="{{route('update')}}" method="POST" onsubmit="return checkMyForm();">
            @csrf
            <div id="table">

            </div>

            <div id="snackbar" class="">
                Sequence is not correct
            </div>
            <div id="sequence">

            </div>
            <br>

            <div>
                <button id="submit" type="submit" class="UploadBtn btn bm bco mbs mts">Add Information</button>
            </div>
        </form>
    </div>
    <script>
        var count = 2;
        var w = 2;
        var w_1 = 3;
        
        var array = [];
        // array.splice(0,array.length)
        toEdit();

        function toEdit() {
            $.ajax({
                method: "GET",
                url: "{{ url('age_wise_prices/1') }}",
                // data: {
                //     room_id: 1,
                // },
                success: function(result) {
                    // per = 0;
                    // localStorage.setItem("per", per);
                    console.log(result);

                    $('#table').html(result.age_wise_price);

                    count = result.count+1;
                    w = result.w+2;
                    w_1 = result.w_1+2;

                    console.log(count, w, w_1);

                    array = result.array;

                    // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                    // $("#another_total").html(result);
                    // $("#message").html('');
                }
            });
        }

        $('#confirmation').change(function() {
            var open = 0;
            // if ($(this).val() == 1) {
            s = 1;
            open = 1;
            addField(s);
            $.ajax({
                method: "GET",
                url: "{{ url('showSelectFields') }}",
                data: {
                    open: $(this).val(),
                },
                success: function(result) {
                    // per = 0;
                    // localStorage.setItem("per", per);
                    console.log(result);

                    $('#table').html(JSON.stringify(result));

                    // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                    // $("#another_total").html(result);
                    // $("#message").html('');
                }
            });
            // $('#add_field').removeClass('hidden');
            // $('#thead').html('');
            // $('#thead').append('<tr><td>Min. Age</td><td>Max. Age</td><td></td><td>Price</td><td></td></tr>');

            // } else if ($(this).val() == 0) {
            // $('#add_field').addClass('hidden');
            // $('#select_field').html('');
            // $('#thead').html('');
            // $('#add_btn').addClass('hidden');
            // }
        });

        var any = 2;
        var any_1 = 3;
        
        var logic = 0;
        
        
        var s = 0;
        var toC = 0;
        var removed = 1;
        var addedField = 1;

        var ent = 1;

        function addfield() {
            // alert('hello');
            s = 1;
            addField(s);
        }
        // $('#add_field').click(function() {
        //     s = 1;
        //     addField(s);
        //     alert('hello');
        // });
        var loop = '';



        function addField(t) {
            addedField++;
            removed = 1;
            array.push(0);
            array.push(0);
            console.log(array);
            loop = '';
            var n = 20;
            var p = this.any;
            var p_1 = this.any_1;
            var max = array.reduce(function(a, b) {
                return Math.max(a, b);
            }, 0);

            console.log(max, 'max1');

            loop += '<tr ><td><select name="min[' + count + ']" data-id="' + w + '" class = "select optional form-control" id="min_' + count + '" onclick="ch(this)" required>';
            loop += '<option value = "0" selected>Select</option>';

            for (i = max; i <= max; i++) {

                // if (i > t) {
                //     loop += '<option value="' + i + '" hidden>' + i + '</option>';
                // } else  {

                // loop += '<option value="' + i + '" hidden>' + i + '</option>';
                loop += '<option value="' + i + '" >' + i + '</option>';
                // ent = ent+1; 
                // }
                // else{
                //     loop += '<option value="' + i + '" selected>' + i + '</option>';
                // }
                break;
            }

            loop += '</select></td>';

            loop += '<td><select name="max[' + count + ']" class = "form-control" data-id="' + w_1 + '" id="max_' + count + '" onclick="ch(this)" required>';
            loop += '<option value = "0">Select</option>';
            for (i = max; i <= 20; i++) {
                if (i < t) {
                    loop += '<option value="' + i + '" hidden>' + i + '</option>';
                } else {
                    loop += '<option value="' + i + '">' + i + '</option>';
                }
            }

            loop += '</select></td><td><input class="form-control" name="price[' + count + ']" required/></td><td>Tk</td><td><button id = "remove" class = "btn btn-danger">-</button></td></tr>';
            this.logic += count;
            check(logic);
            count++;

            any++;
            any_1 += 2;
            w += 2;
            w_1 += 2;

            appendOrNot(s, loop, w_1);


        }

        $(document).on('click', '#remove', function() {
            var id = $(this).parent().parent().find('select').attr('data-id');
            var id_1 = parseInt(id) + 1;
            for (var i = id; i <= id_1; i++) {

                array[i] = 0;
            }
            console.log(id);
            console.log(array, 'after removing');
            $(this).closest("tr").remove();
            removed++;
            console.log(removed, 'removed');
        });

        var ad = 1;

        function appendOrNot() {
            if (s == 1) {
                $('#select_field').append(loop);
            } else {

            }
        }

        var current_selected = [];

        function ch(identifier) {

            // alert(identifier.id);

            var decreased_1 = parseInt(identifier.id.substring(4)) - 1;

            var list = [];
            var list_1 = [];

            if ($('#min_' + identifier.id.substring(4)).val() > $('#max_' + decreased_1).val()) {
                $('#message').empty();

                $('#min_' + identifier.id.substring(4)).empty().populate(list)
                $('#message').append('<label style="color: red;">Select Same As Previous Max Age</label>');
            } else {

                $('#message').html('');

                console.log(any, 'any');
                console.log(any_1, 'any_1');

                var t = $(identifier).val();
                var max = $(identifier).val();

                var data_id = $(identifier).data('id');
                console.log(t, 't');
                s = 0;

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

                (function($) {
                    $.fn.populate = function(list) {
                        return this.append(list.map(item => $('<option>', {
                            text: item,
                            value: item
                        })));
                    };
                })(jQuery);

                for (i = max; i <= 20; i++) {
                    list.push(i);
                }

                (function($) {
                    $.fn.populate = function(list_1) {
                        return this.append(list_1.map(item => $('<option>', {
                            text: item,
                            value: item
                        })));
                    };
                })(jQuery);

                for (i = max; i <= max; i++) {
                    list_1.push(i);
                }

                console.log(identifier.id, 'id');

                console.log($('#' + identifier.id).val(), 'val');

                console.log($("selector").attr("data-id"), 'data-id');

                if ($('#' + identifier.id).val() <= max) {
                    if (identifier.id.substring(0, 3) == "min") {
                        // for (u = 1; u <= removed; u++) {
                        var decreased = parseInt(identifier.id.substring(4)) - 1;
                        console.log(decreased, '1st decreased', removed, 'removed to');
                        for (i = 1; i <= addedField; i++) {
                            var decreased = parseInt(identifier.id.substring(4)) - i;
                            console.log(decreased, '2nd decreased');
                            console.log($('#max_' + decreased).val(), 'max_' + decreased);
                            if ($('#max_' + decreased).val() == null) {
                                if (decreased != 2) {
                                    decreased = decreased - 1;
                                    // removed = removed + 1;
                                }

                            } else {
                                break;
                            }
                        }
                        console.log(decreased, 'decreased');
                        if ($('#' + identifier.id).val() < $('#max_' + decreased).val() || $('#' + identifier.id).val() > $('#max_' + decreased).val()) {
                            var increased = parseInt(identifier.id.substring(4));
                            console.log(increased, 'increased');

                            var list = [];
                            var list_1 = [];
                            for (i = $('#max_' + decreased).val(); i <= 20; i++) {
                                list.push(i);
                            }

                            for (i = $('#max_' + decreased).val(); i <= $('#max_' + decreased).val(); i++) {
                                list_1.push(i);
                            }

                            $('#' + identifier.id.substring(0, 3) + "_" + increased).empty().populate(list_1);
                            $('#max_' + increased).empty().populate(list);
                            removed = 1;
                            // break;
                        } else {

                        }
                        // }
                    }
                } else {

                    $('#' + identifier.id).empty().populate(list);
                }


            }

        }

        function check(logic) {
            console.log(logic, 'logic');
        }
        // $(document).on("click", ".UploadBtn", function(event) {
        // $(".p").each(function(file) {
        // if ($(this).val()) {
        //     $(".loader").show();
        //     $(".spinner").show();
        // $(".UploadBtn").prop("disabled", "true");
        // }
        // })
        function checkMyForm() {
            var disabled = 0;
            var co = 0;

            // var arrTo = '';
            // arrTo = array;

            // function removeItemAll(arrTo, value) {
            //     var i = 0;
            //     while (i < arrTo.length) {
            //         if (arrTo[i] === value) {
            //             arrTo.splice(i, 1);
            //         } else {
            //             ++i;
            //         }
            //     }
            //     return arrTo;
            // }

            // console.log(removeItemAll(arrTo, 0))

            // let arrTo = array.map(Math.sqrt).filter((_, i) => (i == 0));
            // console.log(arrTo, 'arrTo');

            function isPositive(value) {
                return value > 0;
            }

            function display(num) {
                return num;
            }
            var values = array;
            var filtered =
                values.map(display).filter(isPositive);

            console.log(filtered, 'filtered');

            for (x = 0; x < filtered.length - 1; x++) {
                if (filtered[co + 1] != null && filtered[co] != 0) {

                    if (filtered[co] == filtered[co + 1]) {
                        // isEqual = false; 
                        console.log(filtered[co], 'array[co]');
                        console.log(filtered[co + 1], 'array[co + 1]');
                        // $(".UploadBtn").prop("disabled", "false");
                        co = co + 2;
                    } else if (filtered[co] != filtered[co + 1]) {
                        console.log(filtered[co], 'array[co] q');
                        console.log(filtered[co + 1], 'array[co + 1] q');
                        disabled = 1;

                    }

                }

                // x++;
            }

            if (disabled == 1) {
                // $(".UploadBtn").prop("disabled", "true");
                // returnToPreviousPage();

                // $('#sequence_message').toastmessage('showSuccessToast', "Please check your inputs");
                // var x = document.getElementById("sequence_message");
                // x.className = "show";
                $('#sequence_message').addClass('show');
                $('#sequence').html('');
                $('#sequence').append('<div class="alert alert-danger"><strong>Sequence in not correct</strong></div>');
                setTimeout(function() {
                    // alert('Please check your inputs');
                    // x.className = x.className.replace("show", "");
                    $('#sequence_message').removeClass('show');
                }, 3000);
                return false;
            } else {
                $('#sequence').html('');
                return true;
            }
            // if(co==0){
            //     $(".UploadBtn").prop("disabled", "true");
            // }
            // else{
            //     $(".UploadBtn").prop("disabled", "false");
            // }
            console.log(co, 'co', array.length);
        }
        // });
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>