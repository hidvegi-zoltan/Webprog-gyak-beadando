<?php
$hibak = [];
$siker = false;

// FELTÖLTÉS KEZELÉSE
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['login'])) {
    if (isset($_FILES['kep']) && $_FILES['kep']['error'] === UPLOAD_ERR_OK) {
        $file     = $_FILES['kep'];
        $maxMeret = 2 * 1024 * 1024; // 2 MB
        $engedelyezett = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $finfo    = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file['tmp_name']);

        if (!in_array($mimeType, $engedelyezett)) {
            $hibak[] = 'Csak JPG, PNG, GIF vagy WEBP fájl tölthető fel!';
        }
        if ($file['size'] > $maxMeret) {
            $hibak[] = 'A fájl mérete maximum 2 MB lehet!';
        }

        if (empty($hibak)) {
            $kiterjesztes = pathinfo($file['name'], PATHINFO_EXTENSION);
            $ujNev        = uniqid('kep_', true) . '.' . strtolower($kiterjesztes);
            $celMappa     = './uploads/kepek/';

            if (!is_dir($celMappa)) {
                mkdir($celMappa, 0755, true);
            }

            if (move_uploaded_file($file['tmp_name'], $celMappa . $ujNev)) {
                $stmt = $dbh->prepare('INSERT INTO kepek (fajlnev, feltolto_id) VALUES (?, ?)');
                $stmt->execute([$ujNev, $_SESSION['id']]);
                $siker = true;
            } else {
                $hibak[] = 'A fájl mentése sikertelen, ellenőrizd a mappa jogosultságait!';
            }
        }
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $hibak[] = 'Nem választottál ki fájlt!';
    }
}

// KÉPEK LEKÉRÉSE (feltöltővel együtt)
$stmt = $dbh->query('
    SELECT k.id, k.fajlnev, k.feltoltes_ideje,
           f.csaladi_nev, f.uto_nev, f.bejelentkezes
    FROM kepek k
    LEFT JOIN felhasznalok f ON k.feltolto_id = f.id
    ORDER BY k.feltoltes_ideje DESC
');
$kepek = $stmt->fetchAll(PDO::FETCH_ASSOC);