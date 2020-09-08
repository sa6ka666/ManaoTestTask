<?php
    include "Validation.php";
    include "model.php";
    $login = $_POST["login"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $confirmPassword = $_POST["confirmPassword"];
    $loginError = Validations::loginValidation($login);
    $emailError = Validations::emailValidation($email);
    $passwordError = Validations::passwordValidation($password);
    $nameError = Validations::nameValidation($name);
    $comparationError = Validations::passwordComparation($password, $confirmPassword);
    $loginExistsError = Model::loginExists($login);
    $emailExsistsError = Model::emailExists($email);
    
    if(!empty($loginError)){
        $errorMessage[] = $loginError;
    }
    if(!empty($emailError)){
        $errorMessage[] = $emailError;
    }
    if(!empty($passwordError)){
        $errorMessage[] = $passwordError;
    }elseif(!empty($comparationError)){
        $errorMessage[] = $comparationError;
    }else{
        $password = md5($password);
    }
    if(!empty($nameError)){
        $errorMessage[] = $nameError;
    }
    if(!empty($emailExsistsError)){
        $errorMessage[] = $emailExsistsError;
    }
    if(!empty($loginExistsError)){
        $errorMessage[] = $loginExistsError;
    }
    
    if(empty($errorMessage)){
        Model::addUser($login, $email, $password, $name);
        echo "Пользователь успешно добавлен, можете авторизироваться!";
        
    }else{
        foreach ($errorMessage as $message){
            echo "<li>$message</li>";
        }
    }
    

