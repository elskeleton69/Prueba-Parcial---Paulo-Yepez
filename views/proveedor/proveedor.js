function init() {
    $("#form_proveedores").on("submit", (e) => {
        GuardarEditar(e);
    });
}

$().ready(() => {
    CargaLista();
});

var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/proveedor.controllers.php?op=todos",
        (ListaProveedores) => {
            console.log(ListaProveedores);
            ListaProveedores = JSON.parse(ListaProveedores);
            $.each(ListaProveedores, (index, proveedor) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${proveedor.Nombre}</td>
                    <td>${proveedor.Producto_suministrado}</td>
                    <td>${proveedor.Contacto}</td>
                    <td>${proveedor.Telefono}</td>
                    <td>
                        <button class='btn btn-primary' onclick='uno(${proveedor.ID_proveedor})'>Editar</button>
                        <button class='btn btn-warning' onclick='eliminar(${proveedor.ID_proveedor})'>Eliminar</button>
                    </td>
                </tr>`;
            });
            $("#ListaProveedores").html(html);
        }
    );
};

var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioProveedor = new FormData($("#form_proveedores")[0]);
    var accion = "../../controllers/proveedor.controllers.php?op=insertar";

    for (var pair of DatosFormularioProveedor.entries()) {
        console.log(pair[0] + ", " + pair[1]);
    }

    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioProveedor,
        processData: false,
        contentType: false,
        cache: false,
        success: (respuesta) => {
            console.log(respuesta);
            respuesta = JSON.parse(respuesta);
            if (respuesta == "ok") {
                alert("Se guardó con éxito");
                CargaLista();
                LimpiarCajas();
            } else {
                alert("Error al guardar");
            }
        },
        error: (xhr, status, error) => {
            console.error(xhr.responseText);
            alert("Error al procesar la solicitud");
        }
    });
};

var uno = (id) => {
    // Implementa la lógica para editar un proveedor
    console.log("Editar proveedor con ID: " + id);
};

var eliminar = (id) => {
    // Implementa la lógica para eliminar un proveedor
    console.log("Eliminar proveedor con ID: " + id);
};

var LimpiarCajas = () => {
    document.getElementById("Nombre").value = "";
    document.getElementById("Producto_suministrado").value = "";
    document.getElementById("Contacto").value = "";
    document.getElementById("Telefono").value = "";
    $("#ModalProveedores").modal("hide");
};

init();
