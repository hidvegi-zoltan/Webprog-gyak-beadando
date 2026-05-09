<h2 class="section-title mb-4">Szolgáltatások</h2>

<div class="row g-3">
    <?php
    $badgeColors = [
        1 => 'bg-warning text-dark',
        2 => 'bg-info text-dark',
        3 => 'bg-success text-white',
        4 => 'bg-primary text-white',
        5 => 'bg-secondary text-white',
    ];
    foreach ($szolgaltatasok as $sz):
        $badge = $badgeColors[$sz['id']] ?? 'bg-dark text-white';
        $reszek = explode(':', $sz['jelentes'], 2);
        $cim    = trim($reszek[0]);
        $leiras = isset($reszek[1]) ? trim($reszek[1]) : '';
    ?>
    <div class="col-md-6">
        <div class="card border-0 shadow-sm h-100 p-3">
            <div class="d-flex align-items-start gap-3">
                <span class="waste-badge <?= $badge ?>">
                    <?= strtoupper(htmlspecialchars($sz['tipus'])) ?>
                </span>
                <div>
                    <strong><?= htmlspecialchars($cim) ?></strong>
                    <?php if ($leiras): ?>
                        <p class="mb-0 text-muted small mt-1"><?= htmlspecialchars($leiras) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>