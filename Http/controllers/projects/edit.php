<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

$sql = 'SELECT * FROM aktiviti WHERE kodAktiviti = ?';
$rows = $db->query($sql, [$_GET['kod']])->findOrFail();

// dd($rows);

authorize(isAuthorized($rows['IDGuru']));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $rows['kodAktiviti'];
    $name = trim($_POST['aktivitinama']);
    $place = trim($_POST['aktivititempat']);
    $date = trim($_POST['aktivititarikh']);
    
    if (! Validator::string($name)) {
        $errors['nama'] = 'Nama Aktiviti diperlukan';
    }

    if (! Validator::string($place)) {
        $errors['tempat'] = 'Tempat Aktiviti diperlukan';
    }

    if (! Validator::string($date)) {
        $errors['tarikh'] = 'Tarikh Aktiviti diperlukan';
    }
    
    if (empty($errors)) {
        $sqlUpdate = 'UPDATE aktiviti SET namaAktiviti = ?, tempat = ?, tarikh = ? WHERE kodAktiviti = ?';

        if (
            $name != $rows['namaAktiviti']
            || $place != $rows['tempat']
            || $date != $rows['tarikh']
        ) {
            $db->query($sqlUpdate, [
                $db->sanitize($name),
                $db->sanitize($place),
                $db->sanitize($date),
                $code
            ]);
        } else {
            $errors['nochange'] = 'No changes were made';
        }
        // redirect
        header('Location: /project?kod=' . $code);
        exit;
    }

}

view('projects/edit.view.php', [
    'heading' => 'Edit Project Details',
    'rows' => $rows,
    'errors' => $errors,
]);
