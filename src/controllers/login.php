<?php
loadModel('Login');


if(count($_POST) > 0){
    $login = new Login($_POST);
    try {
        $user = $login->checkLogin();
        echo "{$user->name} foi logado";
    } catch (Exception $e) {
        echo "falha no login";
    }
}

loadView('login', $_POST);
