function init() {
    $("#form_pedidos").on("submit", (e) => {
        GuardarEditar(e);
    });
}

$().ready(() => {
    CargaLista();
});

var CargaLista = () => {
    var html = "";
    $.get(
        "../../controllers/pedido.controllers.php?op=todos",
        (ListaPedidos) => {
            console.log(ListaPedidos);
            ListaPedidos = JSON.parse(ListaPedidos);
            $.each(ListaPedidos, (index, pedido) => {
                html += `<tr>
                    <td>${index + 1}</td>
                    <td>${pedido.Fecha}</td>
                    <td>${pedido.Total}</td>
                    <td>${pedido.Estado}</td>
                    <td>${pedido.Metodo_pago}</td>
                    <td>
                        <button class='btn btn-primary' onclick='uno(${pedido.ID_pedido})'>Editar</button>
                        <button class='btn btn-warning' onclick='eliminar(${pedido.ID_pedido})'>Eliminar</button>
                    </td>
                </tr>`;
            });
            $("#ListaPedidos").html(html);
        }
    );
};

var GuardarEditar = (e) => {
    e.preventDefault();
    var DatosFormularioPedido = new FormData($("#form_pedidos")[0]);
    var accion = "../../controllers/pedido.controllers.php?op=insertar";

    for (var pair of DatosFormularioPedido.entries()) {
        console.log(pair[0] + ", " + pair[1]);
    }

    $.ajax({
        url: accion,
        type: "post",
        data: DatosFormularioPedido,
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
    // Implementa la lógica para editar un pedido
    console.log("Editar pedido con ID: " + id);
};

var eliminar = (id) => {
    // Implementa la lógica para eliminar un pedido
    console.log("Eliminar pedido con ID: " + id);
};

var proveedor = () => {
    return new Promise((resolve, reject) => {
      var html = `<option value="0">Seleccione una opción</option>`;
      $.post(
        "../../controllers/proveedor.controllers.php?op=todos",
        async (ListaProveedores) => {
            console.log(ListaProveedores);
            ListaProveedores = JSON.parse(ListaProveedores);
          $.each(ListaProveedores, (index, proveedor) => {
            html += `<option value="${proveedor.ID_proveedor}">${proveedor.Nombre}</option>`;
          });
          await $("#ID_proveedor").html(html);
          resolve();
        }
      ).fail((error) => {
        reject(error);
      });
    });
  };
  

var LimpiarCajas = () => {
    document.getElementById("Fecha").value = "";
    document.getElementById("Total").value = "";
    document.getElementById("Estado").value = "";
    document.getElementById("Metodo_pago").value = "";
    $("#ModalPedidos").modal("hide");
};

init();
