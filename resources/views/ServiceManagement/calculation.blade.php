<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Calculation</title>
</head>

<body>
    <h1></h1>
    <table>
        <tbody>
            <tr>
                <td><input type="text" id="total" class="form-control" placeholder="Total"></td>
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
            <tr>
                <td>
                    <select name="operation[]" onclick="fun(1)" id="operation_1" class="form-control">
                        <option value="0" selected>Select Operation</option>
                        <option value="1">Add</option>
                        <option value="2">Subtract</option>
                    </select>
                </td>
                <td>
                    <input type="text" id="c_a_1" onkeyup="fun(1)" class="form-control" placeholder="Cost/Addition">
                </td>
                <td>
                    <input type="text" id="comment_1" class="form-control" placeholder="Comment">
                </td>
                <td>
                    <button id="addMore" class="btn btn-success">+</button>
                </td>
            </tr>
        </tbody>

    </table>

    <table>
        <tbody id="another_total">

        </tbody>
    </table>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        // add row
        var initialize = 1;
        var init = 1;
        $("#addMore").click(function() {
            initialize++;
            var html = '';
            html += '<tr>';
            html += '<td><select name="operation[]" id="operation_' + initialize + '" class="form-control"><option value="0" selected>Select Operation</option><option value="1">Add</option><option value="2">Subtract</option></select></td>';
            html += '<td><input type="text" id="c_a_' + initialize + '" class="form-control" placeholder="Cost/Addition"></td>';
            html += '<td><input type="text" id="comment_' + initialize + '" class="form-control" placeholder="Comment"></td>';
            html += '<td><button id="remove" class="btn btn-danger">-</button></td></tr>';

            $('#row').append(html);

            fun(initialize);

            // $.ajax({
            //     method: "GET",
            //     url: "{{ url('showFields') }}",
            //     data: {
            //         initialize: initialize,
            //     },
            //     success: function(result) {
            //         console.log(result);
            //         $("#row").html(result);
            //     }
            // });
        });

        // remove row
        $(document).on('click', '#remove', function() {
            $(this).closest('tr').remove();
        });

        function fun(init) {
            init = initialize;
            // console.log(init);
            total = 0;
            for (var i = 1; i <= init; i++) {
                $('#operation_' + i).change(function() {
                    var id = $(this).attr('id');
                    var operation = $(this).val();
                    c_a = $('#c_a_' + id.substring(10)).val();
                    console.log(c_a, 'c_a');
                    console.log(operation, 'operation');
                    total = $('#total').val();
                    console.log(total, 'total');
                    // var id = $(this).attr('id');
                    // console.log(id,'id');
                    // var id_split = id.split('_');
                    // console.log(id_split,'id_split');
                    // var id_num = id_split[1];
                    // console.log(id_num, 'id_num');
                    // if (operation == 1) {
                    //     $('#c_a_' + id_num).attr('placeholder', 'Cost/Addition');
                    // } else if (operation == 2) {
                    //     $('#c_a_' + id_num).attr('placeholder', 'Cost/Subtraction');
                    // }
                    $.ajax({
                        method: "GET",
                        url: "{{ url('showFields') }}",
                        data: {
                            total: total,
                            c_a: c_a,
                            operation: operation,
                        },
                        success: function(result) {
                            console.log(result);
                            $("#another_total").html(result);
                        }
                    });
                });

                $('#c_a_' + i).keyup(function() {
                    var id = $(this).attr('id');
                    var c_a = $(this).val();
                    console.log(c_a, 'c_a');
                    operation = $('#operation_' + id.substring(4)).val();
                    console.log(operation, 'operation');
                    total = $('#total').val();
                    console.log(total, 'total');
                    var c_a = $(this).val();
                    console.log(c_a, 'c_a');
                    // var id = $(this).attr('id');
                    // console.log(id,'id');
                    // var id_split = id.split('_');
                    // console.log(id_split,'id_split');
                    // var id_num = id_split[1];
                    // console.log(id_num, 'id_num');
                    // if (operation == 1) {
                    //     $('#c_a_' + id_num).attr('placeholder', 'Cost/Addition');
                    // } else if (operation == 2) {
                    //     $('#c_a_' + id_num).attr('placeholder', 'Cost/Subtraction');
                    // }

                    $.ajax({
                        method: "GET",
                        url: "{{ url('showFields') }}",
                        data: {
                            total: total,
                            c_a: c_a,
                            operation: operation,
                        },
                        success: function(result) {
                            console.log(result['total']);
                            $("#another_total").html(result);
                        }
                    });
                });
            }
        }


        // }

        // function check(identifier){
        //     console.log(identifier.id.substr(4));

        //     // $('#operation_'+identifier.id.substr(4)).val();

        //     console.log($('#operation_'+identifier.id.substr(4)).val(), 'value');
        // }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>