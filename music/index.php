<?php

session_start();

$_SESSION["DIR"] = __DIR__;


require __DIR__. "/header.php";

require __DIR__."/home.php";

require __DIR__."/footer.php";