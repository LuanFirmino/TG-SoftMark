<?php
    session_destroy();
    setcookie('codComer', null,time()+0, '/');
    setcookie('codConsu', null,time()+0, '/');
    header("Location: ../login.php");
?>