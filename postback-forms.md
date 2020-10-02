# Submitting a form to the same page
Instead of having two separate pages, often we want to have a single page that displays the form and processes the data in the form. Here's a simple application that does this, the form processing and HTML form are in the same page.

```php
<?php
$msg="";
$userAns="";
if(isset($_POST["answerBtn"]))
{
    $userAns=$_POST["capital"];
    if($userAns===""){
        $msg = "You need to answer the question";
    }else{
        if($userAns==="Paris"){
            $msg = "You are correct";
        }else{
            $msg = "You are wrong";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Submitting a form to the same page</title>
</head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<label for="capital">What is the capital of France:</label>
<input type="text" value="<?php echo $userAns;?>" name="capital">
<input type="submit" name="answerBtn">
</form>

<?php
echo "<p>{$msg}</p>";
?>
</body>
</html>
```

Here are the key things to notice:
* The HTML form code and PHP processing code are now in one page
* The *action* attribute uses ```$_SERVER['PHP_SELF']```
```php
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
```
The value of ```SERVER['PHP_SELF']``` is simply the URL of the current page. So when the user clicks submit we load the same page again.

* We have to check if the form has been submitted ```if(isset($_POST["answerBtn"]))``` otherwise we would get errors the first time the page loads from trying to work with variables that don't exist yet.

* The text field where the user enters their answer now looks like the following:
```php
<input type="text" value="<?php echo $userAns;?>" name="capital">
```

This will display the user's answer back into the text box.  This is useful especially with long forms as we don't want to make the user re-enter data for the whole form if they have a single validation error.

The first time you see form processing in the same page it is confusing. The best way to understand is to run a simple example like this and go through the different parts of the code carefully.
