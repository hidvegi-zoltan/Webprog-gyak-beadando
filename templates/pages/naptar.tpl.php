<h2 class="section-title mb-4">Hulladékszállítási naptár</h2>

<div class="card border-0 shadow-sm">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Dátum</th>
                    <th>Típus</th>
                    <th>Leírás</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($naptar as $sor): ?>
                <tr>
                    <td><?= htmlspecialchars($sor['datum']) ?></td>
                    <td>
                        <span class="badge bg-success">
                            <?= strtoupper(htmlspecialchars($sor['tipus'])) ?>
                        </span>
                    </td>
                    <td class="text-muted small">
                        <?= htmlspecialchars(explode(':', $sor['jelentes'])[0]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>