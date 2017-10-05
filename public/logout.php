<?php
// Destroy session to logout user
session_start();
session_destroy();

header('Location: index.php');