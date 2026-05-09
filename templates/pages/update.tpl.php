<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-pencil me-2 text-primary"></i>
                Igénybevétel szerkesztése
            </div>
            <div class="card-body p-4">
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($szerkesztett['id']) ?>">

                    <div class="mb-3">
                        <label for="igeny" class="form-label">Dátum <span class="text-danger">*</span></label>
                        <input type="date" name="igeny" id="igeny"
                               class="form-control <?= isset($crud_hiba['igeny']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($szerkesztett['igeny'] ?? '') ?>">
                        <?php if (isset($crud_hiba['igeny'])): ?>
                            <div class="invalid-feedback"><?= $crud_hiba['igeny'] ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="szolgid" class="form-label">Szolgáltatás <span class="text-danger">*</span></label>
                        <select name="szolgid" id="szolgid"
                                class="form-select <?= isset($crud_hiba['szolgid']) ? 'is-invalid' : '' ?>">
                            <option value="">— Válasszon —</option>
                            <?php foreach ($szolgaltatasok as $sz): ?>
                                <option value="<?= $sz['id'] ?>" <?= (isset($szerkesztett['szolgid']) && $szerkesztett['szolgid'] == $sz['id']) ? 'selected' : '' ?>>
                                    <?= strtoupper(htmlspecialchars($sz['tipus'])) ?> – <?= htmlspecialchars(explode(':', $sz['jelentes'])[0]) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (isset($crud_hiba['szolgid'])): ?>
                            <div class="invalid-feedback"><?= $crud_hiba['szolgid'] ?></div>
                        <?php endif; ?>
                    </div>

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
                        <button type="submit" class="btn btn-primary flex-grow-1">
                            <i class="bi bi-save me-2"></i>Módosítás mentése
                        </button>
                        <a href="?menu=crud" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-1"></i>Mégse
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>