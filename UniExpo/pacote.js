var setarInfo = function(){
    console.log("entrei no setarInfo");
    localStorage.setItem("email",document.getElementById("email").value);
    console.log(document.getElementById("email").value);
}
var pegarInfo =  function(){
    localStorage.getItem("email");
    let email = localStorage.getItem("email");
    var settings = {
        "url": "https://projetouniexpo.herokuapp.com/recuperaPerfil.php?email=" + email,
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
        document.getElementById("curso").innerHTML = jx.perfis[0].curso;


    });

}

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
