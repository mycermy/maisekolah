<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['database']);

$sql = "SELECT * FROM murid ORDER BY namaMurid";
$rows = $db->query($sql)->get();


$heading = 'Team';

// foreach ($rows as $row) {
//     // printf("%s (%s)\n", $row["noKP"], $row["namaMurid"]);
//     echo "<li>" . $row['namaMurid'] . "</li>";
//     // echo "<li>" . $row['namaAktiviti'] . "</li>";
// }

// while ($row = $result->fetch_assoc()) {
//     echo "<li>" . $row['namaMurid'] . "</li>";
// }

// while ($row = $result->fetch_array()) {
//     echo "<li>" . $row['namaMurid'] . "</li>";
// }


view('team.view.php', [
    'heading' => $heading,
    'rows' => $rows,
]);