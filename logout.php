<?php
include 'setting.php';

unset($_SESSION['id']);
unset($_SESSION['admin']);
unset( $_SESSION['login']); 

header('location: '. BASE_URL);

