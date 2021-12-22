<?php
    $errcode = "";
    try{
        require_once('./DBinfo.php');

        $pdo = new PDO(DBinfo::DSN, DBinfo::USER, DBinfo::PASSWORD);
        $errmessage = "connected";

    }
    catch(PDOException $e){
    	$errcode = $e -> getCode();
    	$errmessage = $e -> getMessage();
    	print("{$errcode}/{$errmessage}<br/>");
    }
    $pdo = null;
?>
<!DOCTYPE html>
    <body>
        <p><?php print("{$errcode}:{$errmessage}<br/>");?></p>
    </body>
</html> 

