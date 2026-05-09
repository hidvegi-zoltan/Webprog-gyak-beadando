<?php
$stmt = $dbh->query('
    SELECT u.id, u.nev, u.email, u.uzenet, u.kuldes_ideje,
           f.csaladi_nev, f.uto_nev, f.bejelentkezes
    FROM uzenetek u
    LEFT JOIN felhasznalok f ON u.kuldo_id = f.id
    ORDER BY u.kuldes_ideje DESC
');
$uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);