<?php

$mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");

$result = $mysqli->query("SHOW COLUMNS FROM mattjoshtable");

echo '<table>';
echo '<tr>';
while ($row = $result->fetch_row()) {
        echo '<th>'.$row[0]."</th>";    
}

echo'</tr>';

$result->close();

$result = $mysqli->query("SELECT * FROM mattjoshtable");

while ($row = $result->fetch_row()) {
        echo '<tr>';
        foreach($row as $value) {
            echo '<td>'.$value.'</td>';
        }
        echo '</tr>';
}

echo '</table>';

$result->close();

$mysqli->close();

?>