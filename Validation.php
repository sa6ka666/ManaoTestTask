<?php
    Class Validations{

        public static function loginValidation($login){
            if(!preg_match('/[0-9a-zA-Z]{6,}/',$login)){
                return "Некорректный логин (минимум 6 символов, только буквы и цифры)";
            }          
        }

        public static function nameValidation($name){
            if(!preg_match('/[0-9a-zA-Z]{2,}/',$name)){
                return "Некорректное имя пользователя (2 символа, только буквы и цифры)";
            }          
        }

        public static function passwordValidation($password){
            if(!preg_match('/(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/',$password)){
                return "Некорректный пароль (минимум 6 символов , обязательно должны содержать цифру, буквы в разных регистрах и спецсимволы";
            }    
        }     

        public static function emailValidation($email){
            if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)){
                return "Некорректный e-mail адрес";
            }

        }

        public static function passwordComparation($password, $confirmpassword){
            if($password !== $confirmpassword){
                return "Пароли не совпадают";
            }
        }

        
        

    }