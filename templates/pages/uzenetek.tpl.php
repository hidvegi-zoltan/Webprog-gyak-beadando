<h2 class="section-title mb-4">Beérkezett üzenetek</h2>

<?php if (empty($uzenetek)): ?>
    <div class="text-center text-muted py-5">
        <i class="bi bi-inbox display-4 d-block mb-3"></i>
        Még nincs beérkezett üzenet.
    </div>
<?php else: ?>
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white py-3">
            <span class="fw-bold">
                <i class="bi bi-envelope-open me-2 text-success"></i>
                Összes üzenet: <?= count($uzenetek) ?>
            </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Küldő neve</th>
                        <th>E-mail</th>
                        <th>Üzenet</th>
                        <th>Felhasználó</th>
                        <th>Küldés ideje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($uzenetek as $i => $u): ?>
                    <tr>
                        <td class="text-muted small"><?= count($uzenetek) - $i ?></td>
                        <td><strong><?= htmlspecialchars($u['nev']) ?></strong></td>
                        <td>
                            <a href="mailto:<?= htmlspecialchars($u['email']) ?>" class="text-decoration-none">
                                <?= htmlspecialchars($u['email']) ?>
                            </a>
                        </td>
                        <td class="uzenet-cella">
                            <?= nl2br(htmlspecialchars($u['uzenet'])) ?>
                        </td>
                        <td>
                            <?php if ($u['csaladi_nev']): ?>
                                <span class="badge bg-success">
                                    <i class="bi bi-person-check me-1"></i>
                                    <?= htmlspecialchars($u['csaladi_nev'] . ' ' . $u['uto_nev']) ?>
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary">
                                    <i class="bi bi-person me-1"></i>Vendég
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="text-muted small text-nowrap">
                            <i class="bi bi-clock me-1"></i>
                            <?= date('Y.m.d H:i', strtotime($u['kuldes_ideje'])) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif; ?>