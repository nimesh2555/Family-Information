<?php
include('dbconfig.php');
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$sql="SELECT * FROM childern WHERE family_id=".$id;
	$result = mysql_query($sql);
	if($result === FALSE) { die(mysql_error()); }
	?>
	
		<ul class="list-group">
	<?php	
		while ($row = mysql_fetch_array($result)){ 
	?>
		<li class="list-group-item">
			<?php echo $row[3] ; ?>
		</li>
	<?php
	}
	?>
		</ul>	
	
	
<?php	
}
?>

