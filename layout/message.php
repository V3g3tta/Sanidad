<?php if (isset($_SESSION['mensaje']['alerta'])): ?>
                <div class="alert alert-<?= $_SESSION['mensaje']['alerta'] ?> alert-dismissible fade show" role="alert">
                    <strong>Alerta!</strong> <?= $_SESSION['mensaje']['mensaje'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
<?php endif; unset($_SESSION['mensaje']); ?>