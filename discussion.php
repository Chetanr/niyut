<html>
<link rel="stylesheet" type="text/css" href="design.css" />
<?php 
  session_start();
  
?>
<body>
<div id="topbar">
<ul id="menu">
<li class="list"><img src="h1.png"> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<li class="list"><a href="home.php"><img src="h2.png"></a></li>&nbsp&nbsp
<li class="list"><a href="discussion.php"><img src="h3.png"></a></li>&nbsp
<li class="list"><img src="h4.png"></li>&nbsp&nbsp
</ul>

</div>
<hr>
<br>
<form method="post" name="stopic">
<div id="topic">
<center>
<select name="topics">
<option value="">SELECT YOUR TOPIC</option>
<?php

 $con=mysql_connect('localhost','root','');
   mysql_select_db('niyut',$con);
 $query='select sub_topic from course where branch="'.$_SESSION['branch'].'"';
 $result=mysql_query($query,$con);  
while($row=mysql_fetch_array($result))
{
    extract($row)
	?>
	<option value="<?php echo $sub_topic; ?>"><?php echo $sub_topic; ?></option>
	<?php
}
 
 ?>
 </center>
 </select>
 &nbsp&nbsp
 <input type="submit" value="SUBMIT" name="s_topic">
</div>
 </form>

<div id="pid">
<?php
        $con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select dp from users where uid="'.$_SESSION['uid'].'"';
        $result=mysql_query($query,$con);  
		$row=mysql_fetch_array($result);
		extract($row);
		//echo '<img class="img1" src="data:image;base64,'.$dp.'">';?>
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp
		<br>
		<?php
		echo '<b>'.$_SESSION['uname'].'</b>';
?> 



</div>

<?php
  if(isset($_POST['s_topic']))
  {
	  $_SESSION['stopic']=$_POST['topics'];
	  header('Location:discussion1.php');
  }
?>

<?php 
/*if(isset($_POST['s_topic']))
{$stopic=$_POST['topics'];
}
?>
<div id="quest">
<center>
<form method="post" name="fq">
<input type="text" name="question">
<br>
<br>

<input id="post" type="submit" value="POST" name="post1">
</form>
</center>
</div>
<?php
/*function _dbg($params) {
	print '<pre>';
	print_r($params);
	print '</pre>';
	exit();
}


 if(isset($_POST["post1"]))
 {
    	$con=mysql_connect('localhost','root','');
         mysql_select_db('niyut',$con);
        $query='insert into ques (question,uid,sub_topic) values("'.$_POST['question'].'","'.$_SESSION['uid'].'","'.$stopic.'")';
        $result1=mysql_query($query1,$con);  
	//	_dbg($result1);
		
		
		
  }

  else
{
	echo "bhai andar nahi hain";
	
}
*/
?>







</body>
</html>