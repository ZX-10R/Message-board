<?php
require_once('dbconn.php');

$sql = 'SELECT * FROM posts ORDER BY created DESC';
$statement = $pdo->query($sql);


if($row = $statement->fetch()){
	print("{$row[0]},{$row[1]},{$row[2]},{$row[3]},{$row[4]}<br/>");
}
else{
	print("no data.<br/>");
}

 

?>
<!DOCTYPE html>
    <body>
        <div>
        
        </div>
    </body>
</html>