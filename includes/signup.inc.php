<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        header("location: ../login.html?error=emptyinput");
        //echo "entered";
        exit();
    }

    if(invalidEmail($email) !== false) {
        header("location: ../login.html?error=invalidemail");
        exit();
   }

   if(passwordMatch($pwd, $pwdrepeat) !== false) {
        header("location: ../login.html?error=passwordsdonotmatch");
        exit();
   }

   if(uidExists($conn, $username, $email) !== false) {
        header("location: ../login.html?error=invaliduid");
        exit();
    }

    createUser($conn, $name, $email, $username, $pwd);

}

else {
    header("location: ../index.html");
    exit();
}
?>