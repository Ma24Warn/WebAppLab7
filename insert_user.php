<?php session_start();

if ($_SESSION['authenticated'] != true) {
	die("Access denied");	
}
?>

<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <title>Insert user</title>
  <body>
  
<?
$action = $_POST['action'];

if ($action == "Insert User" ) {

  $usr = $_POST['username'];
  $pwd = $_POST['password'];
  $uType = $_POST['usertype'];
  $games = $_POST['games'];
  $points = $_POST['points'];
  $pwd = password_hash($pwd, PASSWORD_BCRYPT);

	$mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");
				
	$sql = "INSERT INTO mattjoshtable (username, password, usertype, games, points) VALUES ('$usr','$pwd','$uType','$games','$points')";
	
	if ($mysqli->query($sql)) {
      echo '<p>'.$usr. ' was inserted.</p>
            <p><a href="insert_user.php">Insert Another User</a></p>';
      die();
   }
   elseif ($mysqli->errno == 1062) {
      echo '<p>'.$usr. ' already exists.</p>
            <p><a href="insert_user.php">Insert Another User</a></p>';
      die();
   }
   else {
      die("Error ($mysqli->errno) $mysqli->error");
   } 
	
	$mysqli->close();
}
?>


  <form method="post" action="insert_user.php">
    <h2>Insert User</h2>
    <label>Username: <input type="text" name="username"></label><br>
    <label>Password: <input type="password" name="password"></label><br>
    <label>User Type: <input type="text" name="usertype"></label><br>
    <label>Games: <input type="text" name="games"></label><br>
    <label>Points: <input type="text" name="points"></label><br>
    <input type="submit" name="action" value="Insert User"> 
  </form>
	</body>
</html>