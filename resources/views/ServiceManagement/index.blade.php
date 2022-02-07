<div class="input_fields_wrap">
    <button type="button" class="add_field_button btn btn-success">
        <i class="fa fa-plus" aria-hidden="true"></i> ADD More</button>

</div>
<br>
<input type="submit" value="Submit" class="btn btn-success" name="submitService">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function ch(identifier) {

        var service_name = $("#service_name_" + identifier.id.substring(13)).val();
        var id = $("#id_" + identifier.id.substring(13)).val();

        $.ajax({
            method: "GET",
            url: "{{ url('serviceDetailsShow') }}",
            data: {
                id: id,
                service_id: 'service_name_' + identifier.id.substring(13),
                service_name: service_name,
                ids_id: 'id_' + identifier.id.substring(13),

            },
            success: function(result) {
                // $("#service_result" + identifier.id.substring(13)).html('');

                // $("#service_result" + identifier.id.substring(13)).append('<input type="text" id="service_name_' + identifier.id.substring(13) + '" name="service_name[]" class="form-control"/> <input type="text" name="id[]" id="id_' + identifier.id.substring(3) + '" class="form-control"/>');
                // if (result.service_name != null) {
                //     console.log(result.service_name, 'service_name', identifier.id, identifier.id.substring(13));
                //     // $('#id_'+identifier.id.substring(3)).append(result.id);
                //     // document.getElementById("service_name_" + identifier.id.substring(13)).value = result.service_name;
                //     $("service_name_" + identifier.id.substring(13)).val(function() {
                //         return result.service_name;
                //     });
                // }
                // if (result.id != null) {
                //     console.log(result.id, 'id', identifier.id, identifier.id.substring(3));
                //     // $('#id_'+identifier.id.substring(3)).append(result.id);
                //     document.getElementById("id_" + identifier.id.substring(3)).value = result.id;
                // }
                // if (result.id != null) {
                //     $("#id_" + identifier.id.substring(3)).val(result.id);
                // }
                // // console.log(result);
                $("#service_result" + identifier.id.substring(13)).html(result);
            }
        });

    }
    $(document).ready(function() {
        var max_fields = 10; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        var j = 0;
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row" style="margin-left:2px; margin-top:2px;"><div class="row col-lg-5 col-md-5 col-sm-5 col-xs-5" ><input name="captions[]" onkeyup="ch(this)" id = "service_name_' + x + '"  placeholder="EX: Front View"  type="text" class="form-control"><input name="ids[]"  id = "id_' + x + '" value="'+ x +'" type="hidden" placeholder = "Ex: 1,2,3" class="form-control"></div><div class="row col-lg-5 col-md-5 col-sm-5 col-xs-5" ><div   id ="service_result' + x + '"></div></div><button type="button"  class = "remove_field btn btn-dangerbtn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Remove</button><div class="clearfix"></div></div>') //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            // x--;
        })

    });
</script>