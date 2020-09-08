<?php
    include "Validation.php";
    include "model.php";
    $login = $_POST['login'];
    $password = $_POST['password'];
    $loginError = Validations::loginValidation($login);
    $passwordError = Validations::passwordValidation($password);
    if(!empty($loginError)){
        $errorMessage[] = $loginError;
    }
    if(!empty($passwordError)){
        $errorMessage[] = $passwordError;
    }
    if(empty($errorMessage)){
        Model::authentification($login, $password);
    }else{
        foreach ($errorMessage as $message){
            echo "$message <br>";
        }
    }
