<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Home Page </title>
  </head>
  <body>
      <h1>Hello there welcome</h1>
      <hr>
      <table border="1">
        <thead>
          <th>User Id</th>
          <th>User name</th>
        </thead>
        <tbody>
          @foreach($user_data as $row)
          <tr>
          <td>{{$row -> user_id}}</td>
          <td>{{$row -> user_name}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
  </body>
</html>
