<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$errors = [];
$old = []; // Store old input values

// authorize(isAuthenticated());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // dd($_POST);
    // Store old input values
    $old = $_POST;

    if (! Validator::string($_POST['aktivitikod'])) {
        $errors['kod'] = 'Kod Aktiviti diperlukan';
    }

    if (! Validator::string($_POST['aktivitinama'])) {
        $errors['nama'] = 'Nama Aktiviti diperlukan';
    }

    if (! Validator::string($_POST['aktivititempat'])) {
        $errors['tempat'] = 'Tempat Aktiviti diperlukan';
    }

    if (empty($errors)) {
        try {
            $sql = "INSERT INTO `aktiviti` (`kodAktiviti`, `namaAktiviti`, `tarikh`, `tempat`, `IDGuru`) 
                    VALUES (?, ?, ?, ?, ?)";
            
            $db->query($sql, [
                $db->sanitize($_POST['aktivitikod']),
                $db->sanitize($_POST['aktivitinama']),
                $db->sanitize($_POST['aktivititarikh']),
                $db->sanitize($_POST['aktivititempat']),
                $currUserId
            ]);

            // Only redirect if insert was successful
            header('Location: /projects');
            die();
            
        } catch (\mysqli_sql_exception $e) {
            // Check if it's a duplicate entry error
            if ($e->getCode() === 1062) {
                $errors['kod'] = 'Kod Aktiviti sudah wujud';
            } else {
                $errors['database'] = 'Database error occurred';
            }
        }
    }
}


view('projects/create.view.php', [
    'heading' => 'Create New Project',
    'errors' => $errors,
    'old' => $old ?? []
]);