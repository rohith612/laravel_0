<!DOCTYPE html>

<html>

<head>

    <title>Users Login</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container">

<h1>User Login</h1>

@if(Session::has('error'))

    <div class="alert alert-danger">

        {{ Session::get('error') }}

        @php

        Session::forget('error');

        @endphp

    </div>

    @endif

<form method="POST" name="loginForm" action="{{ url('user_validation') }}" enctype="multipart/form-data">

{{ csrf_field() }}

<div class="form-group">

<label>Name:</label>

<input type="text" name="name" class="form-control" placeholder="Name">

@if ($errors->has('name'))

                <span class="text-danger">{{ $errors->first('name') }}</span>

            @endif

</div>

<div class="form-group">

<label>Password:</label>

<input type="password" name="password" class="form-control" placeholder="Password">

    @if ($errors->has('password'))
        <span class="text-danger">{{ $errors->first('password') }}</span>
    @endif

</div>
<!--
<div class="form-group">

<strong>Email:</strong>

<input type="text" name="email" class="form-control" placeholder="Email">

@if ($errors->has('email'))

                <span class="text-danger">{{ $errors->first('email') }}</span>

            @endif

</div>

<div class="form-group">
	<strong>Upload Picture</strong>

    <input type="file" name="photo" id="photo" >

 @if ($errors -> has ('photo'))
	<span class="text-danger">{{ $errors -> first('photo') }}</span>
	@endif
</div>
-->
<div class="form-group">

<button class="btn btn-success btn-submit" name="action" value="login">Login</button>
<!--<button class="btn btn-success btn-submit" name="action" value="cancel">Sign Up</button>-->

<a href="{{ url('user_signup') }}">Sign Up </a>



</div>

</form>

</div>

</body>

</html>

<script type="text/javascript">
var loginForm = $("#loginForm");
loginForm.submit(function(e){
  e.preventDefault();
  var formData = loginForm.serialize();

  $.ajax({
      url:'auth/login',
      type:'POST',
      data:formData,
      success:function(data){
          console.log(data);
      },
      error: function (data) {
          console.log(data);
      }
  });
});

</script>
