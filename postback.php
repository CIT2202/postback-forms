<?php
$validForm = true;
$formSubmitted = true;
$email = "";
$fullname = "";
if(isset($_POST["submit"])){

  if(empty($_POST["email"])){
    $validForm = false;
  }else{
    $email = $_POST["email"];
  }

  if(empty($_POST["fullname"])){
    $validForm = false;
  }else{
    $fullname = $_POST["fullname"];
  }

}else{
  $formSubmitted = false;
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<title>A Postback form</title>
</head>
<body>
<?php
if(isset($_POST["submit"])){
  if($validForm){
    //we have passed all the tests so we can display the form data
    echo "<p> Valid form.</p>";
    echo "<p> You entered an email address of {$email}.</p>";
    echo "<p> You entered a fullname of {$fullname}.</p>";
  }else{
    echo "<p>You need to complete all the fields</p>";
  }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div>
<label for="email">Email address:</label>
<input type="text" id="email" name="email" value="<?php echo $email;?>">
</div>
<div>
<label for="fullname">Full name:</label>
<input type="text" id="fullname" name="fullname" value="<?php echo $fullname;?>">
</div>
<input type="submit" value="Submit the form" name="submit">
</form>

</body>
</html>
