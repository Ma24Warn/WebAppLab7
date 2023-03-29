<?php
$mypassword = "alice";
$hash = password_hash($mypassword, PASSWORD_BCRYPT);
echo $hash."<br>";
if (password_verify($mypassword, $hash))
    echo "MATCH for ".$mypassword;
else echo "MISMATCH";
?>