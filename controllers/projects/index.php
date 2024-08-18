<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$sql = "SELECT * FROM aktiviti ORDER BY tarikh DESC";
$rows = $db->query($sql)->get();


view('projects/index.view.php', [
    'heading' => 'Projects',
    'rows' => $rows,
]);