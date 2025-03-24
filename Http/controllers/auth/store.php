<?php

// dd(['Register successful!', $_POST]);

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm-password'];
$old = $_POST;

// validate form inputs
$errors = [];

if (!Validator::string($name, 1, 255)) {
    $errors['name'] = 'Your name please';
}

if (!Validator::email($email)) {
    $errors['email'] = 'Please include a valid email address so we can get back to you';
}

if (!Validator::string($password, 6, 255)) {
    $errors['password'] = '6+ characters required';
}

if ($password !== $confirmPassword) {
    $errors['confirm-password'] = 'Password does not match the password';
}

if (!empty($errors)) {
    view('auth/signup.view.php', [
        'errors' => $errors,
        'old' => $_POST
    ]);
    exit();
}

// check the account already exist
$db = App::resolve(Database::class);

$sql = "SELECT * FROM guru WHERE IDGuru = ?";
$user = $db->query($sql, [
    $db->sanitize($email),
])->find();

// Hash password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//
// dd([$user, $hashedPassword]);

if (!$user) {
    $sqlInsert = "INSERT INTO `guru` (`IDGuru`, `katalaluan`, `namaGuru`) 
                    VALUES (?, ?, ?)";

    $db->query($sqlInsert, [
        $db->sanitize($email),
        $db->sanitize($hashedPassword),
        $db->sanitize($name)
    ]);
    
    // Fetch the newly created user
    // $sql = "SELECT * FROM guru WHERE IDGuru = ?";
    // $newUser = $db->query($sql, [
    //     $db->sanitize($email),
    // ])->find();
    
    // Create user array manually
    $newUser = [
        'IDGuru' => $email,
        'namaGuru' => $name
    ];

    new Authenticator()->login($newUser);

    redirectDashboard();
} else {
    redirectLogin();;
}
