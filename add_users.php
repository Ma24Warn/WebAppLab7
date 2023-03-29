<?php
if($_GET['key']!="hey") {
    die("Access denied");
}

$sql = "INSERT INTO mattjoshtable VALUES
('alice', '".'$2y$10$T6.Mhzk07vwO0Ptt4PYajuA84K0IGX/MUhu3Q8XI2fSRuDyesYpyC'."', 'admin', '20', ' 1257'),
('bob', '".'$2y$10$9D6xwaJPV1iEN4vFvzWTf.AM/BdwJcY9fU7rsJFw0qk/wL1A8AEyC'."', 'normal', '15', '2165'),
('uncoded', '".'uncoded'."', 'normal', '0', '0')";

$mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");
$mysqli->query($sql);
$mysqli->close();

?>