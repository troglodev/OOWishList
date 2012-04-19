

<?php
if(!empty($result)){
foreach ($result as $row) {
    echo $row['id'] . ' - ';
    echo $row['name'] . ' - ';
    echo $row['password'] . '<br/>';
}}
?>
