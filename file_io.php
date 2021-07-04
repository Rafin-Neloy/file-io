
<!DOCTYPE html>
<html>
    <head>
    <title>Registration Form</title>
    </head>
    <body>
    <h2>Registration Form</h2>


      <?php
       $firstname = $lastname =$dob= $gender= $religion =$present = $permanent = $tel =$email =$link=$username=$password="";

      $firstnameerror= $lastnameerror=$doberror=$gendererror=$emailerror=$religionerror=$presenterror=$permanenterror=$telerror=$linkerror=$usernameerror=$passworderror="";
       $errorMesg=$successMesg=""; 

      $flag=false;

       if($_SERVER['REQUEST_METHOD'] === "POST") {
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $gender=$_POST['gender'];
       $dob = $_POST['dob'];
       $email = $_POST['email'];
       $religion = $_POST['religion'];
       $tel = $_POST['tel'];
       $present = $_POST['present'];
       $permanent = $_POST['permanent'];
       $link = $_POST['link'];
       $password=$_POST['password'];
       $username=$_POST['username'];


       if(empty($firstname)) {
       $firstnameerror = "First name can not be empty!";
       $flag = true;}
                  
       if(empty($lastname)) {
       $lastnameerror = "Last name can not be empty!";
       $flag = true;}

       if(empty($gender)) {
       $gendererror = "select gender, cannot be empty!";
       $flag = true;}

       if(empty($dob)) {
       $doberror = "death of birth cannot be empty!";
       $flag = true;}

       if(empty($religion)) {
       $religionerror = "choose religion";
       $flag = true;}

       if(empty($present)) {
       $presenterror = "field can not be empty";
       $flag = true;}

       if(empty($permanent)) {
       $permanenterror = "field can not be empty!";
       $flag = true;}

       if(empty($tel)) {
       $telerror = "provide Telephone!";
       $flag = true;}

       if(empty($email)) {
       $emailerror = "email can not be empty!";
       $flag = true;}

       if(empty($link)) {
       $linkerror = "provide link!";
       $flag = true;}

       if(empty($password)) {
       $passworderror = "Enter password";
       $flag = true;}

       if(empty($username)) {
       $usernameerror = "provide username";
       $flag = true;}

     if (!$flag) {

        $file = "data.json";
        if (file_exists($file)) {
            $existing_data = read();
            if (empty($existing_data)) {
                $arr1[] = array("Enter your first name"=>$firstname,"Enter your last name"=>$lastname,"Gender"=>$gender,"Date of Birth"=>$dob,"Enter your Religion"=>$religion,"Present Address"=>$present,"Permanent Addres"=>$permanent,"Telephone"=>$tel,"Email"=>$email,"Enter username"=>$username,"Enter password:"=>$password,);
                $result = write(json_encode($arr1));
            } else {

                $existing_data_decode = json_decode($existing_data);

                array_push($existing_data_decode, array("Enter your first name"=>$firstname,"Enter your last name"=>$lastname,"Gender"=>$gender,"Date of Birth"=>$dob,"Enter your Religion"=>$religion,"Present Address"=>$present,"Permanent Addres"=>$permanent,"Telephone"=>$tel,"Email"=>$email,"Enter username"=>$username,"Enter password:"=>$password));

                write("");
                $json = json_encode($existing_data_decode);
                $result = write(($json)."\n");
            }
        }
        
        if ($result=true) {
            $successMesg = " Succesfully Saved";
        } else {
            $errorMesg = "Error While saving";
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
function write($value)
{
    $fileName = "data.json";
    $resors = fopen($fileName, "w");
    $fileWrite = fwrite($resors, $value);
    fclose($resors);
    return $fileWrite;
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
          

      



      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

      <fieldset>
        <legend>Basic information</legend>

        <label for="firstname">Enter your first name:<span style="color:red;" >*</span> </label>
        <input type="text" id="firstname" name="firstname">
        <span style="color:red;"><?php echo $firstnameerror;?></span>
        <br>

        <label for="lastname">Enter your last name:<span style="color:red;">*</span></label>
        <input type="text" id="lastname" name="lastname">
        <span style="color:red;"><?php echo $lastnameerror?></span>
        <br>

        <label for="gender">Gender <span style="color: red;">*</span></label>
        <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>
        <span style="color: red;"><?php echo $gendererror?></span>
        <br>

        <label for="dob">Date of Birth:<span style="color: red;">*</span> </label>
        <input type="date" id="dob" name="dob">
        <span style="color: red;"><?php echo $doberror ?> </span>
        <br>

        <label for="religion">Enter your Religion: <span style="color: red;"> *</span> </label>
        <select name="religion">
           <option value="islam">Islam</option>
           <option value="hindu">Hindu</option>
           <option value="buddha">Buddha</option>
           <option value="chritian">Christian</option>
        </select>
        <span style="color: red;"><? php echo $religionerror?></span>
      </fieldset>
        <br>

      <fieldset>
        <legend>Contact Information</legend>
        <label for="present">Present Address:<span style="color: red;">*</span> </label>
        <textarea id="present" name="present" rows="3" cols="20"> </textarea> 
        <span style="color: red;"><?php echo $presenterror?></span>
        <br>

        <label for="permanent">Permanent Address:<span style="color: red;">*</span> </label>
        <textarea id="permanent" name="permanent" rows="3" cols="20"> </textarea> 
        <span style="color: red;"><?php echo $permanenterror?></span>
        <br>

        <label for="tel">Telephone:<span style="color: red;">*</span> </label>
        <input type="tel" id="tel" name="tel">
        <span style="color: red;"><? php echo $telerror?></span>
        <br>

        <label for="email">Email: <span style="color: red;">*</span></label>
        <input type="email" id="email" name="email">
        <span style="color: red;"><?php echo $emailerror?></span>
        <br>

        <label for="link">Personal Website Link:<span style="color: red;">*</span></label>
        <input type="url" id="link" name="link" >
        <span style="color: red;"><?php echo $linkerror?></span>
      </fieldset>
      <br><br>

      <fieldset>
        <legend>Academic Information</legend>
      </fieldset>
      <br>

       <h3>Account information</h3>
      <label for="username">Enter username <span style="color: red;">*</span></label>
      <input type="text" id="username" name="username">
      <span style="color: red;"><?php echo $usernameerror?></span>
      <br>
      <label for="password">Enter password: <span style="color: red;">*</span></label>
      <input type="password" name="password">
      <span style="color: red;"><?php echo $passworderror?></span>
      <br>

      <input type="submit" value= "submit">
    </form>
</body>
</html>
