<?php
$username = $password = "";
$decode_user = "";
$decode_pass ="";
$flag =false;
$User_passwordEr = "";
$User_NameEr ="";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Form_name =  input($_POST["username"]);
    $From_pass = input($_POST["password"]);

if (empty($_POST["username"])) {
    $User_NameEr = "User Name is required";
    $flag = true;
}

if (empty($_POST["password"])) {
    $User_passwordEr = "password is required";
    $flag = true;
}
if(!$flag){
$readValue= read();
$jsonDecode= json_decode($readValue,true);


for($i=0; $i <count($jsonDecode); $i++){
    if($decode_user == $jsonDecode[$i]["Enter username"] && $decode_pass == $jsonDecode[$i]["Enter password"] ){
        header("Location: ../Lab/Home.php");
        break;
    }
}
}
}
function input($v)
{
    $v = htmlspecialchars($v);
    $v = trim($v);
    $v = stripslashes($v);
    return $v;
}

function read()
{
    $fileName = "data.json";
    $fileSize = filesize($fileName);
    $fr = "";
    if ($fileSize > 0) {
        $resource = fopen($fileName, "r");
        $fr = fread($resource, $fileSize);
        fclose($resource);
        return $fr;
    }
}
?>
