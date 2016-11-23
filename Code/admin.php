<?php
include('dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_POST['add'])) {
	$sql = "INSERT INTO family_surname ". "(surname) ". "VALUES('$_POST[name]')";
	 mysql_query( $sql);
}
if(isset($_POST['add_parents'])) {
	$sql = "INSERT INTO parents ". "(family_id,parents_name) ". "VALUES('$_POST[f_name]','$_POST[p_name]')";
	mysql_query( $sql);
}

if(isset($_POST['add_children'])) {
	$sql = "INSERT INTO childern ". "(parents_id,name) ". "VALUES('$_POST[p_id]','$_POST[c_name]')";
	mysql_query( $sql);
	$note_id = mysql_insert_id();
	$sql_id= "SELECT family_id FROM parents WHERE id=(SELECT parents_id FROM childern WHERE id =".mysql_insert_id().")"; 
	$row_id = mysql_fetch_array(mysql_query( $sql_id));
	$sql_fid = "UPDATE childern SET family_id =" .$row_id[0] ." WHERE id=".$note_id;
	mysql_query($sql_fid);
	
}
?>
	
<head>
<meta charset="UTF-8">
<title>Insert</title>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<style type="text/css">
	.list-group{
		width: 200px;
	}
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>

<div class="container">
	<div class="col-md-6 process-left">
	Insert Family Infornation:
	<form action="#" method="post">
        <div class="form-group">
            <label for="inputEmail">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Family Title">
        </div>
        <button type="submit" class="btn btn-primary" name="add">Insert</button>
    </form>
	</div>
</div>

<div class="container">
	<div class="col-md-6 process-left">
	Insert Parents Infornation:
	<form action="#" method="post">
        <div class="form-group">
            <label for="inputEmail">Select family</label>
            <?php 
			$sql="SELECT * FROM family_surname"; 
			$result = mysql_query($sql);
			?>
			<select name="f_name" class="form-control">
                <option selected="selected">--- Select Family ---</option>
				<?php while ($row = mysql_fetch_array($result)){ ?>
				<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
				<?php } ?>
            </select>
        </div>
		<div class="form-group">
            <label for="inputEmail">Parents Name</label>
            <input type="text" class="form-control" id="name" name="p_name" placeholder="Parents Name">
        </div>
        <button type="submit" class="btn btn-primary" name="add_parents">Insert</button>
    </form>
	</div>
</div>

<div class="container">
	<div class="col-md-6 process-left">
	Insert Cheldren Infornation:
	<form action="#" method="post">
        <div class="form-group">
            <label for="inputEmail">Select Parents</label>
            <?php 
			$sql="SELECT * FROM parents"; 
			$result = mysql_query($sql);
			?>
			<select name="p_id" class="form-control">
                <option selected="selected">--- Select Parents ---</option>
				<?php while ($row = mysql_fetch_array($result)){ ?>
				<option value="<?php echo $row[0]; ?>"><?php echo $row[2]; ?></option>
				<?php } ?>
            </select>
        </div>
		<div class="form-group">
            <label for="inputEmail">Children Name</label>
            <input type="text" class="form-control" id="name" name="c_name" placeholder="Children Title">
        </div>
		
        <button type="submit" class="btn btn-primary" name="add_children">Insert</button>
    </form>
	</div>
</div>
</body>
</html>        	
		