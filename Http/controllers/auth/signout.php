<?php

// dd("i'm sign out!");

use Core\Authenticator;

new Authenticator()->logout();

redirect('/');