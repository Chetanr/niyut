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
<?php

?>
<center>Topic selected IS:<?php echo $_SESSION['stopic']; ?></center> 
<div id="pid">
<?php
        $con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select dp from users where uid="'.$_SESSION['uid'].'"';
        $result=mysql_query($query,$con);  
		$row=mysql_fetch_array($result);
		extract($row);
		echo '<img class="img1" src="data:image;base64,'.$dp.'">';?>
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp
		<br>
		<?php
		echo '<b>'.$_SESSION['uname'].'</b>';
?> 
</div>
<div id="quest">
<center>
<form method="post" name="fq">
<textarea cols=80 rows=7  name="question"></textarea>
<br>
<br>

<input id="post" type="submit" value="POST" name="post1">
</form>
</center>
</div>
<br>
<div id="group">
<center>
<h4>
Already Asked Questions in This Topic
</h4>
<form method="post" action="solution.php" name="ans">
<table border=0>
<?php
   $con=mysql_connect('localhost','root','');
   mysql_select_db('niyut',$con);
 $query='select question,qid from ques where sub_topic="'.$_SESSION['stopic'].'"';
 $result=mysql_query($query,$con);  
while($row=mysql_fetch_array($result))
{
    extract($row)
	?>
	<tr>
	<td><?php echo $question;?></td>
	<td><input type="radio" value="<?php echo $qid; ?>" name="tquest"></td>
    </tr>	
	
	
	
	<?php
} ?>
</table>
<br>
<input type="submit" value="solution"  name="soln">

</form>
 </div>
<?php 
  if(isset($_POST['post1']))
  {
	  if($_POST['question']!=NULL)
	  {$con=mysql_connect('localhost','root','');
         mysql_select_db('niyut',$con);
        $query='insert into ques (question,uid,sub_topic) values("'.$_POST['question'].'","'.$_SESSION['uid'].'","'.$_SESSION['stopic'].'")';
        $result1=mysql_query($query,$con);  
		$_POST['question']=NULL;
	  }
		?>
		  <?php		
  }
?>



 
 
 
 
