<!DOCTYPE html>
<html>
<head>
	<title>Signup page</title>
</head>
<body>

	<h1>Create your user account here ,</h1>

	<form name="edit_user" action="{{URL::route('edit_user')}}" method="post">
		
		<table border="1">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Name</th>
					<th>#</th>
				</tr>
			</thead>	
			<tbody>
			<?php 
				$index = 0;
				foreach ($user as $key => $value) {
					echo "<tr>";
					echo "<td>".++$index."</td>";
					echo "<td>".$value -> user_name."</td>";
					echo "<td><input type='submit' id='".$value -> user_id."' value='edit'></td>";
					echo "</tr>";
				}
			?>
			</tbody>
		</table>
	</form>



</body>
</html>