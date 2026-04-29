<?php
require_once('./includes/db.inc.php');

$ablakcim = [
    'cim' => 'Hulladékkezelő Portál',
];

$fejlec = [
    'kepforras' => 'logo.png',
    'kepalt'    => 'logo',
    'cim'       => 'Hulladékkezelő Portál',
    'motto'     => 'Tisztább környezet mindenkinek'
];

$lablec = [
    'copyright' => 'Copyright ' . date("Y") . '.',
    'ceg'       => 'Hulladékkezelő Portál'
];

$oldalak = [
    '/'          => ['fajl' => 'cimlap',    'szoveg' => 'Főoldal',      'menun' => [1,1]],
    'tesztoldal'     => ['fajl' => 'tesztoldal',    'szoveg' => 'Tesztoldal',       'menun' => [1,1]],
    'naptar'     => ['fajl' => 'naptar',    'szoveg' => 'Naptár',       'menun' => [1,1]],
    'szolgaltatasok' => ['fajl' => 'szolgaltatasok', 'szoveg' => 'Szolgáltatások', 'menun' => [1,1]],
    'kapcsolat'  => ['fajl' => 'kapcsolat', 'szoveg' => 'Kapcsolat',    'menun' => [1,1]],
    'uzenetek'   => ['fajl' => 'uzenetek',  'szoveg' => 'Üzenetek',     'menun' => [0,1]],
    'belepes'    => ['fajl' => 'belepes',   'szoveg' => 'Belépés',      'menun' => [1,0]],
    'kilepes'    => ['fajl' => 'kilepes',   'szoveg' => 'Kilépés',      'menun' => [0,1]],
    'belep'      => ['fajl' => 'belep',     'szoveg' => '',             'menun' => [0,0]],
    'regisztral' => ['fajl' => 'regisztral','szoveg' => '',             'menun' => [0,0]],
];

$hiba_oldal = ['fajl' => '404', 'szoveg' => 'A keresett oldal nem található!'];