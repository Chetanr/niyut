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
<br>
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
		<?php
		echo '<b>'.$_SESSION['uname'].'</b>';

		?> 
</div>
<br>
<center>
<div>
<form method="post" name="fa">
<textarea cols=80 rows=5 name="event"></textarea>
<br>
<br>

<input id="post1" type="submit" value="POST EVENT" name="post1" >
</form>
</div>
<hr width="50%">
<br>

<table border="0">
<?php
 
 $con=mysql_connect('localhost','root','');
        mysql_select_db('niyut',$con);
        $query='select e_detail,college,uid from events';
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
		extract($row1);
		echo '<img class="img2" src="data:image;base64,'.$dp.'">';?>
		<br>&nbsp&nbsp&nbsp&nbsp&nbsp
		<br>
		
			
		</td>
		<td>
		<h3>COLLEGE:<?php echo $college; ?></h3>
		</td>
		</tr>
		<tr>
		<td>
		</td>
        <td width="400px;">
        <h2>
		<?php echo $e_detail; ?>
		</h2>
		</td>		
		</tr>
		<?php
		} ?>
         </table> 
		






</center>

<?php
   if(isset($_POST['post1']))
   {
	   if($_POST['event']!=NULL)
	  {$con=mysql_connect('localhost','root','');
         mysql_select_db('niyut',$con);
        $query='insert into events (e_detail,uid,college) values("'.$_POST['event'].'","'.$_SESSION['uid'].'","'.$_SESSION['college'].'")';
        $result1=mysql_query($query,$con);  
		$_POST['event']=NULL;
	  }
	   
   }


?>



</body>
 
 
 
 
 
 
 
 
 
 
 
 </html>