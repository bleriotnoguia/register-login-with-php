<?php

require('dbconnect.php');
try{
    $name = $_POST['name'];
    $password = md5($_POST['password']);

    $request = 'SELECT * FROM users WHERE name="'.$name.'" AND password = "'.$password.'"';
    $exe = $pdo->query($request);

    while($data = $exe->fetch()){
        if($name == $data['name'] && $password == $data['password']){
            session_start();
            $_SESSION['user'] = $name;
            header('Location: ../');
            return;
        }
    }
}catch(Exception $e){
    echo 'Erreur de connexion.';
    echo 'Message d\'erreur :'.$e->getMessage();
}