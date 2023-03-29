<?php session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Delete user</title>
  <body>
  
<?php
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == "Delete User" ) {

  $usr = $_POST['username'];

  $mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");

  if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
  }
				
  $sql = "DELETE FROM mattjoshtable WHERE username='$usr'";
  $mysqli->query($sql);
	
  if ($mysqli->affected_rows > 0) {
    echo '<p>'.$usr. ' was deleted.</p>
      <p><a href="delete_user.php">Delete Another User</a></p>';
    die();
  }
  else  {
    echo '<p>'.$usr. ' was not found.</p>
      <p><a href="delete_user.php">Delete Another User</a></p>';
    die();
  }
  $mysqli->close();
}
?>

  <form method="post" action="delete_user.php">
    <h2>Delete User</h2>
    <label>Username: </label><br>
    <?php
    	$mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");
    	$result = $mysqli->query("SELECT username FROM mattjoshtable");
		echo '<select name="username">';
		while ($row = $result->fetch_row()) {
			echo '<option value="'.$row[0].'">'.$row[0].'</option>';
			}
		echo '</select>';
    $mysqli->close();
    ?>
    <input type="submit" name="action" value="Delete User"> 
  </form>
</body>
</html>
