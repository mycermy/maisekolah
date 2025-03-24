<?php

use Core\Authenticator;
use Core\Session;
use Http\Form\LoginForm;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    
    // validate form inputs
    // $form = new LoginForm();

    // if ($form->validate($email, $password)) {
    //     // check the account already exist
    //     if ((new Authenticator)->attempt($email, $password)) {
    //         return redirectDashboard();
    //     }
    //     // $errors['email'] = 'No matching accound found for that email and password.';
    //     $form->setError('email', 'No matching accound found for that email and password.');
    // }
    
    // Session::flash('errors', $form->errors());
    
    // Session::flash('old', [
    //     'email' => $email
    // ]);
    
    // return redirectLogin();

    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);
    
    $signedIn = (new Authenticator)->attempt(
        $attributes['email'], $attributes['password']
    );
    
    if (!$signedIn) {
        $form->setError(
            'email', 'No matching account found for that email address and password.'
        )->throw();
    }

    redirectDashboard();
    
}


view('auth/signin.view.php', [
    'errors' => Session::get('errors') ?? [],
]);

// Session::unflash();
