<?php
$stmt = $dbh->query('SELECT * FROM szolgaltatas ORDER BY id');
$szolgaltatasok = $stmt->fetchAll(PDO::FETCH_ASSOC);