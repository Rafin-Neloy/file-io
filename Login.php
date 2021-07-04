<!DOCTYPE html>
<head>
    <title>Login</title>
</head>



<form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']) ?>" method="POST">
<?php 
$username="";
$password="";

include "../Lab/Loginaction.php";

?>

    <fieldset>
        <legend>LOG IN</legend>
    <label  for="username">User Name :</label>
    <input type="text" id="username" name="username">
    <span style="color: red;"> *<?php echo$User_passwordEr  ?> </span><br> <br>
    <label for="password">password :</label>
    <input type="password" id="password" name="password">
    <span style="color: red;"> *<?php echo$User_NameEr  ?> </span><br> <br>
    <br> <br>
    <input  type="submit" name="submit" value="Login"> <br> <br>

</form>
<a href="./file_io.php">Click to register</a>
    </fieldset>


</body>
</html>