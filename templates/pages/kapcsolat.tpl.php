<h2 class="section-title mb-4">Kapcsolat</h2>

<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white fw-bold py-3">
                <i class="bi bi-envelope me-2 text-success"></i>Írjon nekünk!
            </div>
            <div class="card-body p-4">

                <?php if ($siker): ?>
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle me-2"></i>
                        Üzenete sikeresen elküldve, hamarosan felvesszük Önnel a kapcsolatot!
                    </div>
                <?php endif; ?>

                <form method="post" id="kapcsolatForm" novalidate>

                    <!-- NÉV -->
                    <div class="mb-3">
                        <label for="nev" class="form-label">Név <span class="text-danger">*</span></label>
                        <input type="text" name="nev" id="nev"
                               class="form-control <?= isset($hibak['nev']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($form['nev']) ?>">
                        <div class="invalid-feedback" id="nev-hiba">
                            <?= $hibak['nev'] ?? 'A név megadása kötelező (min. 3 karakter)!' ?>
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail cím <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                               class="form-control <?= isset($hibak['email']) ? 'is-invalid' : '' ?>"
                               value="<?= htmlspecialchars($form['email']) ?>">
                        <div class="invalid-feedback" id="email-hiba">
                            <?= $hibak['email'] ?? 'Érvényes e-mail cím megadása kötelező!' ?>
                        </div>
                    </div>

                    <!-- ÜZENET -->
                    <div class="mb-4">
                        <label for="uzenet" class="form-label">Üzenet <span class="text-danger">*</span></label>
                        <textarea name="uzenet" id="uzenet" rows="5"
                                  class="form-control <?= isset($hibak['uzenet']) ? 'is-invalid' : '' ?>"
                                  ><?= htmlspecialchars($form['uzenet']) ?></textarea>
                        <div class="invalid-feedback" id="uzenet-hiba">
                            <?= $hibak['uzenet'] ?? 'Az üzenet megadása kötelező (min. 10 karakter)!' ?>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-send me-2"></i>Üzenet küldése
                    </button>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('kapcsolatForm').addEventListener('submit', function(e) {
    let valid = true;

    // Név ellenőrzés
    const nev = document.getElementById('nev');
    const nevHiba = document.getElementById('nev-hiba');
    if (nev.value.trim().length < 3) {
        nev.classList.add('is-invalid');
        nevHiba.textContent = 'A név megadása kötelező (min. 3 karakter)!';
        valid = false;
    } else {
        nev.classList.remove('is-invalid');
        nev.classList.add('is-valid');
    }

    // Email ellenőrzés
    const email = document.getElementById('email');
    const emailHiba = document.getElementById('email-hiba');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email.value.trim())) {
        email.classList.add('is-invalid');
        emailHiba.textContent = 'Érvényes e-mail cím megadása kötelező!';
        valid = false;
    } else {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
    }

    // Üzenet ellenőrzés
    const uzenet = document.getElementById('uzenet');
    const uzenetHiba = document.getElementById('uzenet-hiba');
    if (uzenet.value.trim().length < 10) {
        uzenet.classList.add('is-invalid');
        uzenetHiba.textContent = 'Az üzenet megadása kötelező (min. 10 karakter)!';
        valid = false;
    } else {
        uzenet.classList.remove('is-invalid');
        uzenet.classList.add('is-valid');
    }

    if (!valid) {
        e.preventDefault();
    }
});
</script>