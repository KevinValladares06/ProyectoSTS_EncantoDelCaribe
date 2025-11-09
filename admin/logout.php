<?php
require('inc/esenciales.php');

session_start();
session_destroy();
redirect('index.php');

?>