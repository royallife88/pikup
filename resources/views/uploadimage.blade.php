<!DOCTYPE html>
<html>
<head>
	<title>UploadImage</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
</head>
<body>
	<form action="UploadImage" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
	<input type="file" name="image">
</br>
	<input type="submit" name="submit" value="UploadImage">
	</form>
</body>
</html>