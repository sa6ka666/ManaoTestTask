<?php
    class Model{
        public static function emailExists($email){
            $users = simplexml_load_file('database.xml');
            foreach($users->user as $user){
                if($user->email==$email){
                    return "Пользователь с таким e-mail уже зарегистрирован";;
                }
            }
        }

        public static function loginExists($login){
            $users = simplexml_load_file('database.xml');
            foreach($users->user as $user){
                if($user->login==$login){
                    return "Пользователь с таким логином уже зарегистрирован";
                }
            }
        }

        public static function addUser($login, $email, $password, $name){
            $users = simplexml_load_file('database.xml');
            $user = $users->addChild('user');
            $user->addChild('name', $name);
            $user->addChild('login', $login);
            $user->addChild('password', $password);
            $user->addChild('email', $email);
            file_put_contents('database.xml', $users->asXML());
        }
        public static function authentification($login, $password){
            $users = simplexml_load_file('database.xml');
            $result = false;
            foreach($users->user as $user){
                if($user->login==$login && $user->password==md5($password)){
                    $result=true;
                    $name = $user->name;
                    session_start();
                    $userHash = md5($name);
                    $arr_cookie_options = array (
                        'expires' => time() + 60*60*24*30,
                        'path' => '/',
                        'domain' => '.localhost', 
                        'secure' => false, 
                        'httponly' => true, 
                        'samesite' => 'None'
                        );
                    setcookie("ID", $userHash);
                    $user->user_hash = $userHash;
                    echo "<h1>Hello, $name </h1><br><a class='btn waves-effect waves-light' href=http://localhost/manaotesttask/exit.php>EXIT</a>";
                }
            
            }

        
        }
    }