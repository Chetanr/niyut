<?php
  session_start();
  if(isset($_POST['soln']))
  {
	  $_SESSION['qid']=$_POST['tquest'];
  }
  
  
  ?>
  
  <html>
  <link rel="stylesheet" type="text/css" href="design.css" />
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
<br>
<center>
<div id="aques">
<?php
$con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select question from ques where qid="'.$_SESSION['qid'].'"';
        $result=mysql_query($query,$con);  
		$row=mysql_fetch_array($result);
		extract($row);
		?>
		<h3><?php echo $question ;?></h3> 

</div>
</center>

<hr width="50%">
<br>
<center>
<table border="0">
<?php
 
 $con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select answer,uid from answers where qid="'.$_SESSION['qid'].'"';
        $result=mysql_query($query,$con);  
		while($row=mysql_fetch_array($result))
		{  
			extract($row);
	   ?>
	   <tr>
	   <td>
	   <?php
        $con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query1='select dp from users where uid="'.$uid.'"';
        $result1=mysql_query($query1,$con);  
		$row1=mysql_fetch_array($result1);
	//	extract($row1);
		echo '<img class="img2" src="data:image;base64,'.$dp.'">';?>
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp
		<br>
		
			
		</td>
        <td width="400px;">
        <h2>
		<?php echo $answer; ?>
		</h2>
		</td>		
		</tr>	
		<?php
		} ?>
         </table> 
		
<form method="post" name="fa">
<textarea cols=80 rows=7  name="answer"></textarea>
<br>
<br>

<input id="post1" type="submit" value="WRITE SOLUTION" name="post1" >
</form>
		
		
		</center>		
 <?php

if(isset($_POST['post1']))
  {
	  if($_POST['answer']!=NULL)
	  $con=mysql_connect('localhost','root','');
         mysql_select_db('niyut',$con);
        $query='insert into answers (answer,qid,uid) values("'.$_POST['answer'].'","'.$_SESSION['qid'].'","'.$_SESSION['college'].'")';
        $result1=mysql_query($query,$con);  
		$_POST['answer']=NULL;
	  
  }
?> 
