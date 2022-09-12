function abrirMenu() {
    document.getElementById("navbar").style.width = "250px";
}

function fecharMenu() {
    document.getElementById("navbar").style.width = "0";
}

function redirecionarLogin(){
    location.href="login.html";
}

function redirecionarCadastro(){
    location.href="cadastro.html";
}

function redirecionarCursos(){
    location.href="cursos.html";
}



//https://projetouniexpo.herokuapp.com/login.php?email=calopsita.chapeu%40gmail.com&senha=senha123
function PegarInfo() {

    var settings = {
        "url": "https://projetouniexpo.herokuapp.com/login.php?",
        "method": "GET",
        "timeout": 0,
        "processData": false,
        "mimeType": "multipart/form-data",
        "contentType": false,
    };

    $.ajax(settings).done(function (response) {
        console.log(response);
        var jx = JSON.parse(response);
        console.log(jx.perfis[0].nome);
        document.getElementById("nome").innerHTML = jx.perfis[0].nome;


    })

}
