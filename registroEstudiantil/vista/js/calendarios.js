/**Archivo necesario para crear los calendarios en la página web.
 */
window.onload = function(){
    g_globalObject = new JsDatePick({
            useMode:1,
            isStripped:true,
            target:"capaCalendario"
            /*selectedDate:{
                    day:5,
                    month:9,
                    year:2006
            },
            yearsRange:[1978,2020],
            limitToToday:false,
            cellColorScheme:"beige",
            dateFormat:"%m-%d-%Y",
            imgPath:"img/",
            weekStartDay:1*/
    });		

    g_globalObject.setOnSelectedDelegate(function(){
            var obj = g_globalObject.getSelectedDay(); 
            document.getElementById("fechaNacimiento").value= obj.year + "/" + obj.month + "/" + obj.day;
            document.getElementById("resultado").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
            document.getElementById("capaCalendario").style.display="none";
    });

    g_globalObject2 = new JsDatePick({
            useMode:1,
            isStripped:false,
            target:"div4_example",
            cellColorScheme:"beige"
            /*selectedDate:{ 
                    day:5,   
                    month:9,
                    year:2006
            },
            yearsRange:[1978,2020],
            limitToToday:false,
            dateFormat:"%m-%d-%Y",
            imgPath:"img/",
            weekStartDay:1*/
    });

    g_globalObject2.setOnSelectedDelegate(function(){
            var obj = g_globalObject2.getSelectedDay();
            alert("una fecha apenas se ha seleccionado y la fecha es : " + obj.day + "/" + obj.month + "/" + obj.year);
            document.getElementById("fechaNacimiento").innerHTML = obj.day + "/" + obj.month + "/" + obj.year;
    });		

};
/**Para mostrar la capa con el calendario*/
function mostrarCalendario()
{
    document.getElementById("capaCalendario").style.display="block";
}
