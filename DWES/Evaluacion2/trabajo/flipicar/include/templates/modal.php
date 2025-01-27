<div class="modal fade" id="alquilerModal" tabindex="-1" aria-labelledby="alquilerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" style="background-color: #1d1d1d; border-radius: 10px; color: white; border: none;">
            <div class="modal-header border-0">
                <h5 class="modal-title text-uppercase fw-bold" id="alquilerModalLabel" style="color: #fff; text-align: center; width: 100%;">
                    Calcula tu alquiler
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Marca y Modelo -->
                    <div class="col-md-4">
                        <h6>
                            <i class="fas fa-car"></i> Marca y Modelo
                        </h6>
                        <select id="marcaModelo" name="marcaModelo" class="form-select" required>
                            <option value="" disabled selected>Selecciona una marca</option>
                            <?php
                            include 'conexionCoche.php';

                            $sql = "SELECT id, marca, modelo, deposito, kms_incluidos, costo_km_extra FROM coches";
                            $result = $mysqli->query($sql);

                            if ($result) {
                                while ($datos = $result->fetch_assoc()) {
                                    echo '<option value="' . $datos['id'] . '">' . $datos['marca'] . ' ' . $datos['modelo'] . '</option>' ;
                                    $km = $datos['kms_incluidos'];
                                    $deposito = $datos['deposito'];
                                    $costoKmExtra = $datos['costo_km_extra'];
                                }
                            } else {
                                echo '<option value="">Error al cargar las marcas</option>';
                            }

                            ?>
                        </select>
                        <p id="detallesCoche" class="mt-2">
                            Depósito de garantía: <?php echo $deposito; ?> €<br>
                            Kms. extra: <?php echo $costoKmExtra; ?> €/km
                        </p>
                    </div>

                    <!-- Días de Alquiler -->
                    <div class="col-md-4">
                        <h6>
                            <i class="fas fa-calendar-alt"></i> Días de alquiler
                        </h6>
                        <p class="mt-2" id="diasSeleccionados">Cantidad: 1</p>
                        <input type="range" class="form-range" id="dias" name="dias" min="1" max="30" value="1" step="1"
                            style="background-color: #2b2b2b; color: white; border: none;">
                        <small class="small text-start" style="color: #ccc;">
                            Kms. incluidos: <?php echo $km; ?><br>
                            Todos los precios tienen el IVA incluido.<br>
                            El coste del traslado del vehículo no está incluido en el precio.
                        </small>
                    </div>

                    <!-- Precio e Información -->
                    <div class="col-md-4">
                        <h6>
                            <i class="fas fa-euro-sign"></i> Precio
                        </h6>
                        <h1 id="precio" style="color: #fff; font-size: 2.5rem; font-weight: bold;"><?php echo $deposito; ?></h1>
                        <span> </span>
                        <p id="modeloSeleccionado" style="color: #ccc;">Modelo Seleccionado</p>
                        <button class="btn btn-danger btn-lg" id="interesaButton">
                            <a href="../../admin/alquilarCoche.php" style="color: white; text-decoration: none;">
                                ¡Me interesa!
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../assests/js/modal.js"></script>