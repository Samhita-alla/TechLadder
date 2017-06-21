<!DOCTYPE html>
<html>

<head>
<title>Recruit</title>
</head>
<style>
body{
background: url(2.jpg) no-repeat center center fixed;
    background-size: 900px 900px;
    background-repeat: no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    min-width: 700px;
}
.current{
    background-color: #4CAF50;
}
#wrapper {
margin-left:auto;
margin-right:auto;
width:960px;
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

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
width: 100%;
}

td, th {
border: 1px solid #dddddd;
    text-align: left;
height: 60px;
padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
<div id="wrapper">
<body>

<table border="0" cellspacing="4" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><b>Username</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>Mobile number</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>Email ID</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>College</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>Branch</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>GPA</b></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><b>Projects they have worked on:</b></font>
</td>
</tr>
<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    //session_start();
    $num = '';
    //connect to database
    DEFINE('DB_USERNAME', 'root');
    DEFINE('DB_PASSWORD', 'root');
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_DATABASE', 'reg');
    
    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    
    if (mysqli_connect_error()) {
        die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
    }
    
    if(isset($_POST['sbtn'])){
        
        $college = mysqli_real_escape_string($mysqli, $_POST['college']);
        $branch = mysqli_real_escape_string($mysqli, $_POST['branch']);
        $gpa = $_POST['gpa'];
        
        $disp = mysqli_query($mysqli,"SELECT * FROM user WHERE college ='$college' AND branch='$branch' AND gpa >='$gpa'");
        if(!$disp){
            die(mysqli_error($mysqli));
        }
        
        $num = mysqli_num_rows($disp);
    }
    
    $i=0;
    
    while ($i < $num)
    {   $result = mysqli_fetch_array($disp,MYSQLI_ASSOC);
        $f1= $result['name'];
        $f2= $result['mobileno'];
        $f3= $result['emailid'];
        $f4= $result['college'];
        $f5= $result['branch'];
        $f6= $result['gpa'];
        $f7= $result['text'];
    
?>
<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font>
</td>
</tr>

<?php
    
$i++;
    }
    
?>







    <center><br><br>
	<form action="" method="POST">
	<h1 style="color: #00008b;font-size: 300%"><center>TechLadder</center></h1>
		<br>
	
		<ul>
  <li><a  href="./Homepage.html">Home</a></li>
  <li><a  href="./Register.php">Register</a></li>
  <li><a class="current" href="./Recruit.php">Wanna Recruit?</a></li>
<li><a href="./Feedback.html">Feedback</a></li>
  
</ul>
	<p><label>Which college are you looking for?</label>
	<select name="college">
			<option value="iit">IIT</option>
			<option value="iiid">IIIT</opyion>
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
		</select></p>
		<p><label>What about the branch?</label>
		<select name="branch">
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
		<p><label>What are your GPA requirements?(>=)</label>
		<input type="text" placeholder="GPA" name="gpa" />
		</p>
		<input type="submit" name="sbtn" value="Search" /><br>
		</form></center>
	</body></div>
</html>


		
	
