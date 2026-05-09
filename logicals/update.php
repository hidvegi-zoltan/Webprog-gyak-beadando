<?php
$crud_hiba = [];
$szerkesztett = null;
$id = (int)($_GET['id'] ?? 0);

// Szolgáltatások a legördülőhöz
$szolgStmt = $dbh->query('SELECT id, tipus, jelentes FROM szolgaltatas ORDER BY id');
$szolgaltatasok = $szolgStmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = (int)($_POST['id']        ?? 0);
    $igeny     = trim($_POST['igeny']      ?? '');
    $szolgid   = trim($_POST['szolgid']    ?? '');
    $mennyiseg = trim($_POST['mennyiseg']  ?? '');

    if ($igeny === '')                       $crud_hiba['igeny']     = 'A dátum megadása kötelező!';
    if ($szolgid === '')                     $crud_hiba['szolgid']   = 'A szolgáltatás kiválasztása kötelező!';
    if ($mennyiseg === '' || $mennyiseg < 1) $crud_hiba['mennyiseg'] = 'A mennyiség legalább 1 legyen!';

    if (empty($crud_hiba)) {
        $stmt = $dbh->prepare('UPDATE lakig SET igeny=?, szolgid=?, mennyiseg=? WHERE id=?');
        $stmt->execute([$igeny, $szolgid, $mennyiseg, $id]);
        
        // Vissza a listára siker esetén
        header('Location: ?menu=crud&siker=modositva');
        exit;
    } else {
        // Hibás kitöltés esetén visszatöltjük az eddig beírtakat
        $szerkesztett = ['id' => $id, 'igeny' => $igeny, 'szolgid' => $szolgid, 'mennyiseg' => $mennyiseg];
    }
} else {
    // Első betöltéskor (GET kérés) lekérjük az adatbázisból
    $stmt = $dbh->prepare('SELECT * FROM lakig WHERE id=?');
    $stmt->execute([$id]);
    $szerkesztett = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Ha nincs ilyen ID, visszadobjuk a listára
    if (!$szerkesztett) {
        header('Location: ?menu=crud');
        exit;
    }
}
?>