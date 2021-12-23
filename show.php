<?php
$err = "";
try{
    require_once("./ignorefiles/DBinfo.php");
    $pdo = new PDO(DBinfo::DSN, DBinfo::USER, DBinfo::PASSWORD);

}
catch(PDOException $e){
    $errcode = $e -> getCode();
    $errmessage = $e -> getMessage();
    $err = $errcode + $errmessage;
}
$sql = 'SELECT * FROM posts ORDER BY created DESC';
$statement = $pdo->query($sql);


if($row = $statement->fetch()){
	print("{$row[0]},{$row[1]},{$row[2]},{$row[3]},{$row[4]}<br/>");
}
else{
	print("no data.<br/>");
}

 $pdo = null;
?>
<!DOCTYPE html>
    <body>
        <div>
        
        </div>
    </body>
</html>