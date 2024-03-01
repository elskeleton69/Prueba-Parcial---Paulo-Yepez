<?php require_once('../html/head2.php') ?>

<!-- Basic Bootstrap Table -->
<div class="card">
    <button type="button" class="btn btn-outline-secondary" onclick="roles();" data-bs-toggle="modal"
        data-bs-target="#ModalPedidos">Nuevo Pedido</button>


    <h5 class="card-header">Lista de Pedidos</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Metodo de Pago</th>
                    
                </tr>
            </thead>
            <tbody class="table-border-bottom-0" id="ListaPedidos">

            </tbody>
        </table>
    </div>
</div>


<!-- Modal Usuarios-->

<div class="modal" tabindex="-1" id="ModalPedidos">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloModal"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="form_pedidos" method="post">
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="Nombre">Fecha</label>
                        <input type="date" name="Fecha" id="Fecha" class="form-control"
                        placeholder="Ingrese la fecha" require>
                    </div>
                    <div class="form-group">
                        <label for="Total">Total</label>
                        <input type="text" name="Total" id="Total" class="form-control"
                            placeholder="Ingrese el estado del pedido" require>
                    </div>
                    <div class="form-group">
                        <label for="Estado">Estado</label>
                        <input type="text" name="Estado" id="Estado" class="form-control"
                            placeholder="Ingrese el estado del pedido" require>
                    </div>
                    <div class="form-group">
                        <label for="Metodo de Pago">Metodo de Pago</label>
                        <select id="idRoles" name="idRoles" class="form-control">
                        </select>
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

<script src="./pedidos.js"></script>

