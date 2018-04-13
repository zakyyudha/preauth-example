<?php
\session_start();

if (!$_SESSION['authenticated']){
    echo "Failed to authenticate";
}else{
    echo "<h1>Hello " . $_SESSION['user_data']['nama'] . "</h1>";
    unset($_SESSION['user_data']);
    unset($_SESSION['authenticated']);
}