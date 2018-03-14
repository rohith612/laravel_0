<!DOCTYPE html>

<html>

<head>

    <title> Ajax Request </title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

    <div class="container">

        <h1> Ajax Request </h1>



        <form class="form-horizontal">

            <div class="form-group">

                <label>Name:</label>

                <input type="text" name="name" id="name" class="form-control" placeholder="Name" required="">

            </div>

            <div class="form-group">

                <label>Password:</label>

                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">

            </div>

            <div class="form-group">

                <strong>Email:</strong>

                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required="">

            </div>

            <div class="form-group">

                <button class="btn btn-success " type="button" id="login">Submit</button>

            </div>

        </form>

    </div>

</body>

<script type="text/javascript">


    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $("#login").click(function(e){

        e.preventDefault();


        var name = $("input[name=name]").val();

        var password = $("input[name=password]").val();

        var email = $("input[name=email]").val();


        $.ajax({

           type:'POST',

           url:"{{ url('ajax_request') }}",

           data:{name:name, password:password, email:email},

           success:function(data){
             if($.isEmptyObject(data.error)){
                alert(JSON.stringify(data.success));
             }else{
               alert(JSON.stringify(data.error));
               $.each(data.error, function(key, value) {
									var element = $('#' + key);

                  element.closest('div.form-group')
									.removeClass('has-error')
									.addClass(value.length > 0 ? 'has-error' : 'has-success')
									.find('.text-danger')
									.remove();

									element.after(value);
							});
             }
           }

        });


});

</script>

</html>
