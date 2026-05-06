<?php
$hibak = [];
$siker = false;
$form  = ['nev' => '', 'email' => '', 'uzenet' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form['nev']    = trim($_POST['nev']    ?? '');
    $form['email']  = trim($_POST['email']  ?? '');
    $form['uzenet'] = trim($_POST['uzenet'] ?? '');

    // Szerveroldali ellenőrzés
    if ($form['nev'] === '') {
        $hibak['nev'] = 'A név megadása kötelező!';
    } elseif (mb_strlen($form['nev']) < 3) {
        $hibak['nev'] = 'A név legalább 3 karakter legyen!';
    }

    if ($form['email'] === '') {
        $hibak['email'] = 'Az e-mail cím megadása kötelező!';
    } elseif (!filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $hibak['email'] = 'Érvénytelen e-mail cím!';
    }

    if ($form['uzenet'] === '') {
        $hibak['uzenet'] = 'Az üzenet megadása kötelező!';
    } elseif (mb_strlen($form['uzenet']) < 10) {
        $hibak['uzenet'] = 'Az üzenet legalább 10 karakter legyen!';
    }

    if (empty($hibak)) {
        $kuldo_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        $stmt = $dbh->prepare('
            INSERT INTO uzenetek (nev, email, uzenet, kuldo_id)
            VALUES (?, ?, ?, ?)
        ');
        $stmt->execute([$form['nev'], $form['email'], $form['uzenet'], $kuldo_id]);
        $siker = true;
        $form  = ['nev' => '', 'email' => '', 'uzenet' => ''];
    }
}