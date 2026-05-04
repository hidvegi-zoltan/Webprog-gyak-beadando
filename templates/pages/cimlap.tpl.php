<section class="hero-section text-center text-white py-5 mb-5">
    <div class="hero-content">
        <div class="hero-icon mb-3">
            <i class="bi bi-recycle display-1"></i>
        </div>
        <h2 class="display-5 fw-bold mb-3">Szelektív hulladékgyűjtés – értünk és a jövőért</h2>
        <p class="lead mb-4 mx-auto" style="max-width: 650px;">
            Tekintse meg a 2018-as hulladékszállítási naptárt, kövesse nyomon saját igénybevételeit,
            és tájékozódjon a szelektív hulladéktípusokról.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="naptar" class="btn btn-light btn-lg px-4">
                <i class="bi bi-calendar3 me-2"></i>Naptár megtekintése
            </a>
            <a href="szolgaltatasok" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-list-ul me-2"></i>Szolgáltatások
            </a>
        </div>
    </div>
</section>

<!-- INFÓKÁRTYÁK -->
<section class="mb-5">
    <h3 class="section-title text-center mb-4">Miért fontos a szelektív gyűjtés?</h3>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="info-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-icon mb-3">
                    <i class="bi bi-tree-fill text-success display-5"></i>
                </div>
                <h5 class="fw-bold">Környezetvédelem</h5>
                <p class="text-muted">A szelektív hulladékgyűjtéssel csökkentjük a lerakókban elhelyezett hulladék mennyiségét és tehermentesítjük a természetet.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-icon mb-3">
                    <i class="bi bi-arrow-repeat text-primary display-5"></i>
                </div>
                <h5 class="fw-bold">Újrahasznosítás</h5>
                <p class="text-muted">A megfelelően szétválogatott hulladék nyersanyagként hasznosítható újra, csökkentve az energiafelhasználást és az alapanyagigényt.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="info-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="card-icon mb-3">
                    <i class="bi bi-calendar-check-fill text-warning display-5"></i>
                </div>
                <h5 class="fw-bold">Rendszeres szállítás</h5>
                <p class="text-muted">Az éves naptár segítségével mindig tudja, mikor és milyen hulladékot kell a kapu elé kitenni. Ne maradjon le egyetlen szállításról sem!</p>
            </div>
        </div>
    </div>
</section>

<!-- HULLADÉKTÍPUSOK -->
<section class="mb-5">
    <h3 class="section-title text-center mb-4">Hulladéktípusok</h3>
    <div class="row g-3">
        <?php
        $badgeColors = [
            1 => 'bg-warning text-dark',   // műanyag
            2 => 'bg-info text-dark',       // üveg
            3 => 'bg-success text-white',   // zöld
            4 => 'bg-primary text-white',   // papír
            5 => 'bg-secondary text-white', // kommunális
        ];
        foreach ($szolgaltatasok as $sz):
            $badge = $badgeColors[$sz['id']] ?? 'bg-dark text-white';
            $reszek = explode(':', $sz['jelentes'], 2);
            $cim   = trim($reszek[0]);
            $leiras = isset($reszek[1]) ? trim($reszek[1]) : '';
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="waste-type-card d-flex align-items-start gap-3 p-3 rounded shadow-sm h-100">
                <span class="waste-badge <?= $badge ?>">
                    <?= strtoupper(htmlspecialchars($sz['tipus'])) ?>
                </span>
                <div>
                    <strong><?= htmlspecialchars($cim) ?></strong>
                    <?php if ($leiras): ?>
                        <p class="mb-0 text-muted small"><?= htmlspecialchars($leiras) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- VIDEÓK -->
<section class="mb-5">
    <h3 class="section-title text-center mb-4">Videók</h3>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-0">
                    <video class="w-100 rounded" controls>
                        <source src="./images/sajat_video.mp4" type="video/mp4">
                        A böngészője nem támogatja a videó lejátszást.
                    </video>
                </div>
                <div class="card-footer bg-white border-0 px-3 py-2">
                    <small class="text-muted"><i class="bi bi-camera-video me-1"></i>Saját videó</small>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-0">
                    <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/RaTLkugR1KU?si=wLTe24afLO75ddzh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="card-footer bg-white border-0 px-3 py-2">
                    <small class="text-muted"><i class="bi bi-youtube me-1 text-danger"></i>YouTube videó</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- GOOGLE TÉRKÉP -->
<section class="mb-5">
    <h3 class="section-title text-center mb-4">Elérhetőségünk</h3>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="ratio ratio-21x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d925.505726056456!2d19.14806218017305!3d47.52047738090259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741db4bd10e5e9b%3A0x22dedda3577ee9fa!2zTU9IVSBCUCBMYWtvc3PDoWdpIHN6ZWxla3TDrXYgaHVsbGFkw6lrZ3nFsWp0xZEgdWR2YXI!5e0!3m2!1shu!2shu!4v1777933017812!5m2!1shu!2shu" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="card-footer bg-white border-0 p-3">
            <p class="mb-0 text-muted"><i class="bi bi-geo-alt-fill text-danger me-2"></i>Budapest, Csömöri út 2-6, 1161</p>
        </div>
    </div>
</section>