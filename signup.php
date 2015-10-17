<html>
<link rel="stylesheet" type="text/css" href="design.css" />
<body>
<div id="up">
<form method="post" name="up" enctype="multipart/form-data">
<br>
<img src="icon.png" class="img"name="empty"/>
<br>
<input type="file" name="image1">
<h3>NAME</h3>
<br>
<input class="box" type="text" value="ENTER USER NAME" name="name">
<br>
<br>
<h3>ENETR YOUR ID</h3><br><br>
<input class="box" type="text" value="ENETR YOUR ID" name="userid">
<br>
<h3>PASSWORD</h3>
<br>
<input class="box" type="password" name="pass"><br><br>
<h3>BRANCH</h3>
<br>
<input class="box" type="text" value="ENTER BRANCH" name="branch"><br>
<h3>COLLEGE</h3>
<br>
<input class="box" type="text" value="enter college" name="college"><br>
<br>
<input class="box" type="submit" value="sign up!" name="signup">
</div>
</body>
</html>

<?php
   if(isset($_POST['signup']))
   {
	   if(getimagesize($_FILES['image1']['tmp_name'])==FALSE)
	   {
		    echo "please select an image";
			
	   }
	   else
	   {
		   $image=addslashes($_FILES['image1']['tmp_name']);
		   $image=file_get_contents($image);
		   $image=base64_encode($image);
		   $con=mysql_connect('localhost','root','');
            mysql_select_db('niyut',$con);
           $query='insert into users(uid,uname,pass,dp,college,branch) values("'.$_POST['userid'].'","'.$_POST['name'].'","'.$_POST['pass'].'","'.$image.'","'.$_POST['college'].'","'.$_POST['branch'].'")';
           $result=mysql_query($query,$con);  
		   header('Location:login.php');
		  
	   }
		   
   }
   ?>