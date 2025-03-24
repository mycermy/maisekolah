<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$sql = 'SELECT * FROM aktiviti WHERE kodAktiviti = ?';
$rows = $db->query($sql, [$_POST['kod']])->findOrFail();

// dd($rows);

// $currUserId = 'admin';
$currUserId = $_SESSION['user']['email'];


authorize(isAuthorized($rows['IDGuru']));

$sqlDelete = 'DELETE FROM aktiviti WHERE kodAktiviti = ?';
$db->query($sqlDelete, [$_POST['kod']]);

// redirect
header('Location: /projects');
exit;
