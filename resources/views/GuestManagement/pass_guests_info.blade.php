
        {{-- {{dd(Session::all())}} --}}

        <label for="">Adult Guest:</label>
        <div id="demo1">

        </div>
        <label for="">Child Guest:</label>
        <div id="demo2">

        </div>
        <label for="">Max:</label>
        <div id="demo3">

        </div>
        <label for="">Age of Childrens:</label>
        <div id="demo4">

        </div>
        <script>
            document.getElementById("demo1").innerHTML = localStorage.getItem("adult_guest");
            document.getElementById("demo2").innerHTML = localStorage.getItem("child_guest");
            document.getElementById("demo3").innerHTML = localStorage.getItem("max");
            document.getElementById("demo4").innerHTML = localStorage.getItem("age_of");
        </script>