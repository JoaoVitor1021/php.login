<?php

if(lisser($_SESSION)){
    session_start();
}

session_destroy();

header("location: index.php")

?>