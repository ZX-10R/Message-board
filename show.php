<?php
$err = "";
try{
    require_once("dbconn.php");
    $pdo = new PDO(DBinfo::DSN, DBinfo::USER, DBinfo::PASSWORD);

    $sql = 'SELECT * FROM posts ORDER BY created DESC';
    $statement = $pdo->query($sql);


    if($row = $statement->fetch()){
        print("{$row[0]},{$row[1]},{$row[2]},{$row[3]},{$row[4]}<br/>");
    }
    else{
        print("no data.<br/>");
    }
}

catch(PDOException $e){
    $errcode = $e -> getCode();
    $errmessage = $e -> getMessage();
    $err = ("{$errcode} + {$errmessage}");
}


 $pdo = null;
?>
<!DOCTYPE html>
    <body>
        
        <h2>Message-Board</h2>
        <p>_______________________________________________________________________________________________________</p>
        <div>
         <p><?php print("{$row[0]},{$row[1]},{$row[2]},{$row[3]},{$row[4]}<br/>"); ?></p>
         <p><?php print("<p>{$err}</p><br/>"); ?></p>
         </div>
        <p>_______________________________________________________________________________________________________</p>
        <h3>POST form</h3>
         <form action='' method ="post">
            <p>name</p><input type= "text" name ="name">
            <p>message</p><textarea name ="message" cols="50" rows="10" maxlength="1000"></textarea>
            <br/>
            <input type="submit" value ="submit" >
         </form>
        
    </body>
</html>