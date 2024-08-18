<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$sql = 'SELECT * FROM aktiviti WHERE kodAktiviti = ?';
$rows = $db->query($sql, [$_GET['kod']])->findOrFail();

// dd($rows);

// $currUserId = 'admin';

// authorize($rows['IDGuru'] == $currUserId);


view('projects/show.view.php', [
    'heading' => 'Project Details',
    'rows' => $rows,
]);
