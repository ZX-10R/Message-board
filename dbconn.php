<?php
$err = "";
try{
	require_once("./DBinfo.php");
    $pdo = new PDO(DBinfo::DSN, DBinfo::USER, DBinfo::PASSWORD);

}
catch(PDOException $e){
    $errcode = $e -> getCode();
    $errmessage = $e -> getMessage();
    $err = $errcode + $errmessage;
}
?>
<!DOCTYPE html>
    <body>
        <p><?php print("{$err}<br/>"); ?></p>
    </body>
</html>