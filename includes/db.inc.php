<?php
try {
    $dbh = new PDO(
        'mysql:host=localhost;dbname=hulladek_kezelo',
        'root',
        '',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    $dbh->query('SET NAMES utf8mb4');
} catch (PDOException $e) {
    die('Adatbázis kapcsolódási hiba: ' . $e->getMessage());
}