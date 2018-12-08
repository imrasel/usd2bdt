<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<br>
	<h1>Send Mail</h1>

	<form action="{{route('send')}}" method="post">
		{{csrf_field()}}
		to: <input type="text" name="to"> <br>
		message: <textarea name="message" id="" cols="30" rows="10"></textarea>
		<input type="submit" value="send">

	</form>
	


</body>
</html>