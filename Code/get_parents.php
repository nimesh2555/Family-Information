<?php
include('dbconfig.php');
if ($_POST['id']) {
    $id = $_POST['id'];
?>
<?php
    $sql    = "SELECT * FROM parents WHERE family_id=" . $id;
    $result = mysql_query($sql);
    if ($result === FALSE) {
        die(mysql_error());
    }
?>
                       
<option selected="selected">--- Select Parents ---</option>
    <?php
    while ($row = mysql_fetch_array($result)) {
?>
       <option value="<?php
        echo $row[1];
?>"><?php
        echo $row[2];
?></option>
    <?php
    }
}
?>					
						
						