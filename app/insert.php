<?php
require('dbconnect.php');

try{
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $password = md5($_POST['password']);

    $request = $pdo->prepare(
        "INSERT INTO users(name, email, password) VALUES(?,?,?)"
    );

    $request->execute(array($name, $email, $password));

    $request->closeCursor();
    header('Location: ../');
}catch(Exception $e){
    echo "Erreur d'inscriptiom";
    echo "Message d'erreur: ".$e->getMessage();
}
