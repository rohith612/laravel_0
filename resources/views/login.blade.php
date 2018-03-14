<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!--
<form action="{{URL::route('save_user')}}" method="post">
 {{ csrf_field() }}
 	<p>Name</p>
	<input type="text" name="name" />
	<input type="submit" name="submit" />
</form>-->


<form action="{{URL::route('process_uploads')}}" enctype="multipart/form-data" method="POST">
    <p>
 		<p>Image Name :</p>
    	<input type="text" name="name" />
        <label for="photo">
          <!--  <input type="file" name="photos[]" id="photos" multiple>-->
           <input type="file" name="photo" id="photo" >
        </label>
    </p>
    <button>Upload</button>
    {{ csrf_field() }}
</form>


</body>
</html>