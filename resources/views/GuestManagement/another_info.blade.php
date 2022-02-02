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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <div style="padding: 100px;">

        <label for="">Change For Children</label>
        <select class="form-control" name="" id="confirmation">
            <option value="">Select</option>
            <option value="0">No</option>
            <option value="1">Yes</option>
        </select>

        <br>

        <button id="add_field" class="btn btn-primary hidden">+</button>

<table>
    <thead id="thead">
        
    </thead>
    <div id="message"></div>
    <tbody id="select_field">
        
    </tbody>
</table>

        <!-- <div id="select_field" style="padding-top: 20px;">
            
        </div> -->
        <br>

        <div>
            <button id="submit" class="btn btn-success">Add Information</button>
        </div>
    </div>
    <script>
        $('#confirmation').change(function() {
            if ($(this).val() == 1) {
                s = 1;
                addField(s);
                $('#add_field').removeClass('hidden');
                $('#thead').html('');
                $('#thead').append('<tr><td>Min. Age</td><td>Max. Age</td><td></td><td>Price</td><td></td></tr>');

            }
            else if($(this).val() == 0){
                $('#add_field').addClass('hidden');
                $('#select_field').html('');
                $('#thead').html('');
                $('#add_btn').addClass('hidden');
            }
        });



        var any = 1;
        var any_1 = 2;

        var array = [];
        // $(document).ready(function() {
        var logic = 0;
        var count = 1;

        var w = 1;
        var w_1 = 2;

        var s = 0;

        var toC = 0;

        $('#add_field').click(function() {
            s = 1;
            addField(s);
        });
        var loop = '';

        function addField(t) {
            loop = '';
            var n = 20;

            var p = this.any;
            var p_1 = this.any_1;
            var max = array.reduce(function(a, b) {
                return Math.max(a, b);
            }, 0);

            console.log(max, 'max1');

            loop += '<tr ><td><select data-id="' + w + '" class = "select optional form-control" id="min_' + count + '" value = "0" onclick="ch(this)" required>';
            loop += '<option >0</option>';
            for (i = max; i <= 20; i++) {
                if (i < t) {
                    loop += '<option value="' + i + '" hidden>' + i + '</option>';
                } else {
                    loop += '<option value="' + i + '">' + i + '</option>';
                }
            }

            loop += '</select></td>';

            loop += '<td><select class = "form-control" data-id="' + w_1 + '" id="max_' + count + '" value = "0" onclick="ch(this)" required>';
            loop += '<option>0</option>';
            for (i = max; i <= 20; i++) {
                if (i < t) {
                    loop += '<option value="' + i + '" hidden>' + i + '</option>';
                } else {
                    loop += '<option value="' + i + '">' + i + '</option>';
                }
            }

            loop += '</select></td><td><input class="form-control" name="price[]" required/></td><td>Tk</td><td><button id = "remove" class = "btn btn-danger">-</button></td></tr>';
            this.logic += count;
            check(logic);
            // ch(logic);
            count++;

            any++;
            any_1 += 2;
            w += 2;
            w_1 += 2;


            // $('#select_field').html('');

            appendOrNot(s, loop, w_1);


        }

        $(document).on('click', '#remove', function() {
            // $('this').parent().remove();
            $(this).closest("tr").remove();
        });

        var ad = 1;



        function appendOrNot() {
            if (s == 1) {
                $('#select_field').append(loop);
            } else {

                // toC = w_1;



                // addField(toC);
            }
        }



        // });

        var current_selected = [];

        function ch(identifier) {

            var decreased_1 = parseInt(identifier.id.substring(4)) - 1;

            var list = [];

            if ($('#min_' + identifier.id.substring(4)).val() > $('#max_' + decreased_1).val() ) {
                // alert("Select Same As Previous Max Age");
                $('#message').empty();
                $('#message').append('<label style="color: red;">Select Same As Previous Max Age</label>');
                $('#min_' + identifier.id.substring(4)).empty().populate(list)
            } else {

                $('#message').html('');




                console.log(any, 'any');
                console.log(any_1, 'any_1');

                // var t = document.getElementById('min_' + 1).value;
                var t = $(identifier).val();
                var max = $(identifier).val();
                // toC = max;
                // addField(toC);
                var data_id = $(identifier).data('id');
                console.log(t, 't');
                s = 0;
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



                // option list changing
                (function($) {
                    // Populates a select drop-down with options in a list 
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

                // check();

                // for (i = 2; i<=2; i++){

                //     $('#min_'+i).empty().populate(list);
                //     // i = i + 1;
                //     $('#max_'+i).empty().populate(list);
                // }
                console.log(identifier.id, 'id');

                console.log($('#' + identifier.id).val(), 'val');

                // if(identifier.id == "max"){
                //     current_selected.push($('#'+identifier.id).val());
                // }

                console.log($("selector").attr("data-id"), 'data-id');
                // var array = [];
                if ($('#' + identifier.id).val() <= max) {
                    if (identifier.id.substring(0, 3) == "min") {
                        var decreased = parseInt(identifier.id.substring(4)) - 1;
                        console.log(decreased, 'decreased');
                        if ($('#' + identifier.id).val() < $('#max_' + decreased).val()) {
                            var increased = parseInt(identifier.id.substring(4));
                            console.log(increased, 'increased');

                            var list = [];
                            for (i = $('#max_' + decreased).val(); i <= 20; i++) {
                                list.push(i);
                            }

                            $('#' + identifier.id.substring(0, 3) + "_" + increased).empty().populate(list);
                            $('#max_' + increased).empty().populate(list);
                        }
                    }
                } else {
                    // $(identifier).empty().populate(list);
                    $('#' + identifier.id).empty().populate(list);
                }


            }
            // option list changing

        }

        function check(logic) {
            console.log(logic, 'logic');
            // for (var i = 1; i <= logic; i++) {
            //     ad = i;
            //     // $('min_'+1).change(function() {
            //     // alert(ad);
            //     // });
            //     // ch(i);
            // }
        }
    </script>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>