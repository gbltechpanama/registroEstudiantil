/**Para utilizar con los formularios y los envios de archivos.
 * Author: Ricardo Presilla
 * @author Ingeniero en Computacion: Ricardo Presilla.
 * @version 1.0
 */
function enviarDatos()
{
    document.forms[0].submit();
}
/*Para colocar el boton de selección del archivo personalizado*/
$(document).ready(function(){
    /*Cuando se pulsa sobre el div que hace de boton, se hace
    * clic sobre el input type=file que esta escondido*/
    $("#botonSeleccion").click(function(){
        $("#archivo").click();
    });
    /*Cuando se modifique el input type=file se pone el nombre del
     *archivo seleccionado en el div listaArchivo*/
    $("#archivo").change(function(){
        if($(this).val()){
            // Si tiene valor, se muestra en div
            $("#listaArchivo").html($(this).val());
        }else{
            // Si no tiene valor, muestra un mensaje
            $("#listaArchivo").html("Seleccione un archivo");
        }
    });
});

