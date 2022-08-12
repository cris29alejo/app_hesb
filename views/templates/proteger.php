<?php 
if(!isset($_SESSION['login']) === true){
    header('Location: /');
}
?>