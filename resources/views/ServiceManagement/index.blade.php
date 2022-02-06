<div class="input_fields_wrap">
    <button type="button" class="add_field_button btn btn-success">
        <i class="fa fa-plus" aria-hidden="true"></i> ADD More</button>

</div>
<br>
<input type="submit" value="Submit" class="btn btn-success" name="submitService">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    function ch(identifier) {

        var service_name = identifier.value;

        $.ajax({
            method: "GET",
            url: "{{ url('serviceDetailsShow') }}",
            data: {
                service_name: service_name
            },
            success: function(result) {
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
                $(wrapper).append('<div class="row" style="margin-left:2px; margin-top:2px;"><div class="row col-lg-5 col-md-5 col-sm-5 col-xs-5" ><input name="captions[]" onkeyup="ch(this)" id = "service_name_' + x + '"  placeholder="EX: Front View"  type="text" class="form-control"></div><div class="row col-lg-5 col-md-5 col-sm-5 col-xs-5" ><div   id ="service_result' + x + '"></div></div><button type="button"  class = "remove_field btn btn-dangerbtn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Remove</button><div class="clearfix"></div></div>') //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').remove();
            // x--;
        })

    });
</script>