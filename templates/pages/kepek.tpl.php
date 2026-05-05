<h2 class="section-title mb-4">Képgaléria</h2>

<!-- FELTÖLTŐ FORM – csak bejelentkezett felhasználónak -->
<?php if (isset($_SESSION['login'])): ?>
<div class="card border-0 shadow-sm mb-5">
    <div class="card-header bg-white fw-bold py-3">
        <i class="bi bi-cloud-upload me-2 text-success"></i>Kép feltöltése
    </div>
    <div class="card-body">

        <?php if ($siker): ?>
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-2"></i>A kép sikeresen feltöltve!
            </div>
        <?php endif; ?>

        <?php if (!empty($hibak)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($hibak as $h): ?>
                        <li><?= htmlspecialchars($h) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" enctype="multipart/form-data" class="row g-3 align-items-end">
            <div class="col-md-8">
                <label for="kep" class="form-label">Válassz képet (JPG, PNG, GIF, WEBP – max. 2 MB)</label>
                <input type="file" name="kep" id="kep" accept="image/*"
                       class="form-control" required>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success w-100">
                    <i class="bi bi-upload me-2"></i>Feltöltés
                </button>
            </div>
        </form>

    </div>
</div>
<?php endif; ?>

<!-- GALÉRIA RÁCS -->
<?php if (empty($kepek)): ?>
    <div class="text-center text-muted py-5">
        <i class="bi bi-images display-4 d-block mb-3"></i>
        Még nincs feltöltött kép.
    </div>
<?php else: ?>
    <div class="row g-3 kepgaleria">
        <?php foreach ($kepek as $kep): ?>
        <div class="col-6 col-md-4 col-lg-3">
            <div class="galeria-card card border-0 shadow-sm h-100">
                <a href="./uploads/kepek/<?= htmlspecialchars($kep['fajlnev']) ?>"
                   target="_blank" class="galeria-link">
                    <img src="./uploads/kepek/<?= htmlspecialchars($kep['fajlnev']) ?>"
                         alt="Feltöltött kép"
                         class="card-img-top galeria-kep"
                         loading="lazy">
                </a>
                <div class="card-footer bg-white border-0 p-2">
                    <small class="text-muted d-block">
                        <i class="bi bi-person me-1"></i>
                        <?php if ($kep['csaladi_nev']): ?>
                            <?= htmlspecialchars($kep['csaladi_nev'] . ' ' . $kep['uto_nev']) ?>
                        <?php else: ?>
                            Ismeretlen
                        <?php endif; ?>
                    </small>
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i>
                        <?= date('Y.m.d H:i', strtotime($kep['feltoltes_ideje'])) ?>
                    </small>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>