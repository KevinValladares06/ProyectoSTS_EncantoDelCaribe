<?php
require('admin/inc/esenciales.php');

session_start();
session_destroy();
redirect('index.php');

?>