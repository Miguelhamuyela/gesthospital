//quantidade de informações
var quantitylines = document.getElementsByClassName("line").length;


if (quantitylines > 1) {
    values = "<h6>Cerca de " + quantitylines + " Resultados</h6>";
} else if(quantitylines == 1){
    values = "<h6>Cerca de " + quantitylines + " Resultado</h6>";
}
/* else if(quantitylines == 0) {
    values = "<p class='text-dark mt-2'> A sua pesquisa não encontrou nenhum documento ou Informação.<br><br><b>Sugestões:</b><br>Certifique-se de que nenhuma palavra contém erros ortográficos. <br>Tente utilizar outras palavras-chave. <br>Tente palavras-chave mais gerais. <br>Tente com menos palavras-chave. <br></p>";
} */
document.getElementById("resultcount").innerHTML = values;




//botão ver mais informações
/* var btnSeemore = document.getElementById("seemore");

btnSeemore.addEventListener("click", function() {
    var div = document.getElementsByClassName("line");

    if (div.style.display === "none") {
        div.style.display = "block";
    } else {
        div.style.display = "none";
    }

});*/
