<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
session_start();

//connect to database
DEFINE('DB_USERNAME', 'root');
  DEFINE('DB_PASSWORD', 'root');
  DEFINE('DB_HOST', 'localhost');
  DEFINE('DB_DATABASE', 'reg');

  $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

  if (mysqli_connect_error()) {
    die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
  }




if(isset($_POST['btn'])){
	//session_start();
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$mobileno = mysqli_real_escape_string($mysqli, $_POST['mobileno']);
	$emailid = mysqli_real_escape_string($mysqli, $_POST['emailid']);
	$college = mysqli_real_escape_string($mysqli, $_POST['college']);
	$branch = mysqli_real_escape_string($mysqli, $_POST['branch']);
	$gpa = $_POST['gpa'];
	$text = mysqli_real_escape_string($mysqli, $_POST['text']);
    
    $query = mysqli_query($mysqli,"SELECT * FROM user WHERE emailid ='$emailid'");
    if(!$query){
        die(mysqli_error($mysqli));
    }
    if(mysqli_num_rows($query) > 0){
        echo("<script language='javascript'>
             window.alert('OOPS! You are a registered user')
             </script>");
    }else{
        $sql="INSERT INTO user(name,mobileno,emailid,college,branch,gpa,text) VALUES('$name','$mobileno','$emailid','$college','$branch','$gpa','$text')";
        mysqli_query($mysqli,$sql);
        header("location: Redirect.php");
    }
    
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
        </head>
	<style>
	body{
	background: url(bg.jpg) no-repeat center center fixed;
	background-size: 900px 900px;
    	background-repeat: no-repeat;
	-webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
	min-width: 700px;
	}

	ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
}


.current{
background-color: #4CAF50;
}
	#wrapper {
    margin-left:auto;
    margin-right:auto;
    width:960px;
}

.error{
	color: #ff1f1f;
}
	</style>
	<div id="wrapper">
	
	<body><center><br><br>
		<form action="Register.php" method="POST" name="frm" >
		<h1 style="color: #00008b;font-size: 300%"><center>TechLadder</center></h1>
		<br>
	
		<ul>
  <li><a  href="./Homepage.html">Home</a></li>
  <li><a class="current" href="./Register.php">Register</a></li>
  <li><a href="./Recruit.php">Wanna Recruit?</a></li>
   <li><a href="./Feedback.html">Feedback</a></li>
  
</ul>
		<p>
		<label>Name:</label>
        <input type="text" placeholder="Name" name="name" size="35" onkeyup="lettersonly(this)" required/>
        <div id="n_error" class="error"></div>
		</p><p>
		<label>Mobile Number:</label>
		<input type="tel" placeholder="Mobile number" name="mobileno"  maxlength="10" required/>
        <div id="m_error" class="error"></div>
		</p><p>
		<label>Email ID:</label>
		<input type="email" placeholder="Email ID" name="emailid" id="emailid" maxlength="30" required/>
        <div id = "e_error" class="error"></div>
		</p>
		<p><label>College:</label>
		<select name="college" required>
			<option value="iit">IIT</option>
			<option value="iiit">IIIT</opyion>
			<option value="nit">NIT</option>
			<option value="bits">BITS</option>
			<option value="ou">Osmania University(inclusive of colleges affiliated to OU)</option>
			<option value="jntu">JNTU(inclusive of colleges affiliated to JNTU)</option>
			<option value="nu">Nagarjuna University(inclusive of colleges affiliated to NU)</option>
			<option value="au">Andhra University(inclusive of colleges affiliated to AU)</option>
			<option value="gu">Geetam University</option>
			<option value="flu">KL University</option>
			<option value="srm">SRM University</option>
			<option value="vit">VIT University</option>
			<option value="manipal">Manipal University</option>
			<option value="amrutha">Amrutha University</option>
		</select>
		</p>
		<p><label>Branch:</label>
		<select name="branch" required>
			<option value="cse">Computer Science Engineering</option>
			<option value="ece">Electronics and Communication Engineering</option>
			<option value="eee">Electronic and Electrical Engineering</option>
			<option value="civil">Civil Engineering</option>
			<option value="it">Information Technology</option>
			<option value="mechanical">Mechanical Engineering</option>
			<option value="chemical">Chemical Engineering</option>
			<option value="biotechnology">Biotechnology</option>
			<option value="eie">Electronics and Instrumentation Engineering</option>
		</select></p>
		<p><label>Engineering GPA(out of 10):</label>
		<input type="text" placeholder="GPA" name="gpa" required/>
        <div id="g_error" class="error"></div>
		</p>
		<p><label>Write about the projects you have worked on:</label><br>
		<textarea name="text" cols="40" rows="5" required></textarea></p>
		<input type="submit" value="Register Me" name="btn" onclick="return validate()"/>
				
		</form></center>
	</body></div>
</html>

<script type="text/javascript">

var uname = document.forms["frm"]["name"];
var mobileno = document.forms["frm"]["mobileno"];
var emailid = document.forms["frm"]["emailid"];
var gpa = document.forms["frm"]["gpa"];
var n_error = document.getElementById("n_error");
var m_error = document.getElementById("m_error");
var e_error = document.getElementById("e_error");
var g_error = document.getElementById("g_error");
uname.addEventListener("blur" , nameVerify , true);
mobileno.addEventListener("blur" , mobilenoVerify , true);
emailid.addEventListener("blur", emailVerify , true);
gpa.addEventListener("blur" , gpaVerify , true);

function lettersonly(input){
    var reg = /[^a-z\s]/gi;
    input.value=input.value.replace(reg, "");
}

function validate(){
    
    if(uname.value == "")
    {	uname.style.border = "1px solid red";
        n_error.textContent = "Username is required";
        uname.focus();
        return false;
    }
    
    if(mobileno.value == "")
    {   mobileno.style.border = "1px solid red";
        m_error.textContent = "Mobile number is required";
        mobileno.focus();
        return false;
    }
    if(isNaN(mobileno.value))
    {   mobileno.style.border = "1px solid red";
        m_error.textContent = "Invalid Mobile number";
        mobileno.focus();
        return false;
    }
    if((mobileno.value).length < 10)
    {	mobileno.style.border = "1px solid red";
        m_error.textContent = "Maximum length must be 10";
        mobileno.focus();
        return false;
    }
    if(emailid.value == "")
    {	emailid.style.border = "1px solid red";
        e_error.textContent = "Email id is required";
        emailid.focus();
        return false;
    }
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(emailid.value)))
    {   emailid.style.border = "1px solid red";
        e_error.textContent = "Invalid Email id";
        emailid.focus();
        return false;
    }
    if(gpa.value == "")
    {   gpa.style.border = "1px solid red";
        g_error.textContent = "GPA is required";
        gpa.focus();
        return false;
    }
    if(gpa.value > 10)
    {   gpa.style.border = "1px solid red";
        g_error.textContent = "Invalid GPA";
        gpa.focus();
        return false;
        
    }
}



function nameVerify(){
    if(name.value != "")
    {	uname.style.border = "1px solid #5e6e66";
        n_error.innerHTML = "";
        return true;
    }
}

function mobilenoVerify(){
    if(mobileno.value != "")
    {	mobileno.style.border = "1px solid #5e6e66";
        m_error.innerHTML = "";
        return true;
    }
}

function emailVerify(){
    if(emailid.value != "")
    {	emailid.style.border = "1px solid #5e6e66";
        e_error.innerHTML = "";
        return true;
    }
}

function gpaVerify(){
    if(gpa.value != "")
    {	gpa.style.border = "1px solid #5e6e66";
        g_error.innerHTML = "";
        return true;
    }
}


</script>

			
