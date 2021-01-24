<?php

function check_user_logged_in() {
    
    session_start();
    
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}

function redirect_main_unless_parameter($param){
    if(empty($param)){
        header("Location: main.php");
        exit;
    }
}
