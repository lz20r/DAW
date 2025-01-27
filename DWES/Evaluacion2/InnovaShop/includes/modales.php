<?php
// Verificamos si la variable $result existe y contiene datos
if (isset($result) && !empty($result)) {
    foreach ($result as $row) {
?>
        <!-- Modal -->
        <div class="modal fade" id="<?= $row['id'] ?>Modal" tabindex="-1" aria-labelledby="<?= $row['id'] ?>ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="<?= $row['id'] ?>ModalLabel"><?= htmlspecialchars($row['nombre']) ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="<?= htmlspecialchars($row['image']) ?>" class="img-fluid mb-3" alt="<?= htmlspecialchars($row['nombre']) ?>">
                        <p><strong>Descripción:</strong> <?= htmlspecialchars($row['descripcion']) ?></p>   
                        <p><strong>Precio:</strong> $<?= htmlspecialchars($row['precio']) ?></p>
                        <p><strong>Stock:</strong>
                            <?= $row['stock'] > 0
                                ? htmlspecialchars($row['stock']) . ' disponibles'
                                : '<span class="text-danger">Fuera de stock</span>' ?>
                        </p> 
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <?php if ($row['stock'] > 0): ?>
                            <button type="button" class="btn btn-success">Agregar al carrito</button>
                        <?php else: ?>
                            <button type="button" class="btn btn-danger" disabled>Sin stock</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>