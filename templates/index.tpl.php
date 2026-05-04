<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? (' | ' . $ablakcim['mottó']) : '' ) ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="./styles/stilus.css" type="text/css">

    <?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?>
        <link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css">
    <?php } ?>
</head>
<body>


    <header class="site-header">
        <div class="container d-flex align-items-center justify-content-between py-3">
            <div class="d-flex align-items-center gap-3">
                <img src="./images/<?=$fejlec['kepforras']?>" alt="<?=$fejlec['kepalt']?>" height="50">
                <div>
                    <h1 class="site-title mb-0"><?= $fejlec['cim'] ?></h1>
                    <?php if (isset($fejlec['motto'])) { ?>
                        <p class="site-motto mb-0"><?= $fejlec['motto'] ?></p>
                    <?php } ?>
                </div>
            </div>
            <?php if(isset($_SESSION['login'])) { ?>
                <div class="bejelentkezett">
                    <i class="bi bi-person-check-fill"></i>
                    Bejelentkezett: <strong><?= htmlspecialchars($_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")") ?></strong>
                </div>
            <?php } ?>
        </div>
    </header>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg site-navbar">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#foMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="foMenu">
                <ul class="navbar-nav me-auto">
                    <?php foreach ($oldalak as $url => $oldal) { ?>
                        <?php if( (!isset($_SESSION['login']) && $oldal['menun'][0]) || (isset($_SESSION['login']) && $oldal['menun'][1]) ) { ?>
                            <?php if($oldal['szoveg'] != '') { ?>
                                <li class="nav-item">
                                    <a class="nav-link<?= (($oldal == $keres) ? ' active' : '') ?>"
                                       href="<?= ($url == '/') ? '.' : $url ?>">
                                        <?= $oldal['szoveg'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
    </main>

    
    <footer class="site-footer">
        <div class="container text-center py-3">
            <?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?><?php } ?>
            &nbsp;
            <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>