<html>

<link rel="stylesheet" type="text/css" href="design.css" />
<?php 
session_start();
?>
<body class="b">
<div id="welcome">
<br>
<h1>WELCOME TO NIYUT</h1>
<br>
<h2>THIS WEBITE CONNECTS<br>
STUDENTS OF DIFFERENT COLLEGES<br>
BY ALLOWING THEM TO COMMUNICATE<br>
SHARE NOTES AND COLLEGE EVENTS<br>
</h2>
</div>

<div id="sign">
<center>
<form method="post" name="sin">
<br>
<br>
<input class="box" type="text" value="ENTER USER-ID" name="uid">
<br>
<br>
<input class="box" type="password" name="pass"><br><br>
<input class="box" type="submit" value="LOGIN" name="login">
<br></form>
<br>
<br>
<form method="post" name="sup">
<h3>NEW? SIGN-UP</h3>
<br>
<input class="box" type="submit" name="signup" value="SIGN-UP">
</form>
</center>
<?php
if(isset($_POST["login"]))
{
	if(!empty($_POST["uid"])||!empty($_POST["pass"]))
	{
	   	$con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select uid,uname,college,vote,branch from users where uid="'.$_POST["uid"].'" and pass="'.$_POST["pass"].'"';
        $result=mysql_query($query,$con);  
		$row=mysql_fetch_array($result);
	 	
		if($row)
		{
		extract($row);
		$_SESSION['uname']=$uname;
	    $_SESSION['uid']=$uid;
		$_SESSION['branch']=$branch;
		$_SESSION['college']=$college;
		header('Location:home.php');
		}
		else
		{
			echo 'incorrect username or password';
		}
	}
}
?>
</div>
<?php
if(isset($_POST["signup"]))
{

	 
		header('Location:signup.php');
	}


?>