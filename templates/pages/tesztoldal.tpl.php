<h2>Főoldal</h2>

<?php
// Adatbázis teszt
try {
    $sql = "SELECT * FROM szolgaltatas";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $szolgaltatasok = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    echo "<p style='color:green'>✓ Adatbázis kapcsolat OK!</p>";
    echo "<ul>";
    foreach($szolgaltatasok as $s) {
        echo "<li>{$s['tipus']} — {$s['jelentes']}</li>";
    }
    echo "</ul>";
} catch(PDOException $e) {
    echo "<p style='color:red'>✗ Hiba: " . $e->getMessage() . "</p>";
}
?>