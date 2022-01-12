<?php
session_start();
require('dbconn.php');
if (!isset($_SESSION['join'])) {
    header ('Location: test2.php');
    exit();
}
$hash = password_hash($_SESSION['join']['password'], PASSWORD_BCRYPT);
if(!empty($_POST)){
    $statement = $db->prepare('INSERT INTO members SET name=?, email=?, password=?, created=NOW()');
    $statement->execute(array(
        $_SESSION['join']['name'],
        $_SESSION['join']['email'],
        $hash));
    unset($_SESSION['join']);
    header('Location: test4.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
</head>
<body>
<form action="" method="post">
 
<input type="hidden" name="action" value="submit">
<div class="label">
    <p>name
    <span class="check"><?php echo (htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES)); ?></span>
    </p><br />
    <p>email
    <span class="check"><?php echo (htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES)); ?></span>
    </p><br />
    <p>password
    <span class="check">[***********] </span>
   </p><br />
<input type="button" onclick="location.href='test2.php?action=rewrite'" value="return" name="rewrite" class="button02">
<input type="submit" onclick="location.href='test4php'" value="registration" name="registration" class="button">
</form>
</body>
</html>