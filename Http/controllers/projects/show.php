<?php

use Core\App;
use Core\Database;

// authorize(isAuthenticated());

$db = App::resolve(Database::class);

$sql = 'SELECT * FROM aktiviti INNER JOIN guru USING (IDGuru) WHERE kodAktiviti = ?';
$rows = $db->query($sql, [$_GET['kod']])->findOrFail();

// dd($rows);

// $currUserId = 'admin';
// $currUserId = $_SESSION['user']['email'];

// authorize($rows['IDGuru'] == $currUserId);

// Check if user is authorized to edit/delete this project
$isAuthorized = isAuthorized($rows['IDGuru']);

view('projects/show.view.php', [
    'heading' => 'Project Details',
    'rows' => $rows,
    'isAuthorized' => $isAuthorized,
]);
