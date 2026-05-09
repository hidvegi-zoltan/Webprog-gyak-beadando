<?php
$action = $_GET['action'] ?? 'list';
$crud_hiba = [];
$crud_siker = '';
$szerkesztett = null;

// Szolgáltatások a legördülőhöz
$szolgStmt = $dbh->query('SELECT id, tipus, jelentes FROM szolgaltatas ORDER BY id');
$szolgaltatasok = $szolgStmt->fetchAll(PDO::FETCH_ASSOC);

// CREATE
if ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $igeny     = trim($_POST['igeny']     ?? '');
    $szolgid   = trim($_POST['szolgid']   ?? '');
    $mennyiseg = trim($_POST['mennyiseg'] ?? '');

    if ($igeny === '')                       $crud_hiba['igeny']     = 'A dátum megadása kötelező!';
    if ($szolgid === '')                     $crud_hiba['szolgid']   = 'A szolgáltatás kiválasztása kötelező!';
    if ($mennyiseg === '' || $mennyiseg < 1) $crud_hiba['mennyiseg'] = 'A mennyiség legalább 1 legyen!';

    if (empty($crud_hiba)) {
        $stmt = $dbh->prepare('INSERT INTO lakig (igeny, szolgid, mennyiseg) VALUES (?, ?, ?)');
        $stmt->execute([$igeny, $szolgid, $mennyiseg]);
        $crud_siker = 'Az igénybevétel sikeresen rögzítve!';
        $action = 'list';
    }
}

// UPDATE – POST feldolgozás
if ($action === 'edit' && $_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $crud_siker = 'Az igénybevétel sikeresen módosítva!';
        $action = 'list';
    } else {
        $szerkesztett = ['id' => $id, 'igeny' => $igeny, 'szolgid' => $szolgid, 'mennyiseg' => $mennyiseg];
    }
}

// DELETE
if ($action === 'delete' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $dbh->prepare('DELETE FROM lakig WHERE id=?');
    $stmt->execute([$id]);
    $crud_siker = 'Az igénybevétel sikeresen törölve!';
    $action = 'list';
}

// EDIT – rekord betöltése (GET)
if ($action === 'edit' && $szerkesztett === null && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $dbh->prepare('SELECT * FROM lakig WHERE id=?');
    $stmt->execute([$id]);
    $szerkesztett = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$szerkesztett) $action = 'list';
}

// LIST – összes rekord
$lista = [];
if ($action === 'list') {
    $stmt = $dbh->query('
        SELECT l.id, l.igeny, l.mennyiseg,
               s.tipus, s.jelentes
        FROM lakig l
        LEFT JOIN szolgaltatas s ON l.szolgid = s.id
        ORDER BY l.igeny DESC
    ');
    $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
}