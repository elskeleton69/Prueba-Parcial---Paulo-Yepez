<?php require_once('../html/head2.php') ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary"  data-bs-toggle="modal"
        data-bs-target="#ModalProveedor">Nuevo Proveedores</button>


    <h5 class="card-header">Lista de Proveedores</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Producto</th>
                    <th>Contacto</th>
                    <th>Teléfono</th>
                    
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaProveedores">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalProveedor">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_proveedores" method="post">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" name="Nombre" id="Nombre" class="form-control"
                            placeholder="Ingrese sus nombres" require>
                    </div>
                    <div class="form-group">
                        <label for="Producto_suministrar">Producto</label>
                        <input type="text" name="Producto_suministrar" id="Producto_suministrar" class="form-control"
                            placeholder="Ingrese el nombre del producto" require>
                    </div>
                    <div class="form-group">
                        <label for="Contacto">Contacto</label>
                        <input type="text" name="Contacto" id="Contacto" class="form-control"
                            placeholder="Ingrese el contacto del proveedor" require>
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text" name="Telefono" id="Telefono" class="form-control"
                            placeholder="Ingrese el Telefono" require>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>






<?php require_once('../html/scripts2.php') ?>

<script src="./proveedor.js"></script>

