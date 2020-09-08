<?php
unset($_COOKIE['ID']);
session_start();
session_destroy();
header('Location: http://localhost/manaotesttask/');