<h2 class="section-title mb-4">Lakó igénybevételek kezelése</h2>

<?php if ($crud_siker): ?>
    <div class="alert alert-success"><i class="bi bi-check-circle me-2"></i><?= $crud_siker ?></div>
<?php endif; ?>

<!-- ===== LISTA ===== -->
<?php if ($action === 'list'): ?>

    <div class="mb-3 text-end">
        <a href="crud&action=create" class="btn btn-success">
            <i class="bi bi-plus-circle me-2"></i>Új igénybevétel rögzítése
        </a>
    </div>

    <?php if (empty($lista)): ?>
        <div class="text-center text-muted py-5">
            <i class="bi bi-inbox display-4 d-block mb-3"></i>
            Még nincs rögzített igénybevétel.
        </div>
    <?php else: ?>
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Dátum</th>
                            <th>Szolgáltatás</th>
                            <th>Mennyiség</th>
                            <th class="text-end">Műveletek</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista as $sor): ?>
                        <tr>
                            <td class="text-muted small"><?= $sor['id'] ?></td>
                            <td><?= htmlspecialchars($sor['igeny']) ?></td>
                            <td>
                                <span class="badge bg-success">
                                    <?= strtoupper(htmlspecialchars($sor['tipus'])) ?>
                                </span>
                                <small class="text-muted ms-1">
                                    <?= htmlspecialchars(explode(':', $sor['jelentes'])[0]) ?>
                                </small>
                            </td>
                            <td><?= $sor['mennyiseg'] ?> db</td>
                            <td class="text-end">
                                <a href="crud&action=edit&id=<?= $sor['id'] ?>"
                                   class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil"></i> Szerkeszt
                                </a>
                                <a href="crud&action=delete&id=<?= $sor['id'] ?>"
                                   class="btn btn-sm btn-outline-danger"
                                   onclick="return confirm('Biztosan törli ezt a rekordot?')">
                                    <i class="bi bi-trash"></i> Töröl
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

<!-- ===== CREATE / EDIT FORM ===== -->
<?php elseif ($action === 'create' || $action === 'edit'): ?>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold py-3">
                    <i class="bi bi-<?= $action === 'create' ? 'plus-circle' : 'pencil' ?> me-2 text-success"></i>
                    <?= $action === 'create' ? 'Új igénybevétel rögzítése' : 'Igénybevétel szerkesztése' ?>
                </div>
                <div class="card-body p-4">
                    <form method="post"
                          action="crud&action=<?= $action ?><?= $action === 'edit' ? '&id=' . $szerkesztett['id'] : '' ?>">

                        <?php if ($action === 'edit'): ?>
                            <input type="hidden" name="id" value="<?= $szerkesztett['id'] ?>">
                        <?php endif; ?>

                        <!-- DÁTUM -->
                        <div class="mb-3">
                            <label for="igeny" class="form-label">Dátum <span class="text-danger">*</span></label>
                            <input type="date" name="igeny" id="igeny"
                                   class="form-control <?= isset($crud_hiba['igeny']) ? 'is-invalid' : '' ?>"
                                   value="<?= htmlspecialchars($szerkesztett['igeny'] ?? '') ?>">
                            <?php if (isset($crud_hiba['igeny'])): ?>
                                <div class="invalid-feedback"><?= $crud_hiba['igeny'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- SZOLGÁLTATÁS -->
                        <div class="mb-3">
                            <label for="szolgid" class="form-label">Szolgáltatás <span class="text-danger">*</span></label>
                            <select name="szolgid" id="szolgid"
                                    class="form-select <?= isset($crud_hiba['szolgid']) ? 'is-invalid' : '' ?>">
                                <option value="">— Válasszon —</option>
                                <?php foreach ($szolgaltatasok as $sz): ?>
                                    <option value="<?= $sz['id'] ?>"
                                        <?= (isset($szerkesztett['szolgid']) && $szerkesztett['szolgid'] == $sz['id']) ? 'selected' : '' ?>>
                                        <?= strtoupper(htmlspecialchars($sz['tipus'])) ?> –
                                        <?= htmlspecialchars(explode(':', $sz['jelentes'])[0]) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (isset($crud_hiba['szolgid'])): ?>
                                <div class="invalid-feedback"><?= $crud_hiba['szolgid'] ?></div>
                            <?php endif; ?>
                        </div>

                        <!-- MENNYISÉG -->
                        <div class="mb-4">
                            <label for="mennyiseg" class="form-label">Mennyiség (db) <span class="text-danger">*</span></label>
                            <input type="number" name="mennyiseg" id="mennyiseg" min="1"
                                   class="form-control <?= isset($crud_hiba['mennyiseg']) ? 'is-invalid' : '' ?>"
                                   value="<?= htmlspecialchars($szerkesztett['mennyiseg'] ?? '') ?>">
                            <?php if (isset($crud_hiba['mennyiseg'])): ?>
                                <div class="invalid-feedback"><?= $crud_hiba['mennyiseg'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success flex-grow-1">
                                <i class="bi bi-save me-2"></i>Mentés
                            </button>
                            <a href="crud" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle me-1"></i>Mégse
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>