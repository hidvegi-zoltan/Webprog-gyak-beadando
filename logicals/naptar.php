<?php
$stmt = $dbh->query('
    SELECT n.datum, s.tipus, s.jelentes
    FROM naptar n
    LEFT JOIN szolgaltatas s ON n.szolgid = s.id
    ORDER BY n.datum ASC
');
$naptar = $stmt->fetchAll(PDO::FETCH_ASSOC);