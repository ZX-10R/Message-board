<?php
session_start();
$location = './insert.php';
require_once("dbconn.php");

if(!empty($_POST)){
	if($_POST['name'] == ""){
		$error['name'] = 'blank';
	}
	if($_POST['email'] == ""){
		$error['email'] = 'blank'; 
	}
	if($_POST['password'] == ""){
		$error['password'] = 'blank'; 
	}
	if($_POST['password2'] == ""){
		$error['password2'] = 'blank';	 
	}
	if(strlen($_POST['password']) < 6){
		$error['password'] = 'length';
	}
	if(($_POST['password2'] != $_POST['password']) && ($_POST['password2']??"")){
		$error['password2'] = 'difference';
	}
}
if (!empty($error)){
	$_SESSION['join'] = $_POST;
	header("Location: {$location}");
    exit();
}


?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>sign up</title>
    </head>
    <body>
    	<h3>sign <sup></sup></h3>
            <form action="" method="post">
            	    	<table border=1;>
    	<tbody>
        	<tr>
                <td>name</td>
                <td><input type="text" name="name" value="<?php echo htmlspecialchars($_POST['name']??"", ENT_QUOTES); ?>" >
                    <?php if (isset($error['name']) && ($error['name'] == "blank")){;
                              print("<p>plz enter your name.</p>");
                          }
                    ?>
                </td>
            </tr>
            <tr>
                <td>e-mail</td>
                <td><input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']??"", ENT_QUOTES); ?>" >
                    <?php if (isset($error['email']) && ($error['email'] == "blank")){;
                              print("<p>Enter your email.</p>");
                          }
                    ?>
                </td>
            </tr>
            <tr>
                <td>password</td>
                <td><input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password']??"", ENT_QUOTES); ?>" >
                    <?php if (isset($error['password']) && ($error['password'] == "blank")){;
                              print("<p>Enter your password.</p>");
                          }
                    
                          else if (isset($error['password']) && ($error['password'] == "length")){;
                              print("<p>Password must be 6 or more length.</p>");
                          }
                    ?>
                </td>
            </tr>
            <tr>
                <td>re-enter password</td>
                <td><input type="password" name="password2" value="<?php echo htmlspecialchars($_POST['password2']??"", ENT_QUOTES); ?>" >
                    <?php if (isset($error['password2']) && ($error['password2'] == "blank")){;
                              print("<p>Re-enter password.</p>");
                          }
                    
                          else if (isset($error['password']) && ($error['password'] == "difference")){;
                              print("<p>Re-entered password was not match with passsword.</p>");
                          }
                    ?>
                </td>
            </tr>
        </tbody>
        </table>
            <input type ="submit" value="submit" class="button">
        </form>
    </body>
