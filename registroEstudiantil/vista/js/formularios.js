/**Para utilizar con los formularios y los envios de archivos.
 * Author     : Ricardo Presilla
 */
function enviarDatos()
{
    document.forms[0].submit();
}
//Para colocar el boton de selección del archivo personalizado
$(document).ready(function(){
    // cuando se pulsa sobre el div que hace de boton, se hace
    // clic sobre el input type=file que esta escondido
    $("#botonSeleccion").click(function(){
        $("#archivo").click();
    });
    // Cuando se modifique el input type=file se pone el nombre del
    // archivo seleccionado en el div listFile
    $("#archivo").change(function(){
        if($(this).val()){
            // Si tiene valor, se muestra en div
            $("#listaArchivo").html($(this).val());
        }else{
            // Si no tiene valor, se muestran los puntos ...
            $("#listaArchivo").html("Seleccione un archivo");
        }
    });
});

