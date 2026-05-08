<?php
$stmt = $dbh->query('
    SELECT id, nev, email, uzenet, kuldes_ideje
    FROM uzenetek
    ORDER BY kuldes_ideje DESC
');
$uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);