<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Calculation</title>
</head>

<body style="padding: 100px;">
    <form action="{{route('calculation.update', $details->id)}}" method="POST">

        @method('PUT')
        @csrf
        <h1></h1>
        <table>
            <tbody>
                <tr>
                    <td><input type="text" id="total" name="given" onclick="fun(1)" class="form-control" value="{{$details->additionalCost->first()->given}}" placeholder="Total"></td>
                </tr>
            </tbody>
        </table>

        <table>
            <thead>
                <th>Operation</th>
                <th>Price</th>
                <th>Comment</th>
                <th>Action</th>
            </thead>

            <tbody id="row">
                @foreach ($details->additionalCost as $key => $value)
                <tr id="tr_{{$key}}">
                    <td>
                        <select name="op_type[]" onclick="fun(0)" id="operation_{{$key}}" class="form-control">

                            <option value="{{$value->op_type}}" selected>{{$value->op_type == 1 ? 'Add' : 'Subtract'}}</option>
                            <option value="1" class="" {{$value->op_type == 1 ? 'hidden' : ''}}>Add</option>
                            <option value="2" class="" {{$value->op_type == 2 ? 'hidden' : ''}}>Subtract</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="amount[]" id="c_a_{{$key}}" onkeyup="fun(0)" class="form-control" placeholder="Cost/Addition" value="{{$value->amount}}">
                    </td>
                    <td>
                        <input type="text" name="comment[]" id="comment_{{$key}}" class="form-control" value="{{$value->comment}}" placeholder="Comment" required>
                    </td>
                    <td>
                        <button type="button" id="{{$key == 0 ? 'addMore' : 'remove' }}" class="btn btn-{{$key == 0 ? 'success' : 'danger' }}">{{$key == 0 ? '+' : '-' }}</button>
                    </td>
                </tr>
                @endforeach
            </tbody>

            @php




            $arr = [];
            for($i=0;$i<count($details->additionalCost);$i++){

                $array=array("id"=>"c_a_$i", "c_a"=>"{$details->additionalCost[$i]->amount}", "operation"=>"{$details->additionalCost[$i]->op_type}");

                array_push($arr,$array);
                }
                @endphp




        </table>

        <table>
            <tbody id="another_total">

            </tbody>
        </table>

        <div id="message">

        </div>
        <!-- col md -->
        <div id="button" class="col-md-4" style="padding-top: 20px;">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        // var arr = new Array();
        var encoded = '<?php echo json_encode($arr); ?>';
        var arr = JSON.parse(encoded);
        // var obj = {};
        console.log(arr, 'to edit');

        setTimeout(function() {
            $.ajax({
                method: "GET",
                url: "{{ url('showFields') }}",
                data: {
                    total: $('#total').val(),
                    info: arr,
                },
                success: function(result) {
                    console.log(result);
                    per = 0;
                    localStorage.setItem("per", per);
                    // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                    $("#another_total").html(result);
                    // $("#message").html('');
                }
            });
        }, 1000);




        var initialize = JSON.parse("{{ json_encode($i) }}") ? parseInt(JSON.parse("{{ json_encode($i) }}"))-1 : 0;
        console.log(initialize, 'initialize');
        var init = 0;
        // obj = {
        //     id: null,
        //     c_a: 0,
        //     operation: 0,
        // };
        // arr.push(obj);
        $("#addMore").click(function() {
            obj = {
                id: null,
                c_a: 0,
                operation: 0,
            };
            arr.push(obj);

            initialize++;
            var html = '';
            html += '<tr id = "tr_' + initialize + '">';
            html += '<td><select name="op_type[]" id="operation_' + initialize + '" class="form-control"><option value="0" selected>Select Operation</option><option value="1">Add</option><option value="2">Subtract</option></select></td>';
            html += '<td><input type="text" name="amount[]" id="c_a_' + initialize + '" class="form-control" placeholder="Cost/Addition"></td>';
            html += '<td><input type="text" name="comment[]" id="comment_' + initialize + '" class="form-control" placeholder="Comment" required></td>';
            html += '<td><button id="remove" class="btn btn-danger">-</button></td></tr>';

            $('#row').append(html);
            fun(initialize);

        });

        // remove row
        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
            var trid = $(this).closest('tr').attr('id');
            console.log(trid);
            var id = trid.split('_');
            console.log(id[1], 'trid_num');
            index = parseInt(id[1]);
            // rmv = index;
            // console.log(rmv, 'rmv');
            // arr.splice(rmv, 1);
            obj = {
                id: null,
                c_a: 0,
                operation: 0,
            };
            // arr.push(obj);
            // var index = items.indexOf(3452);

            if (index !== -1) {
                arr[index] = obj;
            }
            console.log(arr, 'after removing', $('#total').val(), 'total');
            $.ajax({
                method: "GET",
                url: "{{ url('showFields') }}",
                data: {
                    total: $('#total').val(),
                    info: arr,
                },
                success: function(result) {
                    per = 0;
                    localStorage.setItem("per", per);
                    console.log(result);
                    // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                    $("#another_total").html(result);
                    // $("#message").html('');
                }
            });
        });



        function fun(init) {
            init = initialize;
            total = 0;
            var per = 0;

            $('#total').keyup(function() {
                // alert('hi');
                per = 1;
                localStorage.setItem("per", per);
                // $('#another_total').html('');
                // $("#another_total").append('<tr><td><input type="text" id="total_another" class="form-control" placeholder="Total" value="'+$('#total').val()+'"></td></tr>');

                $.ajax({
                    method: "GET",
                    url: "{{ url('showFields') }}",
                    data: {
                        total: $('#total').val(),
                        info: arr,
                    },
                    success: function(result) {
                        per = 0;
                        localStorage.setItem("per", per);
                        console.log(result);
                        // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                        $("#another_total").html(result);
                        // $("#message").html('');
                    }
                });
            });

            for (var i = 0; i <= init; i++) {


                $('#operation_' + i).change(function() {
                    var id = this.id;
                    var operation = $(this).val();
                    c_a = $('#c_a_' + id.substring(10)).val();
                    console.log(c_a, 'c_a');
                    console.log(operation, 'operation');
                    console.log(i, $('#total_another').val(), 'total_another');
                    total = $('#total_another').val() != 0 ? $('#total_another').val() : $('#total').val();
                    console.log(total, 'total');
                    obj = {
                        id: id,
                        c_a: c_a,
                        operation: operation,
                    };
                    arr.splice(parseInt(id.slice(10)), 1, obj);

                    console.log(arr, 'arr');

                    const map1 = new Map();


                    per = localStorage.getItem("per");
                    console.log(per, 'per');
                    $.ajax({
                        method: "GET",
                        url: "{{ url('showFields') }}",
                        data: {
                            total: $('#total').val(),
                            info: arr,
                        },
                        success: function(result) {
                            per = 0;
                            localStorage.setItem("per", per);
                            console.log(result);
                            // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                            $("#another_total").html(result);
                            // $("#message").html('');
                        }
                    });
                });

                $('#c_a_' + i).keyup(function() {
                    var id = this.id;
                    console.log(id, 'this id');
                    var c_a = $(this).val();
                    console.log(c_a, 'c_a');
                    operation = $('#operation_' + id.substring(4)).val();
                    console.log(operation, 'operation');
                    total = $('#total_another').val() != 0 ? $('#total_another').val() : $('#total').val();
                    console.log(total, 'total');
                    var c_a = $(this).val();
                    console.log(c_a, 'c_a');

                    obj = {
                        id: id,
                        c_a: c_a,
                        operation: operation,
                    };

                    arr.splice(parseInt(id.slice(4)), 1, obj);

                    console.log(arr, 'arr');

                    const map1 = new Map();

                    per = localStorage.getItem("per");
                    console.log(per, 'per');
                    $.ajax({
                        method: "GET",
                        url: "{{ url('showFields') }}",
                        data: {
                            total: $('#total').val(),
                            info: arr,
                        },
                        success: function(result) {
                            console.log(result);
                            per = 0;
                            localStorage.setItem("per", per);
                            // $("#message").append('<div class="alert alert-danger">Wait for some times</div>');

                            $("#another_total").html(result);
                            // $("#message").html('');
                        }
                    });
                });
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>