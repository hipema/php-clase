/**
 * @author: MANUEL HIDALGO PÉREZ
 */

document.addEventListener("DOMContentLoaded", function (){
    let menu = document.getElementById("menu");
    let iResumen = document.getElementById("iResumen");
    let iAnadir = document.getElementById("iAnadir");
    let iListado = document.getElementById("iLista");
    let iListadoCompletadas = document.getElementById("iListaCompletadas");

    let bResumen = document.getElementById("bResumen");
    let bAnadir = document.getElementById("bAnadir");
    let bListado = document.getElementById("bListado");
    let bListadoCompletadas = document.getElementById("bListadoCompletadas");

    let seccionResumen = document.getElementById("seccionResumen");
    let seccionAnadir = document.getElementById("seccionAnadir");
    let seccionListado = document.getElementById("seccionListado");
    let seccionListadoCompletadas = document.getElementById("seccionListadoCompletadas");


    document.getElementById("barra-menu").addEventListener("click", function () {
        menu.style.left = (menu.style.left != "0px") ? "0px" : "-100%";
    })

    if (bResumen  != null) bResumen.addEventListener("click", function () {
        modificarDisplay(seccionResumen, iResumen);
    });
    
    if (bAnadir != null) bAnadir.addEventListener("click", function () {
        modificarDisplay(seccionAnadir, iAnadir);
    });
    
    if (bListado != null) bListado.addEventListener("click", function () {
        modificarDisplay(seccionListado, iListado);
    });
    
    if (bListadoCompletadas != null) bListadoCompletadas.addEventListener("click", function () {
        modificarDisplay(seccionListadoCompletadas, iListadoCompletadas);
    });

    function modificarDisplay (seccion, icono){
        seccion.style.display = (seccion.style.display !== "grid") ? "grid" : "none";
        icono.style.transform = (icono.style.transform == "rotate(90deg)") ? "rotate(0deg)" : "rotate(90deg)";
        
    }
});