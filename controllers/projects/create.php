<?php

use Core\Database;

require base_path('Core/Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);

// $sql = "SELECT * FROM aktiviti ORDER BY tarikh DESC";
// $rows = $db->query($sql)->get();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // dd($_POST);

    if (! Validator::string($_POST['aktivitikod'])) {
        $errors['kod'] = 'Kod Aktiviti diperlukan';
    }

    if (! Validator::string($_POST['aktivitinama'])) {
        $errors['nama'] = 'Nama Aktiviti diperlukan';
    }


    if (empty($error)) {
        $sql = "INSERT INTO `aktiviti` (`kodAktiviti`, `namaAktiviti`, `tarikh`, `tempat`, `IDGuru`) 
                VALUES (?, ?, ?, ?, ?)";
        $db->query($sql, [
            $db->sanitize($_POST['aktivitikod']),
            $db->sanitize($_POST['aktivitinama']),
            $db->sanitize($_POST['aktivititarikh']),
            $db->sanitize($_POST['aktivititempat']),
            'admin'
        ]);
    }

    // redirect
}


view('projects/create.view.php', [
    'heading' => 'Create New Project',
    'errors' => $errors,
]);