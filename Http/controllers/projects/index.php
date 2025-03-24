<?php

use Core\App;
use Core\Database;

// authorize(isAuthenticated());

$db = App::resolve(Database::class);

$sql = "SELECT * FROM aktiviti ORDER BY tarikh DESC";
$rows = $db->query($sql)->get();


view('projects/index.view.php', [
    'heading' => 'Projects',
    'rows' => $rows,
]);