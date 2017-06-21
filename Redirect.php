<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Redirect</title>
    <meta http-equiv="refresh" content="5;url=Homepage.html">
</head>
<style>
body{
background: url(3.jpg) no-repeat center center fixed;
    background-size: 900px 900px;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    min-width: 700px;

}

.h1{
height: 10em;
position: relative
margin: 0;
position: absolute;
top: 50%;
left: 50%;
margin-right: -50%;
transform: translate(-50%, -50%);

}
.btn
{	color: white;
    background-color: #3498DB;
height: 30px;
}
</style>

<body><center>
<h1 class="h1" style="color: #ff4500; font-family: courier "> You have successfully registered!!! </h1>
<h3 class="h1" style="color: #c7158f; font-family: Arial; font-style: italic"> Welcome to the TECHLADDER family<br>Recruiters are on a quest for people like you<h3>
</center>
</body>

</html>
