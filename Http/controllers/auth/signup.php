<?php

// authorize(! isAuthenticated());

use Core\Session;

view('auth/signup.view.php');

Session::unflash();
